<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'slug'=>$this->slug,
            'base_url'=>$this->base_url,
            'description'=>$this->description,
            'rent_price'=>$this->rent_price,
            'time_id'=>$this->time_id,
            'security_price'=>$this->security_price,
            'from_date'=>$this->from_date,
            'to_date'=>$this->to_date,

            'status' => new ItemStatusesResource($this->status),
        ];
    }
}
