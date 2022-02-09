<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monan extends Model
{
    use HasFactory;
    use softDeletes;
    
    public function quanan(){
        return $this->belongsTo('App\Models\Quanan', 'Id_Quanan', 'id');
    }

}