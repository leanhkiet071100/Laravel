<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Quanan extends Model
{
    use HasFactory;
    use softDeletes;

    protected $guarded = [];
    public function monan(){
        return $this->hasMany('App\Models\Monan', 'Id_Quanan', 'Id_Mon');
    }

    public function diadanh(){
        return $this->belongsTo('App\Models\Diadanh', 'Id_Ddanh', 'Id_Quan');
    }
}