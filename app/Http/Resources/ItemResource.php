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
            'id' => $this->id,
            'title' => $this->name,
            'slug'=>$this->slug,
            'base_url'=>$this->base_url,
            'description'=>$this->description,
            'rent_price'=>$this->rent_price,
            'time_id'=>$this->time_id,
            'security_price'=>$this->security_price,
            'from_date'=>$this->from_date,
            'to_date'=>$this->to_date,
            'category' => $this->category->name,
            'time' => $this->time->title,

            'images' => ItemImagesResource::collection($this->image->images),
            'user' => new UserResource($this->user),


            'currency_symbol' => $this->user->country->currency_symbol,
            'rating_reviews' => count($this->reviews) > 0 ? [
              'rating' => round($this->placeRating($this->reviews), 1),
              'count' => count($this->reviews)
            ] : [
              'rating' => 0,
              'count' =>0
            ] ,
            'location' => [
              'city' => $this->location->city,
              'state' => $this->location->state,
              'locality' => $this->location->locality,
              'pincode' => $this->location->pincode,
            ],
            'isFavourite' => $this->isFavourite ? true : false,

          ];
        }
}
