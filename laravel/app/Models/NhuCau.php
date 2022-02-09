<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhuCau extends Model
{
    use HasFactory;
    use SoftDeletes;

       public function diadanh(){
        return $this->hasMany(Diadanh::class);
    }
}
