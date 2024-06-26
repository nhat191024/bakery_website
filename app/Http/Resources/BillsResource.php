<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Bills_id' => $this->id,
            'Bills_order_date' => $this->order_date,
            'Bills_full_name' => $this->full_name,
            'Bills_address' => $this->address,
            'Bills_phone_number' => $this->phone_number,
            'Bills_email' => $this->email,
            'Bills_delivery_method' => $this->delivery_method,
            'Bills_checkout_method' => $this->checkout_method,
            'Bills_total_amount' => $this->total_amount,
            'Bills_status' => $this->status,
        ];
    }
}
