<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class HinhDiaDanh extends Model
{
    use HasFactory;
    use softDeletes;
    
    protected $guarded = [];
    protected $table = 'hinhanh_diadanhs';
    public function diadanh()
    {
        return $this->belongsTo('App\Models\Diadanh');
    }
}
