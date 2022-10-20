<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\DriverFilter;
use App\Filters\V1\VehicleDriverFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleDriverRequest;
use App\Http\Requests\UpdateVehicleDriverRequest;
use App\Http\Resources\V1\DriverCollection;
use App\Http\Resources\V1\VehicleDriverCollection;
use App\Http\Resources\V1\VehicleDriverResource;
use App\Models\Drivers;
use App\Models\VehicleDriver;
use Illuminate\Http\Request;

class VehicleDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
////        $filter = new Vehi
//        return new VehicleDriverCollection(VehicleDriver::all());
//    }
    public function index(Request $request)
    {
        $filter = new VehicleDriverFilter();
        $queryItems = $filter->transform($request);//[['column', 'operator', 'value']]
        $includeDrivers = $request->query('includeDrivers');
        $includeVehicles = $request->query('includeVehicles');
        $vehicleDriver = VehicleDriver::where($queryItems);

        if( $includeDrivers ){
            $vehicleDriver = $vehicleDriver->with('driver');
        }
        if( $includeVehicles ){
            $vehicleDriver = $vehicleDriver->with('vehicle');
        }

        return new VehicleDriverCollection($vehicleDriver->get());

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleDriverRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleDriverRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleDriver  $vehicleDriver
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleDriver $vehicleDriver)
    {
        return new VehicleDriverResource($vehicleDriver);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleDriver  $vehicleDriver
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleDriver $vehicleDriver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleDriverRequest  $request
     * @param  \App\Models\VehicleDriver  $vehicleDriver
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleDriverRequest $request, VehicleDriver $vehicleDriver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleDriver  $vehicleDriver
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleDriver $vehicleDriver)
    {
        //
    }
}
