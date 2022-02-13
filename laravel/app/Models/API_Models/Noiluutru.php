<?php

namespace App\Models\API_Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noiluutru extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id_Noiluutru',
        'Ten_Noiluutru',
    ];   
    protected $primaryKey = "Id_Noiluutru";
    protected $table = "noiluutru";
}