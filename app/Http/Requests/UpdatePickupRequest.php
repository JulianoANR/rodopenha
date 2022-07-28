<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePickupRequest extends FormRequest
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
             * Pickup validation
             */
            'pickup.name'         => 'required|min:3',
            'pickup.email'        => 'required|email',
            'pickup.phone'        => 'required',
            'pickup.address'      => 'required',
            'pickup.notes'        => 'nullable|min:3',
            'pickup.zip'          => 'required',
            'pickup.date'         => 'required|date',
            'pickup.company'      => 'sometimes|required',
            'pickup.working_from' => 'sometimes|required',
            'pickup.working_to'   => 'sometimes|required',
        ];
    }
}
