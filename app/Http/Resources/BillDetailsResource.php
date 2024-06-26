<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'BillDetails_id' => $this->id,
            'BillDetails_quantity' => $this->quantity,
            'BillDetails_price' => $this->price,
            'BillDetails_total_price' => $this->total_price,
            'BillDetails_Cakes' => new CakesResource($this->whenLoaded('cakes')),
            'BillDetails_Bills' => new BillsResource($this->whenLoaded('bills')),
        ];
    }
}
