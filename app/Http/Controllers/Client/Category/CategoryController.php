<?php

namespace App\Http\Controllers\Client\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::with('products')->inRandomOrder()->cursor();
        return view('client.category.index', compact('categories'));
    }
}
