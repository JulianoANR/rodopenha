<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceOrderRequest;
use App\Http\Requests\UpdateServiceOrderRequest;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\Rule;
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
                'load_id'               => $basic['load_id'],
                'trailer_type'          => $basic['trailer_type'],
                'inspection_type'       => $basic['inspection_type'],
                'dispatch_instructions' => $basic['dispatch_instructions'],
                'status'                => StatusEnum::NEW,
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
                'name'         => $delivery['name'],
                'email'        => $delivery['email'],
                'phone'        => $delivery['phone']
            ];

            if($delivery['type_contact'] === 'business') {
                $contact_delivery = $this->contact->create([
                    'ref'   => ReferenceContactsEnum::DELIVERY,
                    'type'  => 'business',

                    'company'      => $delivery['company'],
                    'working_from' => $delivery['working_from'],
                    'working_to'   => $delivery['working_to'],

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
                'zip'                => $delivery['zip'],
                'date'               => $delivery['date'],
                'notes'              => $delivery['notes'],
                'address'            => $delivery['address'],
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

                    'company'      => $shipper['company'],
                    'working_from' => $shipper['working_from'],
                    'working_to'   => $shipper['working_to'],

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
                'zip'                => $shipper['zip'],
                'notes'              => $shipper['notes'],
                'address'            => $shipper['address'],

                'contact_id'         => $contact_shipper->id,
                'service_order_id'   => $serviceOrder->id
            ]);

            /**
             * PAYMENT INSERT
             */
            $payment = $data['payment'];

            $this->payment->create([
                'type'               => $payment['type'],
                'notes'              => $payment['notes'],
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

    /**
     * Update ONLY service orders table
     */
    public function update(UpdateServiceOrderRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $data = $request['basic'];

            $serviceOrder = $this->serviceOrder->findOrFail($id);

            $serviceOrder->update([
                'load_id'               => $data['load_id'],
                'trailer_type'          => $data['trailer_type'],
                'inspection_type'       => $data['inspection_type'],
                'dispatch_instructions' => $data['dispatch_instructions'],
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

    /**
     * Delete with "SOFT DELETE" a service and ALL YOUR RELATIONS
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $serviceOrder = $this->serviceOrder->with([
                'vehicles',
                'pickup',
                'delivery',
                'shipper',
                'payment'
            ])->findOrFail($id);

            $serviceOrder->delete();
            $serviceOrder->pickup->delete();
            $serviceOrder->delivery->delete();
            $serviceOrder->shipper->delete();
            $serviceOrder->pickup->contact->delete();
            $serviceOrder->delivery->contact->delete();
            $serviceOrder->shipper->contact->delete();
            $serviceOrder->payment->delete();

            $serviceOrder->vehicles->each(function ($vehicle) {
                $vehicle->delete();
            });

            DB::commit();

            // ADD FLASH MESSAGE
            return redirect()->back();

        } catch(\Exception $exception) {
            DB::rollback();

            // ADD FLASH MESSAGE
            return redirect()->back();
        }
    }

    /**
     * Assign a driver to service order
     */
    public function assign(Request $request, $id)
    {
        Validator::make($request->all(), [
            'driver' => ['required', Rule::exists('users', 'id')]
        ])->validated();

        try {
            $serviceOrder = $this->serviceOrder->findOrFail($id);

            $serviceOrder->update([
                'driver_id' => $this->user->findOrFail($request['driver'])->id,
                'status'    => StatusEnum::ASSIGNED
            ]);

            return redirect()->back();

        } catch(\Exception $exception) {

            return redirect()->back();
        }
    }

    /**
     * Unassign a driver from service order
     */
    public function unassign($id)
    {
        try {
            $serviceOrder = $this->serviceOrder->findOrFail($id);

            $serviceOrder->update([
                'driver_id' => null,
                'status'    => StatusEnum::NEW
            ]);

            return redirect()->back();

        } catch(\Exception $exception) {

            return redirect()->back();
        }
    }
}
