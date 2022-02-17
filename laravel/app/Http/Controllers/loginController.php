<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
Use Illuminate\Support\Facades\Auth;
class loginController extends Controller
{
    public function showform(){
        return view('AUT.DangNhap');
    }

    public function dangnhap(LoginRequest $request)
    {

        // phương thức đăng nhập
        if(Auth::attempt(['TaiKhoan' => $request->TaiKhoan, 'MatKhau' => $request->MatKhau])){
            //$request->session()->put('TaiKhoan', $request->TaiKhoan);
            $request->session()->regenerate(); // lưu session
            return redirect()->route('Dashboard'); // trả về route dashboard
        }
        
        return  back()->withError([
            'error' => 'Tài khoản hoặc mật khẩu không đúng'
        ]);
    }
}
