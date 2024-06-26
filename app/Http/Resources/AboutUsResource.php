<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'About_us_id' => $this->id,
            'About_us_title' => $this->title,
            'About_us_description' => $this->description,
            'About_us_content' => $this->content,
            'About_us_image' => $this->image,
        ];
    }
}
