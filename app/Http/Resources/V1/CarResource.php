<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Brand;
use App\Models\CarModel;
class CarResource extends JsonResource

{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'brand' => new BrandviaModelResource(CarModel::findOrFail($this->model_id)),
            'photo' => $this->photo,
            'price' => $this->price
        ];
    }
}
