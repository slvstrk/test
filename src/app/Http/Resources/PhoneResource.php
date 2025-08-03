<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $output = [
            'id' => $this['id'],
            'number' => $this['number'],
        ];

        if(isset($this['ext'])) {
            $output['ext'] = $this['ext'];
        }

        return $output;
    }
}
