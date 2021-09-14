<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:ajustes']);
    }

    public function index(){
        return view('admin.setting.account.index');
    }
}
