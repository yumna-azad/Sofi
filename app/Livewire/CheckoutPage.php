<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;
use App\Mail\OrderConfirmation;

#[Title('Checkout')]
class CheckoutPage extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $street_address;
    public $city;
    public $state;
    public $zip_code;
    public $payment_method;

    public function mount()
    {
        // Check if the cart is empty, redirect if so
        $cart_items = CartManagement::getCartItemsFromCookie();
        if (count($cart_items) == 0) {
            return redirect('/products');
        }
    }

    public function placeOrder()
    {
        try {
            // Validate the input fields
            $this->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'street_address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip_code' => 'required',
                'payment_method' => 'required',
            ]);

            $line_items = [];
            $cart_items = CartManagement::getCartItemsFromCookie();

            foreach ($cart_items as $item) {
                $line_items[] = [
                    'price_data' => [
                        'currency' => 'inr',
                        'product_data' => [
                            'name' => $item['name'],
                        ],
                        'unit_amount' => $item['unit_amount'] * 100,
                    ],
                    'quantity' => $item['quantity'],
                ];
            }

            // Create order
            $order = Order::create([
                'user_id' => auth()->id(),
                'grand_total' => CartManagement::calculateGrandTotal($cart_items),
                'payment_method' => $this->payment_method,
                'payment_status' => 'pending',
                'status' => 'new',
                'currency' => 'inr',
                'shipping_amount' => 0,
                'shipping_method' => 'none',
                'notes' => 'Order placed by ' . $this->first_name . ' ' . $this->last_name
            ]);

            // Create address
            Address::create([
                'order_id' => $order->id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'street_address' => $this->street_address,
                'city' => $this->city,
                'state' => $this->state,
                'zip_code' => $this->zip_code
            ]);

            // Handle payment method
            $redirect_url = '';
            if ($this->payment_method == 'stripe') {
                Stripe::setApiKey(env('STRIPE_SECRET'));
                
                $sessionCheckout = Session::create([
                    'payment_method_types' => ['card'],
                    'customer_email' => auth()->user()->email,
                    'line_items' => $line_items,
                    'mode' => 'payment',
                    'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => route('cancel'),
                ]);

                $redirect_url = $sessionCheckout->url;
            } else {
                $redirect_url = route('success'); // Default redirect for other payment methods
            }

            // Before creating order items, format them correctly
            $orderItems = collect($cart_items)->map(function ($item) use ($order) {
                return [
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_amount' => $item['unit_amount'],
                    'total_amount' => $item['total_amount']
                ];
            })->all();

            // Save the items and clear the cart
            $order->items()->createMany($orderItems);
            CartManagement::clearCartItems();

            // Send email notification
            try {
                Mail::to(auth()->user())->send(new OrderPlaced($order));
            } catch (\Exception $e) {
                // Log mail error but don't stop the order process
                \Log::error('Order confirmation email failed: ' . $e->getMessage());
            }

            // Clear cart and redirect regardless of email status
            session()->forget('cart_items');
            return redirect()->route('success');
        } catch (\Exception $e) {
            session()->flash('error', 'Order failed: ' . $e->getMessage());
            return;
        }
    }

    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);

        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total,
        ]);
    }
}
