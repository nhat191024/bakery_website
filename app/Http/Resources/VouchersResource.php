<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VouchersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Vouchers_id' => $this->id,
            'Vouchers_code' => $this->code,
            'Vouchers_description' => $this->description,
            'Vouchers_discount_type' => $this->discount_type,
            'Vouchers_discount_amount' => $this->discount_amount,
            'Vouchers_discount_percentage' => $this->discount_percentage,
            'Vouchers_min_price' => $this->min_price,
            'Vouchers_quantity' => $this->quantity,
            'Vouchers_start_date' => $this->start_date,
            'Vouchers_end_date' => $this->end_date,
            'Vouchers_status' => $this->status,
        ];
    }
}
