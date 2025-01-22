<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        try {
            $reviews = Review::with(['user:id,name', 'product:id,name'])->get();
            return response()->json([
                'success' => true,
                'data' => $reviews
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching reviews',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_id' => 'required|exists:products,id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string|max:500'
            ]);

            $review = Review::create([
                'user_id' => auth()->id(),
                'product_id' => $validated['product_id'],
                'rating' => $validated['rating'],
                'comment' => $validated['comment']
            ]);

            return response()->json([
                'success' => true,
                'data' => $review->load(['user:id,name', 'product:id,name'])
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating review',
                'error' => $e->getMessage()
            ], 422);
        }
    }

    public function show($id)
    {
        try {
            $review = Review::with(['user:id,name', 'product:id,name'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $review
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Review not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $review->update($validated);

        return response()->json($review);
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        
        $review->delete();
        return response()->json(null, 204);
    }
} 