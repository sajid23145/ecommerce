<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table='orders';
    protected $guarded=[];

    public function product(){
        return $this->belongsTo(product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
