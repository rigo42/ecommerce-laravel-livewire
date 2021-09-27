<?php

namespace App\Http\Controllers\Admin\Product\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:productos']);
    }

    public function index(Product $product){
        return view('admin.product.color.index', compact('product'));
    }
}
