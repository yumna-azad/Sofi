<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Address; // Add necessary model imports
use App\Models\Order; // Add necessary model imports
use Livewire\Attributes\Title;

#[Title('Order Detail')]
class MyOrderDetailPage extends Component
{
    public $order_id; // Correct the visibility of the variable

    public function mount($order_id) // Correct the parameter name
    {
        $this->order_id = $order_id; // Correct the assignment operator
    }

    public function render()
    {
        // Correctly fetch the order items and address
        $order_items = OrderItem::with('product')->where('order_id', $this->order_id)->get();
        $address = Address::where('order_id', $this->order_id)->first();
        $order = Order::where('id', $this->order_id)->first(); // Corrected variable name

        // Return the view with the correct variable assignment
        return view('livewire.my-order-detail-page', [
            'order_items' => $order_items,
            'address' => $address,
            'order' => $order
        ]);
    }
}
