<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\PaymentMethodsEnum;
use App\Enums\PaymentTypesEnum;

class UpdatePaymentRequest extends FormRequest
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
             * Payment validation
             */
            'payment.carrier' => 'required',
            'payment.notes'   => 'nullable|min:3',
            'payment.method'  => ['required', new Enum(PaymentMethodsEnum::class)],
            'payment.type'    => ['required', new Enum(PaymentTypesEnum::class)],
        ];
    }
}
