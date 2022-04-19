<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public function klien ()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function rumah ()
    {
        return $this->belongsTo(Rumah::class,'rumah_id','id');
    }
}
