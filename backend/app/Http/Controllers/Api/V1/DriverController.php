<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Http\Resources\V1\DriverCollection;
use App\Http\Resources\V1\DriverResource;
use App\Models\Drivers;
use App\Filters\V1\DriverFilter;
use App\Models\VehicleDriver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DriverCollection
     */
    public function index(Request $request)
    {
        $filter = new DriverFilter();
        $filterItems = $filter->transform($request);//[['column', 'operator', 'value']]
        $includeVehicles = $request->query('includeVehicles');
        $driver = Drivers::where($filterItems);

        if( $includeVehicles){
            $driver = $driver->with('assignation');
        }

        return new DriverCollection( $driver->get());
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
     * @param  \App\Http\Requests\StoreDriverRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drivers  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Drivers $driver)
    {
        $includeVehicles = request()->query('includeVehicles');
        if( $includeVehicles){
            return new DriverResource($driver->loadMissing('assignation'));
        }

        return new DriverResource($driver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drivers  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Drivers $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriverRequest  $request
     * @param  \App\Models\Drivers  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverRequest $request, Drivers $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drivers  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drivers $driver)
    {
        //
    }
}
