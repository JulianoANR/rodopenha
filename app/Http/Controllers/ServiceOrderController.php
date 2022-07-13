<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceOrderRequest;
use App\Http\Requests\UpdateServiceOrderRequest;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Enums\{
    StatusEnum,
    ReferenceContactsEnum
};

use App\Models\{
    ServiceOrder,
    Vehicle,
    Contact,
    Pickup,
    Delivery,
    Shipper,
    User
};

class ServiceOrderController extends Controller
{
    protected ServiceOrder $serviceOrder;
    protected Vehicle $vehicle;
    protected Contact $contact;
    protected Pickup $pickup;
    protected Delivery $delivery;
    protected Shipper $shipper;

    function __construct(
        ServiceOrder $serviceOrder,
        Vehicle $vehicle,
        Contact $contact,
        Pickup $pickup,
        Delivery $delivery,
        Shipper $shipper
    ){
        $this->serviceOrder = $serviceOrder;
        $this->vehicle = $vehicle;
        $this->contact = $contact;
        $this->pickup = $pickup;
        $this->delivery = $delivery;
        $this->shipper = $shipper;
    }

    public function index()
    {
        $serviceOrders = $this->serviceOrder->with([
            'pickup', 'delivery'
        ])->get();

        return view('pages.serviceOrders.index', ['serviceOrders' => $serviceOrders]);
    }

    public function create()
    {
        $this->authorize('isAdmin');
        return view('pages.serviceOrders.create');
    }

    public function store(StoreServiceOrderRequest $request)
    {
        $this->authorize('isAdmin');
        DB::beginTransaction();

        try {
            $data = $request->except('_token');
            dd($data);

            /**
             * Basic insert
             */
            $basic = $data['basic'];

            $serviceOrder = $this->serviceOrder->create([
                'load_id'              => $basic['load_id'],
                'trailer_type'         => $basic['trailer_type'],
                'inspection_type'      => $basic['inspection_type'],
                'dispatch_instruction' => $basic['dispatch_instructions'],
                'status'               => StatusEnum::NEW,
            ]);

             /**
              * Pickup insert
              */
            $pickup = $data['pickup'];

            if($pickup['type_contact'] === 'business') {
                $contact_pickup = $this->contact->create([
                    'ref'   => ReferenceContactsEnum::PICKUP,
                    'type'  => 'business',

                    'name'         => $pickup['name'],
                    'email'        => $pickup['email'],
                    'phone'        => $pickup['phone'],
                    'company'      => $pickup['company'],
                    'working_from' => $pickup['working_from'],
                    'working_to'   => $pickup['working_to']
                ]);
            } else{
                $contact_pickup = $this->contact->create([
                    'ref'   => ReferenceContactsEnum::PICKUP,
                    'type'  => 'personal',

                    'name'  => $pickup['name'],
                    'email' => $pickup['email'],
                    'phone' => $pickup['phone'],
                ]);
            }

            $this->pickup->create([
                'zip'                => $pickup['zip'],
                'date'               => $pickup['date'],
                'notes'              => $pickup['notes'],
                'address'            => $pickup['address'],
                'signature_required' => !$pickup['not_signature'],

                'contact_id'         => $contact_pickup->id,
                'service_order_id'   => $serviceOrder->id
            ]);

            DB::commit();

        } catch(\Exception) {
            // ...
            DB::rollback();
        }
    }

    public function show($id)
    {
        $serviceOrder = $this->serviceOrder->with([
            'vehicles',
            'pickup',
            'delivery',
            'shipper',
            'payment'
        ])->findOrFail($id);

        return view('pages.serviceOrders.show', ['serviceOrder' => $serviceOrder]);
    }

    public function update(UpdateServiceOrderRequest $request, $id)
    {
        /**
         * Atualizar dados básicos dos serviços
         */
        $serviceOrder = $this->serviceOrder->findOrFail($id);
        dd($serviceOrder);
    }

    public function destroy($id)
    {
        $serviceOrder = $this->serviceOrder->findOrFail($id);
        dd($serviceOrder);
    }

    public function restore($id)
    {
        $serviceOrder = $this->serviceOrder->withTrashed()->findOrFail($id);
        dd($serviceOrder);
    }
}
