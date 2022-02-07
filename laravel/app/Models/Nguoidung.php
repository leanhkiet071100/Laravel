<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model
{
    use HasFactory;
    protected $fillable = [
        'Ten_Ddanh',
        'Ten_Goikhac',
        'Mota',
        'Diachi_Ddanh'
    ];
    protected $primaryKey = "Id_Nguoidung";
}
   