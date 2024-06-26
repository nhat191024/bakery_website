<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerRequestsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'CustomerRequests_id' => $this->id,
            'CustomerRequests_name' => $this->name,
            'CustomerRequests_phone_number' => $this->phone_number,
            'CustomerRequests_email' => $this->email,
            'CustomerRequests_message' => $this->message,
            'CustomerRequests_status' => $this->status,
        ];
    }
}
