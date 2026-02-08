<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model {
    public $timestamps = true;

    protected $guarded = [];

    public function posts(): HasMany {
        return $this->hasMany( post::class, 'category_id' );
        // <-- must have return
    }
}
