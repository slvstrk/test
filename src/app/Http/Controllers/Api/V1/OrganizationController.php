<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchNearbyOrganizationsRequest;
use App\Http\Requests\SearchOrganizationByNameRequest;
use App\Http\Resources\OrganizationResource;
use App\Services\OrganizationService;
use App\VO\Coordinates;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrganizationController extends Controller
{
    public function __construct(
        private readonly OrganizationService $organizationService
    )
    {
    }

    public function index(): ResourceCollection
    {
        $organizations = $this->organizationService->getOrganizations();
        return OrganizationResource::collection($organizations);
    }

    public function show(int $id): JsonResource
    {
        $organization = $this->organizationService->findById($id);
        return OrganizationResource::make($organization);
    }

    public function search(SearchOrganizationByNameRequest $request): ResourceCollection
    {
        $term = $request->query('s', '');
        $organizations = $this->organizationService->searchOrganizations($term);
        return OrganizationResource::collection($organizations);
    }

    public function nearby(SearchNearbyOrganizationsRequest $request): ResourceCollection
    {
        $data = $request->validated();

        $coordinates = new Coordinates($data['lat'], $data['lon']);
        $radius = (int) $data['radius'];

        $organizations = $this->organizationService->findByProximity($coordinates, $radius);
        return OrganizationResource::collection($organizations);
    }
}
