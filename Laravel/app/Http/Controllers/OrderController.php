<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::whereRelation('user', 'id', auth()->id())->get());
    }

    public function show(Order $order)
    {
        return new OrderResource($order->with(['user', 'carts.product']));
    }

    public function update(Order $order)
    {
        $order->update(['status' => 'success']);
        return $this->json_res(['message' => 'Order Updated']);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return $this->json_res(['message' => 'Order Deleted']);
    }
}
