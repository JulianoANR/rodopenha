<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a finance dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data = [];
        return view('pages.finances.dashboard', compact(['data']));
    }

}
