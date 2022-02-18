<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DiaDanhController;
use App\Http\Controllers\NhuCauController;
use App\Http\Controllers\QuanAnController;
use App\Http\Controllers\NoiluutruController;
use App\Http\Controllers\MonanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TrangChuController;
use App\Http\Controllers\DangKiController;

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
    Route::get('/',[loginController::class, 'showform'])->name('formdangnhap');
    Route::get('/dangnhap', [loginController:: class,'dangnhap'])->name('dangnhap');
    Route::get('/dangxuat', [loginController:: class,'dangxuat'])->name('dangxuat');
    Route::get('/dangki', [DangKiController::class, 'showform'])->name('dangki');
    Route::post('/dangki', [DangKiController::class, 'dangki'])->name('dangki');

    //middleware

    Route::middleware('auth')->group(function(){
    Route::prefix('Admin')->group(function(){
        Route::get('/', [TrangChuController::class, 'index'])->name('TrangChu');
        Route::prefix('DiaDanh')->group(function(){
            Route::name('DiaDanh.')->group(function(){ 
                Route::get('/', [DiaDanhController::class, 'index'])->name('dsDiaDanh');
                Route::get('/Sua/{id}', [DiaDanhController::class, 'edit'])->name('SuaDiaDanh');
                Route::patch('/Sua/{id}', [DiaDanhController::class, 'update'])->name('SuaDiaDanhpatch');
                Route::get('/ChiTietDiaDanh/{id}', [DiaDanhController::class, 'show'])->name('ChiTietDiaDanh');
                Route::get('/ThemDiaDanh', [DiaDanhController::class, 'create'])->name('ThemDiaDanh');
                Route::post('/ThemDiaDanh', [DiaDanhController::class, 'store'])->name('ThemDiaDanhPost');
                Route::get('/XoaDiaDanh/{id}', [DiaDanhController::class, 'destroy'])->name('XoaDiaDanh');

                route::post('/TimkiemDiaDanh', [DiaDanhController::class, 'search'])->name('TimkiemDiaDanh');
                //load danh sách xoá mềm

                route::get('/DanhSachXoaDiaDanh', [DiaDanhController::class, 'dsXoa'])->name('DanhSachXoaDiaDanh');
                route::get('/{tendiadanh}.html', [DiaDanhController::class, 'chitiet'])->name('ChiTietDiaDanhDaXoa');
                route::get('/KhoiPhucDiaDanh/{id}', [DiaDanhController::class, 'khoiphuc'])->name('KhoiPhucDiaDanh');

                // quán ăn đỊa danh
                route::get('/QuanAn/{id}', [DiaDanhController::class, 'quanan'])->name('QuanAnDiaDanh');
                route::get('/TimQuanAn/{id}', [DiaDanhController::class, 'timquanan'])->name('TimQuanAnDiaDanh');

                // nhu cầu đỊa danh
                route::get('/NoiLuuTru/{id}', [DiaDanhController::class, 'noiluutru'])->name('NoiLuuTruDiaDanh');
                route::get('/TimNoiLuuTru/{id}', [DiaDanhController::class, 'timnoiluutru'])->name('TimNoiLuuTru');
        });
        
        });

        //Route::resource('DiaDanh',DiaDanhController::class);

        Route::prefix('NhuCau')->group(function(){
            Route::name('NhuCau.')->group(function(){ 
                Route::get('/', [NhuCauController::class, 'index'])->name("dsNhuCau");
                Route::get('/ThemNhuCau', [NhuCauController::class, 'create'])->name("ThemNhuCau");
                Route::post('/ThemNhuCau', [NhuCauController::class, 'store'])->name("ThemNhuCauPost");
                Route::get('/SuaNhuCau/{id}', [NhuCauController::class, 'index'])->name("SuaNhuCau");
                Route::patch('/SuaNhuCau/{id}', [NhuCauController::class, 'update'])->name("SuaNhuCauPatch");
                Route::get('/XoaNhuCau/{id}', [NhuCauController::class, 'destroy'])->name("XoaNhuCau");
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
                Route::get('/TimQuanAn', [QuanAnController::class, 'search'])->name("TimQuanAn");
        
        });
        });

        Route::get('/{id}/MonAn', [MonanController::class, 'index'])->name("MonAn");
                Route::post('/{id}/MonAn', [MonanController::class, 'store'])->name("MonAnPost");
                Route::get('/{id}/XoaMonAn/{idmon}', [MonanController::class, 'destroy'])->name("XoaMonAn");
                Route::get('/{id}/SuaMonAn/{idmon}', [MonanController::class, 'edit'])->name("SuaMonAn");
                Route::patch('/{id}/SuaMonAn/{idmon}', [MonanController::class, 'update'])->name("SuaMonAnPatch");
        

        

        //Route::resource('QuanAn', QuanAnController::class);
    

    Route::prefix('NoiLuuTru')->group(function(){
        Route::name('NoiLuuTru.')->group(function(){ 
            Route::get('/',[NoiluutruController::class, 'index'])->name("dsNoiLuuTru");
            Route::get('/ThemNoiLuuTru', [NoiluutruController::class, 'create'])->name("ThemNoiLuuTru");
            Route::post('/ThemNoiLuuTru', [NoiluutruController::class, 'store'])->name("ThemNoiLuuTruPost");
            Route::get('/SuaNoiLuuTru/{id}', [NoiluutruController::class, 'index'])->name("SuaNoiLuuTru");
            Route::patch('/SuaNoiLuuTru/{id}', [NoiluutruController::class, 'update'])->name("SuaNoiLuuTruPatch");
            Route::get('/XoaNoiLuuTru/{id}', [NoiluutruController::class, 'destroy'])->name("XoaNoiLuuTru");
            Route::get('/TimNoiLuuTru', [NoiluutruController::class, 'search'])->name("TimNoiLuuTru");
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
    });


    });//middlware

