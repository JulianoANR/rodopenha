<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceOrderRequest;
use App\Http\Requests\UpdateServiceOrderRequest;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Enums\{
    StatusEnum,
    ReferenceContactsEnum
};

use App\Models\{
    Payment,
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
    protected Payment $payment;
    protected user $user;

    function __construct(
        ServiceOrder $serviceOrder,
        Vehicle $vehicle,
        Contact $contact,
        Pickup $pickup,
        Delivery $delivery,
        Shipper $shipper,
        Payment $payment,
        User $user
    ){
        $this->serviceOrder = $serviceOrder;
        $this->vehicle = $vehicle;
        $this->contact = $contact;
        $this->pickup = $pickup;
        $this->delivery = $delivery;
        $this->shipper = $shipper;
        $this->payment = $payment;
        $this->user = $user;
    }

    public function index()
    {
        $serviceOrders = $this->serviceOrder->with([
            'pickup', 'delivery'
        ])->get();

        return view('pages.serviceOrders.index', ['serviceOrders' => $serviceOrders]);
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

    public function create()
    {
        $this->authorize('isAdmin');
        return view('pages.serviceOrders.create');
    }

    public function store(StoreServiceOrderRequest $request)
    {
        DB::beginTransaction();
        $data = $request->except('_token');

        try {
            /**
             * BASIC INSERT
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
             * VEHICLES INSERT
             */
            $vehicles = collect($data['vehicles']);

            $vehicles->each(function ($vehicle, $key) use ($serviceOrder) {

                $this->vehicle->create([
                    'vin'              => $vehicle['vin'],
                    'make'             => $vehicle['make'],
                    'model'            => $vehicle['model'],
                    'year'             => $vehicle['year'],
                    'color'            => $vehicle['color'],
                    'operable'         => $vehicle['operable'],
                    'lot_number'       => $vehicle['lot_number'],
                    'buyer_number'     => $vehicle['buyer'],

                    'vehicle_type_id'  => $vehicle['type'],
                    'service_order_id' => $serviceOrder->id
                ]);
            });

            /**
             * PICKUP INSERT
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
                'signature_required' => !isset($pickup['not_signature']),

                'contact_id'         => $contact_pickup->id,
                'service_order_id'   => $serviceOrder->id
            ]);

            /**
             * DELIVERY INSERT
             */
            $delivery = $data['delivery'];

            $insert_contact_delivery = [
                'name'         => $pickup['name'],
                'email'        => $pickup['email'],
                'phone'        => $pickup['phone']
            ];

            if($delivery['type_contact'] === 'business') {
                $contact_delivery = $this->contact->create([
                    'ref'   => ReferenceContactsEnum::DELIVERY,
                    'type'  => 'business',

                    'company'      => $pickup['company'],
                    'working_from' => $pickup['working_from'],
                    'working_to'   => $pickup['working_to'],

                    ...$insert_contact_delivery
                ]);
            } else{
                $contact_delivery = $this->contact->create([
                    'ref'   => ReferenceContactsEnum::DELIVERY,
                    'type'  => 'personal',

                    ...$insert_contact_delivery
                ]);
            }

            $this->delivery->create([
                'zip'                => $pickup['zip'],
                'date'               => $pickup['date'],
                'notes'              => $pickup['notes'],
                'address'            => $pickup['address'],
                'signature_required' => !isset($delivery['not_signature']),

                'contact_id'         => $contact_delivery->id,
                'service_order_id'   => $serviceOrder->id
            ]);

            /**
             * SHIPPER INSERT
             */
            $shipper = $data['shipper'];

            $insert_contact_shipper = [
                'name'         => $shipper['name'],
                'email'        => $shipper['email'],
                'phone'        => $shipper['phone']
            ];

            if($delivery['type_contact'] === 'business') {
                $contact_shipper = $this->contact->create([
                    'ref'   => ReferenceContactsEnum::SHIPPER,
                    'type'  => 'business',

                    'company'      => $pickup['company'],
                    'working_from' => $pickup['working_from'],
                    'working_to'   => $pickup['working_to'],

                    ...$insert_contact_shipper
                ]);
            } else{
                $contact_shipper = $this->contact->create([
                    'ref'   => ReferenceContactsEnum::SHIPPER,
                    'type'  => 'personal',

                    ...$insert_contact_shipper
                ]);
            }

            $this->shipper->create([
                'zip'                => $pickup['zip'],
                'notes'              => $pickup['notes'],
                'address'            => $pickup['address'],

                'contact_id'         => $contact_shipper->id,
                'service_order_id'   => $serviceOrder->id
            ]);

            /**
             * PAYMENT INSERT
             */
            $payment = $data['payment'];

            $this->payment->create([
                'type'               => $payment['type'],
                'internal_notes'     => $payment['notes'],
                'method'             => $payment['method'],
                'carrier_pay'        => $payment['carrier'],

                'service_order_id'   => $serviceOrder->id
            ]);

            DB::commit();

            // ADD FLASH MESSAGE
            return redirect()->route('service-orders.show', $serviceOrder->id);

        } catch(\Exception $exception) {
            DB::rollback();

            // ADD FLASH MESSAGE
            return redirect()->back();
        }
    }

    public function update(UpdateServiceOrderRequest $request, $id)
    {
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
