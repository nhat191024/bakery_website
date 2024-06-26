<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Categories_id' => $this->id,
            'Categories_name' => $this->name,
            'Categories_description' => $this->description,
            'Categories_image' => $this->image,
            'Categories_Cakes' => new CakesCollection($this->whenLoaded('cakes')),
        ];
    }
}
