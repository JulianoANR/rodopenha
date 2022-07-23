<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display all trucks
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.vehicles.create');
    }

    /**
     * Show the form for creating a new truck.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.vehicles.create');
    }

    /**
     * Store a new truck storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }
}
