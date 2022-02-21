<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhBaiViet extends Model
{
    use HasFactory;
      use SoftDeletes;

    protected $fillable = [
        'id',
        'Id_Baiviet',
        'Hinh_Bv',]
    ;
    protected $primaryKey = "id";

    public function baiviet()
    {
        return $this->belongsTo('App\Models\BaiViet', 'Id_Baiviet', 'Id_Baiviet');
    }
}
