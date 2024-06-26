<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Banners_id' => $this->id,
            'Banners_title' => $this->title,
            'Banners_subtitle' => $this->subtitle,
            'Banners_image' => $this->image,
            'Banners_link' => $this->link,
            'Banners_start_date' => $this->start_date,
            'Banners_end_date' => $this->end_date,
            'Banners_status' => $this->status,
        ];
    }
}
