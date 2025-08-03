<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $output = [
            'id' => $this->resource['id'],
            'name' => $this->resource['name'],
        ];

        if(isset($this->resource['parent_id'])) {
            $output['parent_id'] = $this->resource['parent_id'];
        }

        if (!empty($this->resource['children']) && is_iterable($this->resource['children'])) {
            $output['children'] = static::collection($this->resource['children']);
        }

        return $output;
    }
}
