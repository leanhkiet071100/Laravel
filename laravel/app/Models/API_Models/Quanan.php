<?php

namespace App\Models\API_Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id_Quan',
        'Id_Ddanh',
        'Ten_Quan',
        'Hinh_Quan',
        'Diachi_Quan',
        'SDT_Quan',
        'Trangthai'
    ];
    protected $primaryKey = "Id_Quan";
    protected $table = "quanan";
}