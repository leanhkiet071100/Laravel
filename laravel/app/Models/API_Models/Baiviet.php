<?php

namespace App\Models\API_Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baiviet extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id_Baiviet',
        'Noidung',
    ];   
    protected $primaryKey = "Id_Baiviet";
    protected $table = "baiviets";
}