<?php
namespace App\Livewire\Partials;

use App\Helpers\CartManagement;
use Livewire\Component;

class Navbar extends Component
{
    public $total_count = 0;

    // Mount method to initialize total cart count
    public function mount()
    {
        $this->total_count = count(CartManagement::getCartItemsFromCookie());
    }
    #[On('update-cart-count')]
    public function updateCartCount($total_count){
        $this->total_count=$total_count;
    }

    // Render method to return the view
    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
