<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderApiController extends Controller
{
    public function index()
    {
        return response()->json(Order::with(['user', 'items', 'address'])->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'grand_total' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'status' => 'required|string',
            'currency' => 'required|string|max:3',
        ]);

        $order = Order::create($request->all());

        return response()->json($order, 201);
    }

    public function show(Order $order)
    {
        return response()->json($order->load(['user', 'items', 'address']), 200);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'string',
            'payment_status' => 'string',
        ]);

        $order->update($request->all());

        return response()->json($order, 200);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(null, 204);
    }
}
