<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityResource;
use App\Http\Resources\OrganizationResource;
use App\Services\ActivityService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivityController extends Controller
{
    public function __construct(
        private readonly ActivityService $activityService
    )
    {
    }

    public function index(): ResourceCollection
    {
        $activities = $this->activityService->getActivities();
        return ActivityResource::collection($activities);
    }

    public function show(int $activityId): JsonResource
    {
        $activity = $this->activityService->getActivityDetails($activityId);
        return ActivityResource::make($activity);
    }

    public function organizations(int $activityId): ResourceCollection
    {
        $organizations = $this->activityService->getOrganizations($activityId);
        return OrganizationResource::collection($organizations);
    }
}
