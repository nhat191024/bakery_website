<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CakesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Cakes_id' => $this->id,
            'Cakes_name' => $this->name,
            'Cakes_description' => $this->description,
            'Cakes_real_price' => $this->real_price,
            'Cakes_higher_price' => $this->higher_price,
            'Cakes_image' => $this->image,
            'Cakes_Categories' => new CategoriesResource($this->whenLoaded('categories')),
            'Cakes_Bill_details' => new BillDetailsCollection($this->whenLoaded('bill_details')),
            'Cakes_Promotions' => new PromotionsCollection($this->whenLoaded('promotions')),
        ];
    }
}
