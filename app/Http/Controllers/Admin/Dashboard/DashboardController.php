<?php

namespace App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Service;

class DashboardController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }
}
