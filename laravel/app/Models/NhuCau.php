<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhuCau extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'nhucaus';	
    protected $fillable = ['Tennhucau','TrangThaiNhuCau'];
       public function diadanh(){
        return $this->hasMany(Diadanh::class);
    }

}
