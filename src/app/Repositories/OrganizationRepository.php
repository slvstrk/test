<?php

namespace App\Repositories;

use App\Models\Organization;
use Illuminate\Pagination\LengthAwarePaginator;

class OrganizationRepository
{
    private array $defaultRelations = [
        'activities',
    ];
    private array $extRelations = [
        'activities',
        'phones',
        'building.address'
    ];

    public function findById(int $id) : Organization
    {
        return Organization::query()
            ->with($this->extRelations)
            ->findOrFail($id);
    }

    public function getPaginated() : LengthAwarePaginator
    {
        return Organization::query()
            ->with($this->defaultRelations)
            ->paginate();
    }

    public function byActivity(int $activityId) : LengthAwarePaginator
    {
        return Organization::query()
            ->whereHas('activities', function ($query) use ($activityId) {
                $query->where('id', $activityId);
            })
            ->with($this->defaultRelations)
            ->paginate();
    }

    public function byBuilding(int $buildingId) : LengthAwarePaginator
    {
        return Organization::query()
            ->where('building_id', $buildingId)
            ->with($this->defaultRelations)
            ->paginate();
    }

    public function searchByName(string $term) : LengthAwarePaginator
    {
        return Organization::query()
            ->where('name', 'like', '%'.$term.'%')
            ->with($this->defaultRelations)
            ->paginate();
    }

    public function searchByLatLonRadius(float $lat, float $lon, int $radius) : LengthAwarePaginator
    {
        return Organization::whereHas('building', function ($query) use ($lat, $lon, $radius) {
                $query->whereHas('address', function ($query) use ($lat, $lon, $radius) {
                    $query->whereRaw("(
                        6371 * acos(
                            cos(radians(?)) *
                            cos(radians(lat)) *
                            cos(radians(lon) - radians(?)) +
                            sin(radians(?)) *
                            sin(radians(lat))
                        )
                    ) <= ?", [$lat, $lon, $lat, $radius]);
                });
            })
            ->with($this->extRelations)
            ->paginate();
    }
}
