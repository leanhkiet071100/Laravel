<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DiaDanhController;
use App\Http\Controllers\NhuCauController;
use App\Http\Controllers\QuanAnController;
use App\Http\Controllers\NoiluutruController;
use App\Http\Controllers\MonanController;

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

Route::get('/', function () {
    return view('DangNhap.DangNhap');
});

Route::get('/Dashboard', function(){
    return view('Dashboard.Dashboard');
})->name('Dashboard');

Route::prefix('DiaDanh')->group(function(){
    Route::name('DiaDanh.')->group(function(){ 
        Route::get('/', [DiaDanhController::class, 'index'])->name('dsDiaDanh');
        Route::get('/Sua/{id}', [DiaDanhController::class, 'edit'])->name('SuaDiaDanh');
        Route::patch('/Sua/{id}', [DiaDanhController::class, 'update'])->name('SuaDiaDanhpatch');
        Route::get('/ChiTietDiaDanh/{id}', [DiaDanhController::class, 'show'])->name('ChiTietDiaDanh');
        Route::get('/ThemDiaDanh', [DiaDanhController::class, 'create'])->name('ThemDiaDanh');
        Route::post('/ThemDiaDanh', [DiaDanhController::class, 'store'])->name('ThemDiaDanhPost');
        Route::get('/XoaDiaDanh/{id}', [DiaDanhController::class, 'destroy'])->name('XoaDiaDanh');
});
  
});

//Route::resource('DiaDanh',DiaDanhController::class);

Route::prefix('NhuCau')->group(function(){
    Route::name('NhuCau.')->group(function(){ 
        Route::get('/', [NhuCauController::class, 'index'])->name("dsNhuCau");
});
   
});

Route::prefix('QuanAn')->group(function(){
    Route::name('QuanAn.')->group(function(){ 
        Route::get('/', [QuanAnController::class, 'index'])->name("dsQuanAn");
        Route::get('/ThemQuanAn', [QuanAnController::class, 'create'])->name("ThemQuanAn");
        Route::post('/ThemQuanAn', [QuanAnController::class, 'store'])->name("ThemQuanAnPost");
        Route::get('/SuaQuanAn/{id}', [QuanAnController::class, 'edit'])->name("SuaQuanAn");
        Route::patch('/SuaQuanAn/{id}', [QuanAnController::class, 'update'])->name("SuaQuanAnPost");
        Route::get('/XoaQuanAn/{id}', [QuanAnController::class, 'destroy'])->name("XoaQuanAn");
        Route::get('/MonAn', [MonanController::class, 'index'])->name("MonAn");
});
});

    //Route::resource('QuanAn', QuanAnController::class);
 

Route::prefix('NoiLuuTru')->group(function(){
    Route::name('NoiLuuTru.')->group(function(){ 
        Route::get('/',[NoiluutruController::class, 'index'])->name("dsNoiLuuTru");
});
});


Route::prefix('DuyetDiaDanh')->group(function(){
    Route::name('DuyetDiaDanh.')->group(function(){ 
        Route::get('/', function(){
            return view('DuyetDiaDanh.DuyetDiaDanh');
        })->name("dsDuyetDiaDanh");
});
});

Route::prefix('ChiTietDiaDanh')->group(function(){
    Route::name('ChiTietDiaDanh.')->group(function(){ 
        Route::get('/', function(){
            return view('DSNoiLuuTru-MonAn.dsNoiLuuTru');
        })->name("dsNoiLuuTru");
          Route::get('/QuanAn', function(){
            return view('DSNoiLuuTru-MonAn.QuanAnDiaDanh');
        })->name("dsQuanAn");
});
});

