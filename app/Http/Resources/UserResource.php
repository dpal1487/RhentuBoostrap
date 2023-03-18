<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ImageResource;
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
            'first_name'=>$this->first_name,
            'email'=>$this->email,
            'image' => new ImageResource($this->image),
            'address' => new AddressResource($this->address),

        ];
    }
}
