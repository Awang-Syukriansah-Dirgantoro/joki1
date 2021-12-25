<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\{ Cart, Product, Order };

class CartController extends Controller
{
    public function index()
    {
        return CartResource::collection(Cart::with(['product:id,name,price'])
        ->whereRelation('order', 'status', 'pending')->get());
    }

    public function store()
    {
        $data = $this->check(request()->all(), [
            'product_id' => ['required', 'numeric'],
            'qty' => ['required', 'numeric'],
        ]);

        $order = Order::whereRelation('user', 'id', auth()->id())
        ->firstOrCreate(
            ['status' => 'pending', 'user_id' => auth()->id()],
            ['total' => 0]
        );

        $order->carts()->create([
            'product_id' => $data['product_id'],
            'qty' => $data['qty'],
            'subtotal' => Product::find($data['product_id'])->price * $data['qty'],
        ]);

        return $this->json_res(['message' => "Added to Cart"]);
    }

    public function show(Cart $cart)
    {
        return new CartResource($cart);
    }

    public function update(Cart $cart)
    {
        $data = $this->check(request()->all(), [
            'qty' => ['required', 'numeric'],
        ]);

        $cart->update([
            'qty' => $data['qty'],
            'subtotal' => $cart->product()->price * $data['qty'],
        ]);

        return $this->json_res(['message' => "Cart Item Updated"]);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return $this->json_res(['message' => "Cart Item Deleted"]);
    }
}
