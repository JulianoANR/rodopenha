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

            'pickup.type_contact' => __('contact type'),
            'pickup.name'         => __('name'),
            'pickup.email'        => __('email'),
            'pickup.phone'        => __('phone'),
            'pickup.address'      => __('address'),
            'pickup.notes'        => __('notes'),
            'pickup.zip'          => __('zip'),
            'pickup.date'         => __('date'),
            'pickup.company'      => __('company'),
            'pickup.working_from' => __('working from'),
            'pickup.working_to'   => __('working to'),

            'delivery.type_contact' => __('contact type'),
            'delivery.name'         => __('name'),
            'delivery.email'        => __('email'),
            'delivery.phone'        => __('phone'),
            'delivery.address'      => __('address'),
            'delivery.notes'        => __('notes'),
            'delivery.zip'          => __('zip'),
            'delivery.date'         => __('date'),
            'delivery.company'      => __('company'),
            'delivery.working_from' => __('working from'),
            'delivery.working_to'   => __('working to'),

            'shipper.type_contact' => __('contact type'),
            'shipper.name'         => __('name'),
            'shipper.email'        => __('email'),
            'shipper.phone'        => __('phone'),
            'shipper.address'      => __('address'),
            'shipper.notes'        => __('notes'),
            'shipper.zip'          => __('zip'),
            'shipper.date'         => __('date'),
            'shipper.company'      => __('company'),
            'shipper.working_from' => __('working from'),
            'shipper.working_to'   => __('working to'),

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
            'vehicles.*.operable'   => 'required|boolean',
            'vehicles.*.type'       => 'required',
            'vehicles.*.lot_number' => 'required',
            'vehicles.*.buyer'      => 'required',
        ];
    }
}
