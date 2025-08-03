<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'country' => $this->country,
            'city' => $this->city,
            'house' => $this->house,
            'lat' => (float)$this->lat,
            'lon' => (float)$this->lon,
        ];
    }
}
