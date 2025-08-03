<?php

namespace App\Services;

use App\Models\Activity;
use App\Repositories\ActivityRepository;
use App\Repositories\OrganizationRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ActivityService
{
    public function __construct(
        private readonly OrganizationRepository $organizationRepository,
        private readonly ActivityRepository $activityRepository
    )
    {
    }

    public function getActivities(): Collection
    {
        return $this->activityRepository->getAll();
    }

    public function getActivityDetails(int $activityId): Activity
    {
        return $this->activityRepository->findById($activityId);
    }

    public function getOrganizations(int $activityId): LengthAwarePaginator
    {
        return $this->organizationRepository->byActivity($activityId);
    }
}
