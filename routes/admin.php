<?php

use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Client\ClientController;
use App\Http\Controllers\Admin\Color\ColorController;
use App\Http\Controllers\Admin\Expense\ExpenseController;
use App\Http\Controllers\Admin\Google\GoogleAnalyticsController;
use App\Http\Controllers\Admin\Invoice\InvoiceController;
use App\Http\Controllers\Admin\Log\LogController;
use App\Http\Controllers\Admin\Payment\PaymentController;
use App\Http\Controllers\Admin\Prospect\ProspectController;
use App\Http\Controllers\Admin\Provider\ProviderController;
use App\Http\Controllers\Admin\Quotation\QuotationController;
use App\Http\Controllers\Admin\Report\ReportController;
use App\Http\Controllers\Admin\Service\ProjectController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\ServiceType\ServiceTypeController;
use App\Http\Controllers\Admin\Setting\AccountController;
use App\Http\Controllers\Admin\Setting\BackupController;
use App\Http\Controllers\Admin\Setting\CategoryClientController;
use App\Http\Controllers\Admin\Setting\CategoryExpenseController;
use App\Http\Controllers\Admin\Setting\PaymentTypeController;
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
        Route::resource('colores', ColorController::class)->parameters(['colores' => 'color'])->names('color');
        
        //Client
        Route::resource('clientes', ClientController::class)->parameters(['clientes' => 'client'])->names('client');

    
});