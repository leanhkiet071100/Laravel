<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monan extends Model
{
    use HasFactory;
    use softDeletes;
    
    protected $table = 'monans';
    protected $fillable = ['Ten_Mon', 'Gia_Mon', 'Id_Quan', 'Hinh_Mon'];
    public function quanan(){
        return $this->belongsTo(Quanan::class);
    }

}