<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;   // Assuming Product model is in App\Models namespace
use App\Models\Category;
use App\Livewire\Partials\Navbar;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Products - DCodeMania')]
class ProductsPage extends Component 
{
    use WithPagination;
    use LivewireAlert;

    #[Url]
    public $selected_categories = [];

    #[Url]
    public $on_sale;

    #[Url]
    public $in_stock;

    #[Url]
    public $price_range = 300000;

    #[Url]
    public $sort = 'latest';

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

    public function render()
    {
        // Initialize the query for active products
        $productQuery = Product::query()->where('is_active', 1);

        // If selected categories are not empty, filter products by category
        if (!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }

        // Filter by on sale
        if ($this->on_sale) {
            $productQuery->where('on_sale', 1);
        }

        // Filter by in stock
        if ($this->in_stock) {
            $productQuery->where('in_stock', 1);
        }

        // Filter by price range
        if (!empty($this->price_range)) {
            $productQuery->whereBetween('price', [0, $this->price_range]);
        }

        // Retrieve active categories
        $categories = Category::where('is_active', 1)->get(['id', 'name', 'slug']);

        // Return the view with paginated products and categories
        return view('livewire.products-page', [
            'products' => $productQuery->paginate(9),
            'categories' => $categories,
        ]);
    }
}
