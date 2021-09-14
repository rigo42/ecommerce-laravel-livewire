<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:reportes']);
    }

    public function index(){
        return view('admin.report.index');
    }

    public function user(){
        return view('admin.report.user');
    }
}
