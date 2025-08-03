<?php

namespace App\Repositories;

use App\Models\Building;
use Illuminate\Pagination\LengthAwarePaginator;

class BuildingRepository
{
    private array $defaultRelations = [
        'address'
    ];

    public function findById(int $id) : Building
    {
        return Building::query()
            ->with($this->defaultRelations)
            ->findOrFail($id);
    }

    public function getPaginated() : LengthAwarePaginator
    {
        return Building::query()
            ->with($this->defaultRelations)
            ->paginate();
    }
}
