<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BuildingResource;
use App\Http\Resources\OrganizationResource;
use App\Services\BuildingService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BuildingController extends Controller
{
    public function __construct(
        private readonly BuildingService $buildingService
    )
    {
    }

    public function organizations(int $buildingId): ResourceCollection
    {
        $organizations = $this->buildingService->getOrganizations($buildingId);
        return OrganizationResource::collection($organizations);
    }

    public function index(): ResourceCollection
    {
        $buildings = $this->buildingService->getBuildings();
        return BuildingResource::collection($buildings);
    }

    public function show(int $buildingId): JsonResource
    {
        $building = $this->buildingService->getBuildingDetails($buildingId);
        return BuildingResource::make($building);
    }
}
