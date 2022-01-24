<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware(['permission:blogs']);
    }

    public function index(){
        return view('admin.blog.blog.index');
    }

    public function create(){
        return view('admin.blog.blog.create');
    }

    public function edit(Blog $blog){
        return view('admin.blog.blog.edit', compact('blog'));
    }

    public function show(Blog $blog){
        return view('admin.blog.blog.show', compact('blog'));
    }
}
