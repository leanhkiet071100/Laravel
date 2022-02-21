<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\models\User;


class AthController extends Controller
{
    public function dangki(Request $request)
    {
        $data = $request->validate([
            'taikhoan'=>'required|max:255|unique:nguoidungs,taikhoan',
            'matkhau'=>'required|string',
            'email' => 'required|string|email|max:255|unique:nguoidungs,email',
            'hoten'=>'required|string|max:255',
            'sdt'=>'required|max:255',
        ]);

        $input['Taikhoan'] = $request->input('taikhoan');
        $input['Matkhau'] = md5($request->input('matkhau'));
        $input['Email'] = $request->input('email');
        $input['Hoten_Nguoidung'] = $request->input('hoten');
        $input['Sodienthoai'] = $request->input('sdt');
        $input['Phanquyen'] = 2;
        $input['TrangThaiNguoiDung'] = 1;

        $user = User::create($input);
        $response = [
            'message' => 'Đăng ký thành công',
            'data' => $user
        ];
        
        return response()->json($response, 201);

    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'taikhoan'=>'required|max:255',
            'matkhau'=>'required|string',
        ]);

        $MK = md5($data['matkhau']);
        
        $user = User::where('Taikhoan',$data['taikhoan'])->where('Matkhau',$MK)->first();

        if($user != null)
        {
           $token = $user->createToken('KdoubleC_Login')->plainTextToken;
              $response = [
                'message' => 'Đăng nhập thành công',
                'data' => $user,
                'token' => $token
              ];
            return response()->json($response, 200);

        }
        else{
            return  respose([
                'message' => 'Tài khoản hoặc mật khẩu không đúng', 401
            ]);
        }
        
    }
}
