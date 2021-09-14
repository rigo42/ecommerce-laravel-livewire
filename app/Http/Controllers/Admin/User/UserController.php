<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:usuarios'])->only('index', 'create');
        $this->middleware(['user'])->except('index', 'create');
    }

    public function index(){
        return view('admin.user.index');
    }

    public function create(){
        $user = new User();
        return view('admin.user.create', compact('user'));
    }

    public function show(User $user){
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user){
        return view('admin.user.edit', compact('user'));
    }

    public function password(User $user){
        return view('admin.user.password', compact('user'));
    }

    public function permission(User $user){
        return view('admin.user.permission', compact('user'));
    }

    public function prospect(User $user){
        return view('admin.user.prospect', compact('user'));
    }

    public function client(User $user){
        return view('admin.user.client', compact('user'));
    }

    public function payment(User $user){
        return view('admin.user.payment', compact('user'));
    }

    public function expense(User $user){
        return view('admin.user.expense', compact('user'));
    }
    
    public function transfer(User $user){
        return view('admin.user.transfer', compact('user'));
    }

    public function log(User $user){
        return view('admin.user.log', compact('user'));
    }
}
