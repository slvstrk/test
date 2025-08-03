<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuildingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'square' => $this->square,
            'address' => AddressResource::make($this->whenLoaded('address')),
        ];
    }
}
