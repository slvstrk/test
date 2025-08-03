<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Organization extends Model
{
    protected $perPage = 5;

    private const MAX_ACTIVITY_TREE_DEPTH = 3;

    public function building() : BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function activities() : BelongsToMany
    {
        return $this->belongsToMany(Activity::class);
    }

    public function phones() : MorphMany
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    protected function activitiesTree(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->relationLoaded('activities')) {
                    throw new \LogicException('Отношение activities должно быть загружено до использования activitiesTree!');
                }

                $grouped = $this->activities->groupBy('parent_id');

                $buildTree = function ($parentId, $depth = 0) use (&$buildTree, $grouped) {
                    if ($depth >= self::MAX_ACTIVITY_TREE_DEPTH || !isset($grouped[$parentId])) {
                        return [];
                    }

                    return $grouped[$parentId]->map(function ($activity) use ($buildTree, $depth) {
                        $item = $activity->toArray();
                        $children = $buildTree($activity->id, $depth + 1);

                        if (!empty($children)) {
                            $item['children'] = $children;
                        }

                        return $item;
                    })->values()->toArray();
                };

                return $buildTree(null);
            }
        );
    }
}
