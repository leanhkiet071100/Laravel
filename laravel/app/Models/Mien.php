<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Mien extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'miens';
    public function diadanh(){
        return $this->hasMany(Diadanh::class);
    }

}
