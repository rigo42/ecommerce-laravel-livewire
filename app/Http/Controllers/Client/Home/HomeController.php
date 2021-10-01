<?php

namespace App\Http\Controllers\Client\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners = Banner::orderBy('id', 'desc')->cursor();
        $categories = Category::inRandomOrder()->take(6)->cursor();
        $features = Product::with(['colors', 'categories'])->where('stock', true)->where('featured', true)->take(8)->cursor();
        $recents = Product::with(['colors', 'categories'])->where('stock', true)->orderBy('id', 'desc')->take(8)->cursor();
        return view('client.home.index', compact('banners', 'categories', 'features', 'recents'));
    }
}
