<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class product extends Pivot
{
    protected $table='products';
}
