<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user->name,
            'total' => $this->total,
            'status' => $this->status,
        ];
    }
}
