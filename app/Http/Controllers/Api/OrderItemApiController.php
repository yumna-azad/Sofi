<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderItemApiController extends Controller
{
    /**
     * Display a listing of the order items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(OrderItem::with(['order', 'product'])->get(), 200);
    }

    /**
     * Store a newly created order item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'unit_amount' => 'required|numeric',
        ]);

        $orderItem = OrderItem::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'unit_amount' => $request->unit_amount,
            'total_amount' => $request->unit_amount * $request->quantity,
        ]);

        return response()->json($orderItem, 201);
    }

    /**
     * Display the specified order item.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orderItem)
    {
        return response()->json($orderItem->load(['order', 'product']), 200);
    }

    /**
     * Update the specified order item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'unit_amount' => 'required|numeric',
        ]);

        $orderItem->update([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'unit_amount' => $request->unit_amount,
            'total_amount' => $request->unit_amount * $request->quantity,
        ]);

        return response()->json($orderItem, 200);
    }

    /**
     * Remove the specified order item from storage.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return response()->json(null, 204);
    }
}
