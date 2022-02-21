<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
Use App\models\User;


class loginController extends Controller
{
     protected function fixImageNguoiDung(User $user)
        {
            if(Storage::disk('public')->exists($user->HinhAnh)){
                 $user->HinhAnh = Storage::url($user->HinhAnh);
            }else {
                 $user->HinhAnh = '/img/no_img.png';
            }
        }

    public function showform(){


        return view('AUT.DangNhap');
    }

    public function dangnhap(LoginRequest $request)
    {
        // phương thức đăng nhập
        $credentials = $request->only('TaiKhoan', 'MatKhau');
  
        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('trangchu');
        // }

        //hash mat khau
        //$credentials['MatKhau'] = Hash::make($credentials['MatKhau']);
        
        //kiem tra dang nhap
        $MK = md5($credentials['MatKhau']);
       
        $nguoidungs =  User::where('Taikhoan',$request->TaiKhoan)->where('Matkhau',$MK)->first();
  
        if($nguoidungs != null)
        {
         $this->fixImageNguoiDung($nguoidungs);
    
            $request->session()->regenerate();
            Auth::login($nguoidungs);
            return redirect()->route('TrangChu');
        }

        else{
             return  back()->withErrors([
            'error' => 'Tài khoản hoặc mật khẩu không đúng'
            ]);
        }
    }

    public function dangxuat(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('dangnhap');
    }
}
