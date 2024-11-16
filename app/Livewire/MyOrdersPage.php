<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('My Orders')]
class MyOrdersPage extends Component
{
    use WithPagination;

    public function render()
    {
        // Retrieve orders for the authenticated user, paginated by 2 per page
        $my_orders = Order::where('user_id', auth()->id())
            ->latest()
            ->paginate(2);

        // Return the view with the orders
        return view('livewire.my-orders-page', [
            'orders' => $my_orders,
        ]);
    }
}
