<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::with(['items.product', 'address'])
                         ->where('user_id', auth()->id())
                         ->latest()
                         ->get();
            return response()->json([
                'success' => true,
                'data' => $orders
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching orders',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'items' => 'required|array',
                'items.*.product_id' => 'required|exists:products,id',
                'items.*.quantity' => 'required|integer|min:1',
                'address' => 'required|array',
                'address.first_name' => 'required|string',
                'address.last_name' => 'required|string',
                'address.phone' => 'required|string',
                'address.street_address' => 'required|string',
                'address.city' => 'required|string',
                'address.state' => 'required|string',
                'address.zip_code' => 'required|string',
                'payment_method' => 'required|string|in:stripe,cod'
            ]);

            $order = Order::create([
                'user_id' => auth()->id(),
                'payment_method' => $validated['payment_method'],
                'payment_status' => 'pending',
                'status' => 'new'
            ]);

            $order->items()->createMany($validated['items']);
            $order->address()->create($validated['address']);

            return response()->json([
                'success' => true,
                'data' => $order->load(['items.product', 'address'])
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating order',
                'error' => $e->getMessage()
            ], 422);
        }
    }

    public function show($id)
    {
        try {
            $order = Order::with(['items.product', 'address'])
                         ->where('user_id', auth()->id())
                         ->findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $order
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }
} 