<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    use HasFactory;

    public function assignation(){
        return $this->hasMany(VehicleDriver::class, 'driver_id');
    }
}
