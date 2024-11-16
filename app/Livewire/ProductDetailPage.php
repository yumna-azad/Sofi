<?php
namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Product Detail - DCodeMania')]
class ProductDetailPage extends Component
{
    use LivewireAlert;
    public $slug;
    public $quantity = 1;

    // Mount method to set the product slug
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    // Method to increase the quantity of the product
    public function increaseQty()
    {
        $this->quantity++;
    }

    // Method to decrease the quantity of the product (with check to ensure quantity is greater than 1)
    public function decreaseQty()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    // Method to add product to the cart
    public function addToCart($product_id)
    {
        $total_count = CartManagement::addItemToCart($product_id);

        // Dispatch event to update cart count in Navbar
        $this->dispatch('update-cart-count', ['total_count' => $total_count])
            ->to(Navbar::class);

        // Show success alert
        $this->alert('success', 'Product added to the cart successfully!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    // Render the component and pass the product to the view
    public function render()
    {
        return view('livewire.product-detail-page', [
            'product' => Product::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
