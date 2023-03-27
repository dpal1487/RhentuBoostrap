<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' =>$this->name,
            'description' =>$this->description,
            'status' =>$this->status,
            'image' => $this->image->name,
            'meta_id' =>$this->meta->id,
            'meta_description' =>$this->meta->description,
            'meta_tag' =>$this->meta->tag,
            'meta_keywords' =>$this->meta->keywords,
            'banner' =>$this->banner,
        ];
    }
}
