<?php

namespace App\Repositories;

use App\Models\Activity;
use Illuminate\Support\Collection;

class ActivityRepository
{
    public function findById(int $id): Activity
    {
        return Activity::query()
            ->findOrFail($id);
    }

    public function getAll(): Collection
    {
        return Activity::query()
            ->get();
    }
}
