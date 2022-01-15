<?php

use Illuminate\Support\Facades\Route;

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
        Route::get('/', function(){
        return view('DiaDanh.dsDiaDanh');
    })->name('dsDiaDanh');
    Route::get('/Sua', function(){
        return view('DiaDanh.SuaDiaDanh');
    })->name('SuaDiaDanh');
    Route::get('/ChiTiet.html', function(){
        return view('DiaDanh.ChiTietDiaDanh');
    })->name('ChiTietDiaDanh');
    Route::get('/ThemDiaDanh', function(){
        return view('DiaDanh.ThemDiaDanh');
    })->name('ThemDiaDanh');
});
  
});

Route::prefix('NhuCau')->group(function(){
    Route::name('NhuCau.')->group(function(){ 
        Route::get('/', function(){
            return view('NhuCau.NhuCau');
        })->name("dsNhuCau");
});
   
});

Route::prefix('QuanAn')->group(function(){
    Route::name('QuanAn.')->group(function(){ 
        Route::get('/', function(){
            return view('QuanAn.QuanAn');
        })->name("dsQuanAn");
        Route::get('/ThemQuanAn', function(){
            return view('QuanAn.ThemQuanAn');
        })->name("ThemQuanAn");
        Route::get('/SuaQuanAn', function(){
            return view('QuanAn.SuaQuanAn');
        })->name("SuaQuanAn");
        Route::get('/MonAn', function(){
            return view('QuanAn.MonAn');
        })->name("MonAn");
});
});

Route::prefix('NoiLuuTru')->group(function(){
    Route::name('NoiLuuTru.')->group(function(){ 
        Route::get('/', function(){
            return view('NoiLuuTru.NoiLuuTru');
        })->name("dsNoiLuuTru");
});
});


Route::prefix('DuyetDiaDanh')->group(function(){
    Route::name('DuyetDiaDanh.')->group(function(){ 
        Route::get('/', function(){
            return view('DuyetDiaDanh.DuyetDiaDanh');
        })->name("dsDuyetDiadanh");
});
});