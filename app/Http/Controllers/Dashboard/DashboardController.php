<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.dashboard.dashboard');
    }
}