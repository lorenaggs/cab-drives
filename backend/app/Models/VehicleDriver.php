<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleDriver extends Model
{
    use HasFactory;
    protected $table = 'vehicle_drivers';
    protected $fillable = [
        'driver_id',
        'vehicle_id',
        'date_init',
        'date_end'
    ];

    public function driver()
    {
        return $this->belongsTo(Drivers::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
