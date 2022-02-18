<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\models\User;

class DangKiController extends Controller
{
      protected function fixImageNguoiDung(User $user)
        {
            if(Storage::disk('public')->exists($user->HinhAnh)){
                 $user->HinhAnh = Storage::url( $user->HinhAnh);
            }else {
                 $user->HinhAnh = '/img/no_img.png';
            }
        }

    public function showform(){
        return view('AUT.DangKi');
    }

    public function dangki(Request $request){
        $rule = [
            'TaiKhoan' => 'required|unique:nguoidungs,Taikhoan',
            'MatKhau' => 'required|max:20',
            'HoTen' => 'required',
            'email' => 'required|email|unique:nguoidungs,Email',
            'SDT' => 'required|numeric',
            //'Hinh' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',            
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min', // lớn hơn  (không phải độ dài)
            'max' => ':attribute phải nhỏ hơn :max', // nhỏ hơn
            'numeric' => ':attribute phải là số',
            'email' => ':attribute không đúng định dạng',
            'unique' => ':attribute đã tồn tại',
            //'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',
  
        ];
        $attribute = [
            'TaiKhoan' => 'Tài khoản',
            'MatKhau' => 'Mật khẩu',
            'HoTen' => 'Họ tên',
            'email' => 'Email',
            'SDT' => 'Điện thoại',
            'DiaChi' => 'Địa chỉ',
         
        ];
        $request->validate($rule, $message, $attribute);

        //$user = new User();
        // $user->Taikhoan = $request->TaiKhoan;
        // $user->Matkhau = Hash::make($request->MatKhau);
        // $user->Hoten_Nguoidung = $request->HoTen;
        // $user->Email = $request->email;
        // $user->Sodienthoai = $request->SDT;
        // $user->Phanquyen = 1;
        // $user->HinhAnh = '';
        // $user->save();
        // if($request->hasFile('Hinh')){
        //      $use->HinhAnh = $request->file('Hinh')->store('img/nguoidung/'.$use->id,'public');
        //  }
     
    // $use = new User();
    //     $use->fill(
    //         [
    //             'Taikhoan' => $request->TaiKhoan,
    //             'Matkhau' => Hash::make($request->MatKhau),
    //             'Hoten_Nguoidung' => $request->HoTen,
    //             'Email' => $request->email,
    //             'Sodienthoai' => $request->SDT,
    //             'HinhAnh' => null,
    //             'Phanquyen' => 2,
    //             'TrangThaiNguoiDung' =>1
            
    //         ]
    //         );


        $use = User::create([
            'Taikhoan' => $request->TaiKhoan,
            'Matkhau' => md5($request->MatKhau),
            'Hoten_Nguoidung' => $request->HoTen,
            'Email' => $request->email,
            'Sodienthoai' => $request->SDT,
            'HinhAnh' => '',
            'Phanquyen' => 2,
            'TrangThaiNguoiDung' =>1
        ]);

        if($request->hasFile('Hinh')){
            $use->HinhAnh = $request->file('Hinh')->store('img/nguoidung/'.$use->id,'public');
        }
        $use->save();
       
        return  View('AUT.DangNhap')->with('success','Đăng kí thành công');
    }
}
