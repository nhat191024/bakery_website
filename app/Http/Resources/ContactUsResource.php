<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ContactUs_id' => $this->id,
            'ContactUs_name' => $this->name,
            'ContactUs_phone_number' => $this->phone_number,
            'ContactUs_email' => $this->email,
            'ContactUs_address' => $this->address,
        ];
    }
}
