<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchOrganizationByNameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            's' => [
                'required',
                'string',
                'max:20',
            ],
        ];
    }
}
