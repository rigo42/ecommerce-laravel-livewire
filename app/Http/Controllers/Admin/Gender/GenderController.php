<?php

namespace App\Http\Controllers\Admin\Gender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:generos']);
    }

    public function index(){
        return view('admin.gender.index');
    }
}
