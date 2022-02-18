<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



use Illuminate\Database\Eloquent\SoftDeletes;

class Nguoidung extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'nguoidungs';
    Protected $fillable = ['Matkhau'];
    public function diadanh(){
        return $this->belongsToMany(Diadanh::class);
    }
}
   