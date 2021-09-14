<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:clientes']);
    }

    public function index(){
        return view('admin.client.index');
    }

    public function create(){
        $client = new Client();
        return view('admin.client.create', compact('client'));
    }

    public function show(Client $client){
        return view('admin.client.show', compact('client'));
    }

    public function edit(Client $client){
        return view('admin.client.edit', compact('client'));
    }
}
