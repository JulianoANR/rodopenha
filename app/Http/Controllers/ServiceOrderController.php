<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceOrderRequest;
use App\Http\Requests\UpdateServiceOrderRequest;

use App\Models\{
    ServiceOrder,
    Vehicle,
    Contact,
    Pickup,
    Delivery,
    Shipper
};

class ServiceOrderController extends Controller
{
    protected $serviceOrder;

    function __construct(ServiceOrder $serviceOrder) {
        $this->serviceOrder = $serviceOrder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = ServiceOrder::all();
        $orders = [];
        return view('pages.serviceOrders.index', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('pages.serviceOrders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceOrderRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceOrder  $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceOrder $serviceOrder)
    {
        return view('pages.serviceOrders.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceOrder  $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceOrder $serviceOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceOrderRequest  $request
     * @param  \App\Models\ServiceOrder  $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceOrderRequest $request, ServiceOrder $serviceOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceOrder  $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceOrder $serviceOrder)
    {
        //
    }
}
