<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diadanh extends Model
{
    use HasFactory;
       use SoftDeletes;
   
       
    protected $guarded = [];
   public function nguoidung(){
       return $this->belongsToMany(Nguoidung::class, );
   }
    public function nhucau(){
       return $this->belongsTo(Nguoidung::class, );
   }

   public function quanan(){
       return $this->hasMany(Quanan::class, 'Id_Ddanh', 'id');
   }
}
    