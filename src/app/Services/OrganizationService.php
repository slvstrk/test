<?php

namespace App\Services;

use App\Models\Organization;
use App\Repositories\OrganizationRepository;
use App\VO\Coordinates;
use Illuminate\Pagination\LengthAwarePaginator;

class OrganizationService
{
    public function __construct(
        private readonly OrganizationRepository $organizationRepository
    )
    {
    }

    public function findById(int $id) : Organization
    {
        return $this->organizationRepository->findById($id);
    }

    public function getOrganizations() : LengthAwarePaginator
    {
        return $this->organizationRepository->getPaginated();
    }

    public function searchOrganizations(string $term) : LengthAwarePaginator
    {
        return $this->organizationRepository->searchByName($term);
    }

    public function findByProximity(Coordinates $coordinates, int $radius) : LengthAwarePaginator
    {
        return $this->organizationRepository->searchByLatLonRadius($coordinates->lat, $coordinates->lon, $radius);
    }
}
