<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\Adminrolemiddler;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermisstionController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SettingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin')->group(function (){
    Route::get('/', [AdminController::class, 'login'])->name('login');
    Route::post('/',[AdminController::class, 'postlogin'])->name('post_login');
    Route::post('/logout',[AdminController::class, 'postlogout'])->name('postlogout');
});


Route::get('/home', function () {
    return view('admin/home');
});

Route::prefix('categories')->group(function (){
    Route::get('/index', [CategoryController::class, 'index'])
        ->name('category_index')
//        ->middleware('admin_role:category_list');
        ->middleware( 'can:category-list');

    Route::get('/create', [CategoryController::class, 'create'])->name('category_create')
        ->middleware( 'can:category-add');
//        ->middleware( 'admin_role:category_add');

    Route::post('/store', [CategoryController::class, 'store'])->name('category_store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category_edit')
        ->middleware( 'can:category-edit');
//        ->middleware( 'admin_role:category_edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category_update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category_delete')
        ->middleware( 'can:category-delete');
//        ->middleware( 'admin_role:category_delete');




});

Route::prefix('user')->group(function (){
    Route::get('/index', [UserController::class, 'index'])->name('user_index')
//        ->middleware('admin_role:user_list');
        ->middleware('can:user-list');
    Route::get('/create', [UserController::class, 'create'])->name('user_create')
//        ->middleware('admin_role:user_add');
        ->middleware('can:user-add');
    Route::post('/store', [UserController::class, 'store'])->name('user_store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user_edit');
//        ->middleware('admin_role:user_edit');
//        ->middleware('can:user_edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('user_update');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user_delete')
//        ->middleware('admin_role:user_delete');
        ->middleware('can:user-delete');





});

Route::prefix('slider')->group(function (){
    Route::get('/index', [SliderController::class, 'index'])->name('slider_index')
//        ->middleware('admin_role:user_list');
        ->middleware('can:slider-list');
    Route::get('/create', [SliderController::class, 'create'])->name('slider_create')
//        ->middleware('admin_role:user_add');
        ->middleware('can:slider-add');
    Route::post('/store', [SliderController::class, 'store'])->name('slider_store');
    Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider_edit')
//        ->middleware('admin_role:user_edit');
        ->middleware('can:user-edit');
    Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider_update');
    Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider_delete')
//        ->middleware('admin_role:user_delete');
        ->middleware('can:slider-delete');





});

Route::prefix('role')->group(function (){
    Route::get('/index', [RoleController::class, 'index'])
        ->name('role_index')
        ->middleware('can:role-list');
//        ->middleware('admin_role:role_list');


    Route::get('/create', [RoleController::class, 'create'])
        ->name('role_create')
//        ->middleware('admin_role:role_list');
        ->middleware('can:role-add');
    Route::post('/store', [RoleController::class, 'store'])->name('role_store');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])
        ->name('role_edit')
        ->middleware('can:role-edit');
//        ->middleware('admin_role:role_list');

    Route::post('/update/{id}', [RoleController::class, 'update'])
        ->name('role_update');
    Route::get('/delete/{id}', [RoleController::class, 'delete'])
        ->name('role_delete')
//        ->middleware('admin_role:role_list');
        ->middleware('can:role-delete');





});

Route::prefix('permisstion')
//    ->middleware('admin_role:role_add')
    ->middleware('can:role-list')
    ->group(function (){
    Route::get('/create', [PermisstionController::class, 'create'])->name('create_permisstion');
    Route::post('/store', [PermisstionController::class, 'store'])->name('store_permisstion');






});

Route::prefix('/product')->group(function (){
    Route::get('/index', [ProductController::class,'index'])
        ->name('product_index')
        ->middleware( 'can:product-list');

    Route::get('/create', [ProductController::class,'create'])
        ->name('product_create')
        ->middleware( 'can:product-add');

    Route::post('/store', [ProductController::class,'store'])
        ->name('product_store');

    Route::get('/edit/{id}', [ProductController::class,'edit'])
        ->name('product_edit')
        ->middleware( 'can:product-edit');

    Route::post('/update/{id}', [ProductController::class,'update'])
        ->name('product_update');

    Route::get('/delete/{id}', [ProductController::class,'delete'])
        ->name('product_delete')
        ->middleware( 'can:product-delete');

});

Route::prefix('/Menu')->group(function (){
    Route::get('/index', [MenuController::class,'index'])
        ->name('menu_index')
        ->middleware( 'can:menu-list');

    Route::get('/create', [MenuController::class,'create'])
        ->name('menu_create')
        ->middleware( 'can:menu-add');

    Route::post('/store', [MenuController::class,'store'])
        ->name('menu_store');

    Route::get('/edit/{id}', [MenuController::class,'edit'])
        ->name('menu_edit')
        ->middleware( 'can:menu-edit');

    Route::post('/update/{id}', [MenuController::class,'update'])
        ->name('menu_update');

    Route::get('/delete/{id}', [MenuController::class,'delete'])
        ->name('menu_delete')
        ->middleware( 'can:menu-delete');

});

Route::prefix('/setting')->group(function (){
    Route::get('/index', [SettingController::class,'index'])
        ->name('setting_index')
        ->middleware( 'can:setting-list');

    Route::get('/create', [SettingController::class,'create'])
         ->name('setting_create')
        ->middleware( 'can:setting-add');

    Route::post('/store', [SettingController::class,'store'])
         ->name('setting_store');
    Route::get('/edit/{id}', [SettingController::class,'edit'])
        ->name('setting_edit')
        ->middleware( 'can:setting-edit');

    Route::post('/update/{id}', [SettingController::class,'update'])
        ->name('setting_update');

    Route::get('/delete/{id}', [SettingController::class,'delete'])
        ->name('setting_delete')
        ->middleware( 'can:setting-delete');

});
