<?php

namespace App\Http\Resources;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Blogs_id' => $this->id,
            'Blogs_title' => $this->title,
            'Blogs_subtitle' => $this->subtitle,
            'Blogs_content' => $this->content,
            'Blogs_images' => $this->images,
            'Blogs_User' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
