<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AthController extends Controller
{
    public function dangki(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'taikhoan'=>'required|max:255|unique:nguoidungs,taikhoan',
            'matkhau'=>'required',
            'email' => 'required|string|email|max:255|unique:nguoidungs,email',
            'hoten'=>'required|string|max:255',
            'sdt'=>'required|max:255',
          
        ],
            [
            'taikhoan.required'=>'Bạn chưa nhập tài khoản',
            'taikhoan.max'=>'Tài khoản không được vượt quá 255 ký tự',
            'taikhoan.unique'=>'Tài khoản đã tồn tại',
            'matkhau.required'=>'Bạn chưa nhập mật khẩu',
            'email.required'=>'Bạn chưa nhập email',
            'email.string'=>'Email phải là chuỗi ký tự',
            'email.email'=>'Email không đúng định dạng',
            'email.max'=>'Email không được vượt quá 255 ký tự',
            'email.unique'=>'Email đã tồn tại',
            'hoten.required'=>'Bạn chưa nhập họ tên',
            'hoten.string'=>'Họ tên phải là chuỗi ký tự',
            'hoten.max'=>'Họ tên không được vượt quá 255 ký tự',
            'sdt.required'=>'Bạn chưa nhập số điện thoại',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
      

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
        
        return response()->json($response, 200);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'taikhoan'=>'required|max:255',
            'matkhau'=>'required|string',
        ],
        [
            'taikhoan.required'=>'Tài khoản không được để trống',
            'matkhau.required'=>'Mật khẩu không được để trống',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        
        $taikhoan = $request->input('taikhoan');
        $matkhau = md5($request->input('matkhau'));
        $user = User::where('taikhoan', $taikhoan)->where('matkhau', $matkhau)->Where('Phanquyen', 2)->first();
        if($user){
            $token = $user->createToken('KdoubeC_login')->plainTextToken;
            $response = [
                'message' => 'Đăng nhập thành công',
                'data' => $user,
                'token'=>$token
            ];
            return response()->json($response, 200);
        }
        else{
            $response = [
                'message' => 'Tài khoản hoặc mật khẩu không đúng',
            ];
            return response()->json($response, 401);
        }
        
    }

    public function logout()
    {
        // đăng xuất bằng token
         
        //$request->user()->token()->revoke();
        auth()->user()->token()->delete();
        $response = [
            'message' => 'Đăng xuất thành công'
        ];
        return response()->json($response, 200);
    }

    public function user(){
        $response=[
            "user" => auth()->user()
        ];
        return response()->json($response, 200);
    }

    // cập nhật người dùng
         public function update(Request $request)
    {
        $attrs = $request->validate([
            'hoten' => 'required|string',
            'sdt' => 'required|string' ,
            'email' => 'required|string'

        ]);

        auth()->user()->update([
            'Hoten_Nguoidung' => $attrs['hoten'],
            'Sodienthoai' => $attrs['sdt'],
            'Email' => $attrs['email']
    
        ]);

        return response([
            'message' => 'Cập nhật thông tin của bạn thành công.',
            'user' => auth()->user()
        ], 200);
    }

    //cập nhật mật khẩu
    public function changePassword(Request $request)
    {
        $attrs = $request->validate([
            'matkhau' => 'required',
            'matkhaumoi' => 'required|string|different:password',
            'nhaplaimatkhaumoi' => 'required|same:new_password',
            
        ]);
        $user = request()->user();
       $user->update([
            'MatKhau' => md5($attrs['matkhaumoi']),
        ]);
        return response([
            'message' => 'Đổi mật khẩu thành công.',
            'user' => auth()->user()
        ], 200);

    }

}

 

