<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class VehicleDriverFilter extends ApiFilter {
    protected $safeParams = [
        'driverId'=>['eq'],
        'vehicleId'=>['eq'],
    ];
//'dateStart'=>'date_init',
//'dateEnd'=>'date_end'
    protected $columnMap = [
        'driverId'=>'driver_id',
        'vehicleId'=>'vehicle_id',
    ];

    protected $operatorMap = [
        'eq'=> '='
    ];
}
