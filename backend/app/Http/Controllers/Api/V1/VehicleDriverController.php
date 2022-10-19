<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleDriverRequest;
use App\Http\Requests\UpdateVehicleDriverRequest;
use App\Http\Resources\V1\VehicleDriverCollection;
use App\Http\Resources\V1\VehicleDriverResource;
use App\Models\VehicleDriver;

class VehicleDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new VehicleDriverCollection(VehicleDriver::class);
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
