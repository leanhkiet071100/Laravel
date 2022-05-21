<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



use Illuminate\Database\Eloquent\SoftDeletes;

class Nguoidung extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'nguoidungs';
    Protected $fillable = ['Matkhau', 'Email', 'Hoten_Nguoidung', 'Sodienthoai', 'Phanquyen', 'TrangThaiNguoiDung', 'id'];
    public function diadanh(){
        return $this->belongsToMany(Diadanh::class);
    }

    public function baiviet(){
        return $this->hasMany(BaiViet::class);
    }
}
   