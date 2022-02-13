<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noiluutru extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'noiluutrus';
    protected $guarded = [];
    public function diadanh(){
        return $this->hasMany(Diadanh::class);
    }
    
}
