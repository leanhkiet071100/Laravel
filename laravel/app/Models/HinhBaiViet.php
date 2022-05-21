<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HinhBaiViet extends Model
{
    use HasFactory;
      use SoftDeletes;

    protected $fillable = [
        'id',
        'Id_Baiviet',
        
        ]
    ;
    protected $primaryKey = "id";
    protected $table = "hinhanh_baiviets";
    

    public function baiviet()
    {
        return $this->belongsTo('App\Models\BaiViet', 'Id_Baiviet', 'Id_Baiviet');
    }
}
