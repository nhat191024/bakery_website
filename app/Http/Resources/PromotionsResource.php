<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Promotions_id' => $this->id,
            'Promotions_description' => $this->description,
            'Promotions_start_time' => $this->start_time,
            'Promotions_end_time' => $this->end_time,
            'Promotions_discount_percentage' => $this->discount_percentage,
            'Promotions_discount_amount' => $this->discount_amount,
            'Promotions_discount_type' => $this->discount_type,
            'Promotions_User' => new UserResource($this->whenLoaded('user')),
            'Promotions_Cakes' => new CakesResource($this->whenLoaded('cakes')),
        ];
    }
}
