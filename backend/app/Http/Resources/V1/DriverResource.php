<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
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
            'id'=>$this->id,
            'dni'=>$this->dni,
            'name'=>$this->name,
            'lastName'=>$this->last_name,
            'phone'=>$this->phone
       ];
    }
}
