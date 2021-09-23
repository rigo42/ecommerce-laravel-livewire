<?php

namespace App\Http\Controllers\Admin\Product\General;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:productos']);
    }

    public function index(){
        return view('admin.product.general.index');
    }

    public function create(){
        $product = new Product();
        return view('admin.product.general.create', compact('product'));
    }

    public function show(Product $product){
        return view('admin.product.general.show', compact('product'));
    }

    public function edit(Product $product){
        return view('admin.product.general.edit', compact('product'));
    }
}
