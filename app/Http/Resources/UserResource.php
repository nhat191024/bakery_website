<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Users_id' => $this->id,
            'Users_email' => $this->email,
            'Users_address' => $this->address,
            'Users_phone_number' => $this->phone_number,
            'Users_role' => $this->role,
            'Users_status' => $this->status,
            'Users_Promotions' => new PromotionsCollection($this->whenLoaded('promotions')),
            'Users_Blogs' => new BlogsCollection($this->whenLoaded('blogs')),
        ];
    }
}
