<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'make_name' => $this->make->name,
            'model' => $this->model,
            'horsepower' => $this->horsepower,
            'year_of_issue' => $this->year_of_issue
        ];
    }
}
