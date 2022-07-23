<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rule;

use App\Enums\{
    PaymentMethodsEnum,
    PaymentTypesEnum
};

class StoreServiceOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return  $this->user()->can('isAdmin');
    }

    /**
     *
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            'basic.load_id'               => __('ID load'),
            'basic.trailer_type'          => __('trailer type'),
            'basic.inspection_type'       => __('inspection type'),
            'basic.dispatch_instructions' => __('dispatch instructions'),

            'pickup.type_contact' => __('pickup contact type'),
            'pickup.name'         => __('pickup name'),
            'pickup.email'        => __('pickup email'),
            'pickup.phone'        => __('pickup phone'),
            'pickup.address'      => __('pickup address'),
            'pickup.notes'        => __('pickup notes'),
            'pickup.zip'          => __('pickup zip'),
            'pickup.date'         => __('pickup notes'),

            'delivery.type_contact' => __('delivery contact type'),
            'delivery.name'         => __('delivery name'),
            'delivery.email'        => __('delivery email'),
            'delivery.phone'        => __('delivery phone'),
            'delivery.address'      => __('delivery address'),
            'delivery.notes'        => __('delivery notes'),
            'delivery.zip'          => __('delivery zip'),
            'delivery.date'         => __('delivery notes'),

            'shipper.type_contact' => __('shipper contact type'),
            'shipper.name'         => __('shipper name'),
            'shipper.email'        => __('shipper email'),
            'shipper.phone'        => __('shipper phone'),
            'shipper.address'      => __('shipper address'),
            'shipper.notes'        => __('shipper notes'),
            'shipper.zip'          => __('shipper zip'),
            'shipper.date'         => __('shipper notes'),

            'payment.carrier' => __('carrier pay'),
            'payment.notes'   => __('payment notes'),
            'payment.method'  => __('method'),
            'payment.type'    => __('type'),
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
             * Basic validation
             */
            'basic.load_id'               => 'required|string',
            'basic.trailer_type'          => ['required', Rule::in(['opened', 'closed'])],
            'basic.inspection_type'       => ['required', Rule::in(['standard', 'M22'])],
            'basic.dispatch_instructions' => 'nullable|min:3',

            /**
             * Pickup validation
             */
            'pickup.name'    => 'required|min:3',
            'pickup.email'   => 'required|email',
            'pickup.phone'   => 'required',
            'pickup.address' => 'required',
            'pickup.notes'   => 'nullable|min:3',
            'pickup.zip'     => 'required',
            'pickup.date'    => 'required|date',
            'pickup.company' => 'sometimes|required',
            'pickup.working_from' => 'sometimes|required',
            'pickup.working_to'   => 'sometimes|required',

            /**
             * Delivery validation
             */
            'delivery.name'    => 'required|min:3',
            'delivery.email'   => 'required|email',
            'delivery.phone'   => 'required',
            'delivery.address' => 'required',
            'delivery.notes'   => 'nullable|min:3',
            'delivery.zip'     => 'required',
            'delivery.date'    => 'required|date',
            'delivery.company' => 'sometimes|required',
            'delivery.working_from' => 'sometimes|required',
            'delivery.working_to'   => 'sometimes|required',

            /**
             * Shipper Validation
             */
            'shipper.name'    => 'required|min:3',
            'shipper.email'   => 'required|email',
            'shipper.phone'   => 'required',
            'shipper.address' => 'required',
            'shipper.notes'   => 'nullable|min:3',
            'shipper.zip'     => 'required',
            'shipper.company' => 'sometimes|required',
            'shipper.working_from' => 'sometimes|required',
            'shipper.working_to'   => 'sometimes|required',

            /**
             * Payment validation
             */
            'payment.carrier' => 'required',
            'payment.notes'   => 'nullable|min:3',
            'payment.method'  => ['required', new Enum(PaymentMethodsEnum::class)],
            'payment.type'    => ['required', new Enum(PaymentTypesEnum::class)],

            /**
             * Vehicles validation
             */
            'vehicles.*.vin'        => 'required',
            'vehicles.*.make'       => 'required',
            'vehicles.*.model'      => 'required',
            'vehicles.*.year'       => 'required',
            'vehicles.*.color'      => 'required',
            'vehicles.*.operable'   => 'required',
            'vehicles.*.type'       => 'required',
            'vehicles.*.lot_number' => 'required',
            'vehicles.*.buyer'      => 'required',
        ];
    }
}
