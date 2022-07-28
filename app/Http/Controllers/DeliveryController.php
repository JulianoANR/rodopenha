<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDeliveryRequest;
use Illuminate\Support\Facades\DB;

use App\Models\{
    Contact,
    Delivery
};

class DeliveryController extends Controller
{
    protected Contact $contact;
    protected Delivery $delivery;

    function __construct(Delivery $delivery, Contact $contact){
        $this->contact = $contact;
        $this->delivery = $delivery;
    }

    public function update(UpdateDeliveryRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            /**
             * Update "delivery" - relation with service order
             */
            $data = $request['delivery'];

            $delivery = $this->delivery->findOrFail($id);

            if($data['type_contact'] === 'business') {
                $delivery->contact->update([
                    'type'  => 'business',

                    'name'         => $data['name'],
                    'email'        => $data['email'],
                    'phone'        => $data['phone'],
                    'company'      => $data['company'],
                    'working_from' => $data['working_from'],
                    'working_to'   => $data['working_to']
                ]);
            } else {
                $delivery->contact->update([
                    'type'  => 'personal',

                    'name'         => $data['name'],
                    'email'        => $data['email'],
                    'phone'        => $data['phone'],
                    'company'      => null,
                    'working_from' => null,
                    'working_to'   => null
                ]);
            }

            $delivery->update([
                'zip'                => $data['zip'],
                'date'               => $data['date'],
                'notes'              => $data['notes'],
                'address'            => $data['address'],
                'signature_required' => !isset($data['not_signature'])
            ]);

            DB::commit();

            // ADD FLASH MESSAGE
            return redirect()->back();

        } catch(\Exception $exception) {
            DB::rollback();

            // ADD FLASH MESSAGE
            dd($exception->getMessage());
            return redirect()->back();
        }
    }
}
