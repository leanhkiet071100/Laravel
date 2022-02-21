<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaiViet extends Model
{
 
    use HasFactory;
   use SoftDeletes;
 
    protected $fillable = [
        'Id_Baiviet',
        'Noidung',
    ];   
    protected $primaryKey = "Id_Baiviet";
    protected $table = "baiviets";


    public function hinhanh_baiviet()
    {
        return $this->hasMany('App\Models\HinhAnhBaiViet', 'Id_Baiviet', 'Id_Baiviet');
    }
}
