<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'parent_id');
    }

    public function parentRecursive(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id')
            ->select('id', 'parent_id', 'name')
            ->with('parentRecursive');
    }
}
