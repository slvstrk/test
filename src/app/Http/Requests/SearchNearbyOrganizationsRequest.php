<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchNearbyOrganizationsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'lat' => [
                'required',
                'numeric',
                'between:-90,90',
            ],
            'lon' => [
                'required',
                'numeric',
                'between:-180,180',
            ],
            'radius' => [
                'required',
                'integer',
                'min:1',
                'max:100000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'lat.required' => 'Широта (lat) обязательна.',
            'lat.numeric' => 'Широта должна быть числом.',
            'lat.between' => 'Широта должна быть от -90 до 90 градусов.',

            'lon.required' => 'Долгота (lon) обязательна.',
            'lon.numeric' => 'Долгота должна быть числом.',
            'lon.between' => 'Долгота должна быть от -180 до 180 градусов.',

            'radius.required' => 'Радиус обязателен.',
            'radius.integer' => 'Радиус должен быть целым числом.',
            'radius.min' => 'Радиус должен быть не менее 1.',
            'radius.max' => 'Радиус не должен превышать 100000 (100 км).',
        ];
    }
}
