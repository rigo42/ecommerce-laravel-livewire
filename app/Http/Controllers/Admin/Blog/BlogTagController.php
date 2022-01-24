<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
    public function __construct(){
        $this->middleware(['permission:blogs']);
    }

    public function index(){
        return view('admin.blog.tag.index');
    }
}
