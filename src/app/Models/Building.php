<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Building extends Model
{
    protected $perPage = 5;

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

}
