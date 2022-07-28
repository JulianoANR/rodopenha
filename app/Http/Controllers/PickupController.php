<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePickupRequest;
use Illuminate\Support\Facades\DB;

use App\Models\{
    Contact,
    Pickup
};

class PickupController extends Controller
{
    protected Contact $contact;
    protected Pickup $pickup;

    function __construct(Pickup $pickup, Contact $contact){
        $this->contact = $contact;
        $this->pickup = $pickup;
    }

    public function update(UpdatePickupRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            /**
             * Update "pickup" - relation with service order
             */
            $data = $request['pickup'];

            $pickup = $this->pickup->findOrFail($id);

            if($data['type_contact'] === 'business') {
                $pickup->contact->update([
                    'type'  => 'business',

                    'name'         => $data['name'],
                    'email'        => $data['email'],
                    'phone'        => $data['phone'],
                    'company'      => $data['company'],
                    'working_from' => $data['working_from'],
                    'working_to'   => $data['working_to']
                ]);
            } else {
                $pickup->contact->update([
                    'type'  => 'personal',

                    'name'         => $data['name'],
                    'email'        => $data['email'],
                    'phone'        => $data['phone'],
                    'company'      => null,
                    'working_from' => null,
                    'working_to'   => null
                ]);
            }

            $pickup->update([
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
            return redirect()->back();
        }
    }
}
