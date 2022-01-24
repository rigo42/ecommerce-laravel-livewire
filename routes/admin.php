<?php

use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Blog\BlogTagController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Client\ClientController;
use App\Http\Controllers\Admin\Comment\CommentController;
use App\Http\Controllers\Admin\Gender\GenderController;
use App\Http\Controllers\Admin\Log\LogController;
use App\Http\Controllers\Admin\Product\Color\ProductColorController;
use App\Http\Controllers\Admin\Product\General\ProductController;
use App\Http\Controllers\Admin\Product\Size\ProductSizeController;
use App\Http\Controllers\Admin\Setting\BackupController;
use App\Http\Controllers\Admin\Setting\PermissionController;
use App\Http\Controllers\Admin\Setting\RoleController;
use App\Http\Controllers\Admin\Setting\WelcomeController;
use App\Http\Controllers\Admin\Size\SizeController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'panel'])->group(function () {
        
        //Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        //Setting
        Route::prefix('ajustes')->group(function () {
            //Welcome
            Route::get('/', [WelcomeController::class, 'index'])->name('setting.welcome.index');
            //Permission
            Route::resource('permisos', PermissionController::class)->parameters(['permisos' => 'permission'])->names('setting.permission');
            //Role
            Route::resource('roles', RoleController::class)->parameters(['roles' => 'role'])->names('setting.role');
            //Backup
            Route::resource('copias-de-seguridad', BackupController::class)->parameters(['copia-de-seguridad' => 'backup'])->names('setting.backup');
        });
    
        //log
        Route::get('logs', [LogController::class, 'index'])->name('log.index');
    
        //User
        Route::resource('usuarios', UserController::class)->parameters(['usuarios' => 'user'])->names('user');
        Route::prefix('usuarios/{user}')->group(function () {
            //Password
            Route::get('password', [UserController::class, 'password'])->name('user.password');
            //Permission
            Route::get('permisos', [UserController::class, 'permission'])->name('user.permission');
            //Expense
            Route::get('logs', [UserController::class, 'log'])->name('user.log');
        });

        //Banners
        Route::resource('banners', BannerController::class)->parameters(['banners' => 'banner'])->names('banner');

        //Category
        Route::resource('categorias', CategoryController::class)->parameters(['categorias' => 'category'])->names('category');

        //Brand
        Route::resource('marcas', BrandController::class)->parameters(['marcas' => 'brand'])->names('brand');

        //Size
        Route::resource('medidas', SizeController::class)->parameters(['medidas' => 'size'])->names('size');

        //Size
        Route::resource('generos', GenderController::class)->parameters(['generos' => 'gender'])->names('gender');

        //Product general
        Route::resource('productos', ProductController::class)->parameters(['productos' => 'product'])->names('product.general');

        //Product color
        Route::resource('productos.colores', ProductColorController::class)->parameters(['productos' => 'product', 'colores' => 'color'])->names('product.color');

        //Product color
        Route::resource('productos.medidas', ProductSizeController::class)->parameters(['productos' => 'product', 'medidas' => 'size'])->names('product.size');
        
        //Comments
        Route::resource('commentarios', CommentController::class)->parameters(['comentarios' => 'comment'])->names('comment');

        //Blog
        Route::resource('/blogs', BlogController::class)->parameters(['blogs' => 'blog'])->names('blog');
        
        //Blog categories
        Route::resource('/blog-categorias', BlogCategoryController::class)->parameters(['blog-categorias' => 'category'])->names('blog-category');
       
        //Blog tags
        Route::resource('/blog-etiquetas', BlogTagController::class)->parameters(['blog-etiquetas' => 'tag'])->names('blog-tag');
    
});