<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeliveryRequest extends FormRequest
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

    /**W
     *
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
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
             * Delivery validation
             */
            'delivery.name'         => 'required|min:3',
            'delivery.email'        => 'required|email',
            'delivery.phone'        => 'required',
            'delivery.address'      => 'required',
            'delivery.notes'        => 'nullable|min:3',
            'delivery.zip'          => 'required',
            'delivery.date'         => 'required|date',
            'delivery.company'      => 'sometimes|required',
            'delivery.working_from' => 'sometimes|required',
            'delivery.working_to'   => 'sometimes|required',
        ];
    }
}
