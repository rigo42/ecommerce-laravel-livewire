<?php

namespace App\Http\Controllers\Client\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        return view('client.product.index');
    }

    public function quickView(Product $product){
        return view('client.product.partials._quick-view', compact('product'));
    }
}
