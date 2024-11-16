<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

#[Title('Success - DCodeMania')]
class SuccessPage extends Component
{
    #[Url]
    public $session_id;

    public function render()
    {
        // Fetch the latest order for the authenticated user
        $latest_order = Order::with('address')
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->first();

        if ($this->session_id) {
            // Set the Stripe API key from the environment file
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Retrieve session information from Stripe using the session ID
            $session_info = Session::retrieve($this->session_id);

            // Check if the payment was not successful
            if ($session_info->payment_status != 'paid') {
                $latest_order->payment_status = 'failed';
                $latest_order->save();
                return redirect()->route('cancel');
            }
            // If payment was successful
            else if ($session_info->payment_status == 'paid') {
                $latest_order->payment_status = 'paid';
                $latest_order->save();
            }
        }

        // Return the view with the latest order data
        return view('livewire.success-page', [
            'order' => $latest_order,
        ]);
    }
}
