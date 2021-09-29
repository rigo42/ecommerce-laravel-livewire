<?php

namespace App\Http\Controllers\Admin\Product\Size;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:productos']);
    }

    public function index(Product $product){
        return view('admin.product.size.index', compact('product'));
    }
}
