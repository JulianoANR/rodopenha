<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVehicleRequest extends FormRequest
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
     *
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            /**
             * Vehicles validation
             */
            'vehicle.*.vin'        => __('vin'),
            'vehicle.*.make'       => __('make'),
            'vehicle.*.model'      => __('model'),
            'vehicle.*.year'       => __('year'),
            'vehicle.*.color'      => __('color'),
            'vehicle.*.operable'   => __('operable'),
            'vehicle.*.type'       => __('type'),
            'vehicle.*.lot_number' => __('lot number'),
            'vehicle.*.buyer'      => __('buyer'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            /**
             * Vehicles validation
             */
            'vehicle.*.vin'        => 'required',
            'vehicle.*.make'       => 'required',
            'vehicle.*.model'      => 'required',
            'vehicle.*.year'       => 'required',
            'vehicle.*.color'      => 'required',
            'vehicle.*.operable'   => 'required|boolean',
            'vehicle.*.type'       => 'required',
            'vehicle.*.lot_number' => 'required',
            'vehicle.*.buyer'      => 'required',
        ];
    }
}
