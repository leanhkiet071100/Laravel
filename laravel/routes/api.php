<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DiadanhController;
use App\Http\Controllers\API\NguoidungController;
use App\Http\Controllers\API\MonanController;
use App\Http\Controllers\API\QuananController;
use App\Http\Controllers\API\NoiluutruController;
use App\Http\Controllers\API\BaivietController;
use App\Http\Controllers\API\AthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('/diadanh',DiadanhController::class);
Route::resource('/nguoidung',NguoidungController::class);
Route::resource('/monan',MonanController::class);
Route::resource('/quanan',QuananController::class);
Route::resource('/khachsan',NoiluutruController::class);
Route::resource('/baiviet',BaivietController::class);

Route::get('/', [DiaDanhController::class, 'index'])->name('dsDiaDanh');

Route::post('/monan/add', [MonanController::class, 'store'])->name('addMonan');

// đăng nhập (login)
Route::post('/login', [AthController::class, 'login'])->name('login');
Route::post('/dangki', [AthController::class, 'dangki'])->name('register');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


