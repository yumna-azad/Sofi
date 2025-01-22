<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        try {
            $reviews = Review::all()->map(function ($review) {
                $user = User::find($review->user_id);
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
                    'created_at' => $review->created_at,
                    'updated_at' => $review->updated_at
                ];
            });
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'data' => $reviews
                ]);
            }
            
            return view('reviews.index', compact('reviews'));
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error fetching reviews',
                    'error' => $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Error fetching reviews');
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'product_id' => 'required|exists:mysql.products,id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string|max:500'
            ]);

            \Log::info('Attempting to create review with data:', $validatedData);

            $review = Review::create([
                'product_id' => (string) $validatedData['product_id'],
                'user_id' => (string) Auth::id(),
                'rating' => $validatedData['rating'],
                'comment' => $validatedData['comment']
            ]);

            \Log::info('Review created:', ['review' => $review]);

            // Manually fetch related data
            $reviewData = [
                'id' => $review->_id,
                'rating' => $review->rating,
                'comment' => $review->comment,
                'user' => Auth::user() ? [
                    'id' => Auth::user()->id,
                    'name' => Auth::user()->name
                ] : null,
                'product' => Product::find($validatedData['product_id']) ? [
                    'id' => $validatedData['product_id'],
                    'name' => Product::find($validatedData['product_id'])->name
                ] : null,
                'created_at' => $review->created_at,
                'updated_at' => $review->updated_at
            ];

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Review submitted successfully',
                    'data' => $reviewData
                ], 201);
            }

            return back()->with('success', 'Review submitted successfully');
        } catch (\Exception $e) {
            \Log::error('Error creating review:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }
}
