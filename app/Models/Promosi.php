<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    use HasFactory;
    protected $table = "promosi";
    public function rumah ()
    {
        return $this->belongsTo(Rumah::class,'rumah_id','id');
    }
}
