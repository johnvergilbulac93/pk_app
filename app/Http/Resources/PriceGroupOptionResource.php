<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceGroupOptionResource extends JsonResource
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
            'label' => $this->prc_name,
            'value' => $this->prc_code,
            'description' => $this->prc_name ?? ""
        ];
    }
}
