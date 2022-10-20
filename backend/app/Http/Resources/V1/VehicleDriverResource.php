<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleDriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id'=>$this->id,
            'driverId'=>$this->driver_id,
            'vehicleId'=>$this->vehicle_id,
            'dateStart'=>$this->date_init,
            'dateEnd'=>$this->date_end,
            'driver'=> new DriverResource($this->whenLoaded('driver')),
            'vehicle'=> new VehicleResource($this->whenLoaded('vehicle'))
        ];
    }
}
