<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipperRequest extends FormRequest
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
        ];
    }
}
