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
        $credentials = $request->only('TaiKhoan', 'MatKhau');
  
        if (Auth::attempt($credentials)) {
            return redirect()->route('trangchu');
        }
  
        // if(Auth::attempt(['TaiKhoan' => $request->TaiKhoan, 'Matkhau' => $request->MatKhau])){
        //     $request->session()->put('TaiKhoan', $request->TaiKhoan);
        //     $request->session()->regenerate(); // lưu session
        //     return redirect()->intended('Dashboard' ); // trả về route dashboard

        //     return  View('TrangChu');
        // }
        
        return  back()->withErrors([
            'error' => 'Tài khoản hoặc mật khẩu không đúng'
        ]); 
    }
}
