<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quanan extends Model
{
    use HasFactory;
    use softDeletes;
    public function monan(){
        return $this->hasMany('App\Models\Monan', 'Id_Quanan', 'Id_Mon');
    }
}