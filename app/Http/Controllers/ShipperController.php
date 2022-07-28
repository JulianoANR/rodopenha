<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateShipperRequest;

use App\Models\{
    Contact,
    Shipper
};

class ShipperController extends Controller
{
    protected Contact $contact;
    protected Shipper $shipper;

    function __construct(Shipper $shipper, Contact $contact){
        $this->contact = $contact;
        $this->shipper = $shipper;
    }

    public function update(UpdateShipperRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            /**
             * Update "pickup" - relation with service order
             */
            $data = $request['shipper'];

            $shipper = $this->shipper->findOrFail($id);

            if($data['type_contact'] === 'business') {
                $shipper->contact->update([
                    'type'  => 'business',

                    'name'         => $data['name'],
                    'email'        => $data['email'],
                    'phone'        => $data['phone'],
                    'company'      => $data['company'],
                    'working_from' => $data['working_from'],
                    'working_to'   => $data['working_to']
                ]);
            } else {
                $shipper->contact->update([
                    'type'  => 'personal',

                    'name'         => $data['name'],
                    'email'        => $data['email'],
                    'phone'        => $data['phone'],
                    'company'      => null,
                    'working_from' => null,
                    'working_to'   => null
                ]);
            }

            $shipper->update([
                'zip'                => $data['zip'],
                'notes'              => $data['notes'],
                'address'            => $data['address'],
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
