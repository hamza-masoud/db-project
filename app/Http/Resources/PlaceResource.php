<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'gps' => $this->gps,
            'price' => $this->price,
            'description' => $this->description,
            'image'=> ImageResource::collection(ImageResource::class),
            'status' => $this->status,
            'governorate_name' => $this->governorate_name,
            'category_name' => $this->category_name,
            // 'category'=>$this->category,
        ];
    }
}
