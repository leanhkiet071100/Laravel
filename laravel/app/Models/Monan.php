<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Id_Mon',
        'Id_Quan',
        'Ten_Mon',
        'Hinh_Mon',
        'Gia_ban',
        'Trangthai'
    ];
    protected $primaryKey = "Id_Mon";
    protected $table = "monan";

}