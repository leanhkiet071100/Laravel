<?php

namespace App\Models\API_Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diadanh extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id_Ddanh',
        'Ten_Ddanh',
    ];   
    protected $primaryKey = "Id_Ddanh";
    protected $table = "diadanhs";
}
    