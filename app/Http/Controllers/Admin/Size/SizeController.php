<?php

namespace App\Http\Controllers\Admin\Size;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:marcas']);
    }

    public function index(){
        return view('admin.size.index');
    }
}
