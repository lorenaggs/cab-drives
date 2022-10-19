<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleDriver extends Model
{
    use HasFactory;

    public function drivers()
    {
        return $this->belongsTo(Driver::class);
    }

    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
