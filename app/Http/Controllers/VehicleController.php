<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUpdateVehicleRequest;

use App\Models\{
    ServiceOrder,
    Vehicle
};

class VehicleController extends Controller
{
    protected Vehicle $vehicle;
    protected ServiceOrder $serviceOrder;

    function __construct(Vehicle $vehicle, ServiceOrder $serviceOrder){
        $this->vehicle = $vehicle;
        $this->serviceOrder = $serviceOrder;
    }

    /**
     * Create new vehicle for a service order
     */
    public function store(StoreUpdateVehicleRequest $request, $idServiceOrder)
    {
        DB::beginTransaction();

        try {
            $data = $request['vehicle']['new'];

            $serviceOrder = $this->serviceOrder->findOrFail($idServiceOrder);

            $this->vehicle->create([
                'vin'              => $data['vin'],
                'make'             => $data['make'],
                'model'            => $data['model'],
                'year'             => $data['year'],
                'color'            => $data['color'],
                'operable'         => $data['operable'],
                'lot_number'       => $data['lot_number'],
                'buyer_number'     => $data['buyer'],

                'vehicle_type_id'  => $data['type'],
                'service_order_id' => $serviceOrder->id
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

    public function update(StoreUpdateVehicleRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $data = $request['vehicle'][$id];

            $this->vehicle->findOrFail($id)->update([
                'vin'              => $data['vin'],
                'make'             => $data['make'],
                'model'            => $data['model'],
                'year'             => $data['year'],
                'color'            => $data['color'],
                'operable'         => $data['operable'],
                'lot_number'       => $data['lot_number'],
                'buyer_number'     => $data['buyer'],
                'vehicle_type_id'  => $data['type'],
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
     * Force delete vehicle from a service Order
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $vehicle = $this->vehicle->with([
                'serviceOrder.vehicles'
            ])->findOrFail($id);

            if (count($vehicle->serviceOrder->vehicles) <= 1) {
                // FLASH MESSAGE ERROR - MINIMUM 1 VEHICLE
                return redirect()->back();
            }

            $vehicle->forceDelete();

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
