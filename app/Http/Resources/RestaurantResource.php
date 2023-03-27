<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        return [
            'img_url' => $this->img_url,
            'name' => $this->name,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'address' => $this->address,
            'latitude' => $this->whenHas('latitude', $this->latitude),
//            'latitude' => $this->wh,
            'longitude' => $this->longitude,
            'rating' => $this->rating,
            'dishes' => DishResource::collection($this->whenLoaded('dishes')),
            'genre' => new GenreResource($this->whenLoaded('genre')),
        ];
    }
}
