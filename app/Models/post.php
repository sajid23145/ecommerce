<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\User;

class post extends Model {
    public $timestamps = true;

    protected $guarded = [];

    public function user(): BelongsTo {
        return $this->belongsTo( User::class, );
    }

    public function category(): BelongsTo {
        return $this->belongsTo( Category::class );
    }
}
