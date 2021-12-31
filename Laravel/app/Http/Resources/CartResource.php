<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'order' => $this->order->user->name,
            'product' => $this->product->name,
            'qty' => $this->qty,
            'subtotal' => $this->subtotal,
        ];
    }
}
