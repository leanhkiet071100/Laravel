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
use App\Http\Controllers\API\MienController;
use App\Http\Controllers\API\NhuCauController;

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
Route::apiresource('/diadanh',DiadanhController::class);
Route::apiresource('/nguoidung',NguoidungController::class);
Route::apiresource('/monan',MonanController::class);
Route::apiresource('/quanan',QuananController::class);
Route::apiresource('/khachsan',NoiluutruController::class);
Route::apiresource('/baiviet',BaivietController::class);
Route::apiresource('/mien',MienController::class);
Route::apiresource('/nhucau',NhuCauController::class);




Route::get('/', [DiaDanhController::class, 'index'])->name('dsDiaDanh');

Route::post('/monan/add', [MonanController::class, 'store'])->name('addMonan');



// đăng nhập (login)
Route::post('/login', [AthController::class, 'login'])->name('login');
Route::post('/dangki', [AthController::class, 'dangki'])->name('register');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
     
 
});




Route::group(['middleware' => ['auth:sanctum']], function() {
    //người dung
    Route::post('/logout', [AthController::class, 'logout'])->name('logout');
    Route::get('/nguoidung', [AthController::class, 'user']);
    Route::post('/changPassword', [AthController::class, 'changePassword']);
    Route::put('/nguoidung', [AthController::class, 'suathongtin']);
    Route::get('/getdetailuser', [AthController::class, 'getDetailUser']);
    //bài viết
    Route::post('/thembaiviet', [BaivietController::class, 'store']);
    Route::get('/loadbaivietnguoidung', [BaivietController::class, 'loadbaivietnguoidung']);

});



