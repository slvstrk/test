<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'inn' => $this->inn,
            'unit' => $this->unit,
            'activities_tree' => ActivityResource::collection($this->activities_tree),
            'building' => BuildingResource::make($this->whenLoaded('building')),
            'phones' => PhoneResource::collection($this->whenLoaded('phones')),
        ];
    }
}
