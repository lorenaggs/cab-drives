<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleDriverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'driverId' => ['required'],
            'vehicleId' => ['required'],
            'dateInit' => ['required'],
            'dateEnd' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'driver_id'=>$this->driverId,
            'vehicle_id'=>$this->vehicleId,
            'date_init'=>$this->dateInit,
            'date_end'=>$this->dateEnd,
        ]);
    }
}
