<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Support\Facades\DB;

use App\Models\{
    Payment
};

class PaymentController extends Controller
{
    protected Payment $payment;

    function __construct(Payment $payment){
        $this->payment = $payment;
    }

    /**
     * Update "payment" - relation with service order
     */
    public function update(UpdatePaymentRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $data = $request['payment'];

            $this->payment->findOrFail($id)->update([
                'type'               => $data['type'],
                'notes'              => $data['notes'],
                'method'             => $data['method'],
                'carrier_pay'        => $data['carrier'],
            ]);

            DB::commit();

            // ADD FLASH MESSAGE
            return redirect()->back();

        } catch(\Exception $exception) {
            DB::rollback();

            // ADD FLASH MESSAGE
            return redirect()->back();
        }
    }
}
