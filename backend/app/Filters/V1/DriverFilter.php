<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class DriverFilter extends ApiFilter {

    protected $safeParams = [
        'dni'=>['eq'],
        'name'=>['eq'],
        'lastName'=>['eq'],
    ];

    protected $columnMap = [
        'lastName'=>'last_name'
    ];

    protected $operatorMap = [
        'eq'=> '='
    ];


}
