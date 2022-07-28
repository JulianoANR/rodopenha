<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceOrderRequest extends FormRequest
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
            'basic.load_id'               => __('ID load'),
            'basic.trailer_type'          => __('trailer type'),
            'basic.inspection_type'       => __('inspection type'),
            'basic.dispatch_instructions' => __('dispatch instructions'),
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
        ];
    }
}
