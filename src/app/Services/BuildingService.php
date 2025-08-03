<?php

namespace App\Services;

use App\Models\Building;
use App\Repositories\BuildingRepository;
use App\Repositories\OrganizationRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class BuildingService
{
    public function __construct(
        private readonly OrganizationRepository $organizationRepository,
        private readonly BuildingRepository $buildingRepository
    )
    {
    }

    public function getOrganizations(int $buildingId) : LengthAwarePaginator
    {
        return $this->organizationRepository->byBuilding($buildingId);
    }

    public function getBuildings() : LengthAwarePaginator
    {
        return $this->buildingRepository->getPaginated();
    }

    public function getBuildingDetails(int $buildingId) : Building
    {
        return $this->buildingRepository->findById($buildingId);
    }
}
