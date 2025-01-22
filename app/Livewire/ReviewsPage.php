<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ReviewsPage extends Component
{
    public $product_id;
    public $rating;
    public $comment;
    
    protected $rules = [
        'product_id' => 'required|exists:mysql.products,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:500'
    ];

    public function submitReview()
    {
        $this->validate();

        try {
            Review::create([
                'product_id' => (string) $this->product_id,
                'user_id' => (string) Auth::id(),
                'rating' => $this->rating,
                'comment' => $this->comment
            ]);

            session()->flash('success', 'Review submitted successfully!');
            $this->reset(['product_id', 'rating', 'comment']);
        } catch (\Exception $e) {
            session()->flash('error', 'Error submitting review. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.reviews-page', [
            'reviews' => Review::latest()->get()->map(function ($review) {
                $user = \App\Models\User::find($review->user_id);
                $product = Product::find($review->product_id);
                
                return [
                    'id' => $review->_id,
                    'rating' => $review->rating,
                    'comment' => $review->comment,
                    'user' => $user ? [
                        'id' => $user->id,
                        'name' => $user->name
                    ] : null,
                    'product' => $product ? [
                        'id' => $product->id,
                        'name' => $product->name
                    ] : null,
                    'created_at' => $review->created_at
                ];
            }),
            'products' => Product::all()
        ]);
    }
} 