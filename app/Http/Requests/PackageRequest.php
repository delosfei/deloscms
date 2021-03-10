<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class PackageRequest extends Request
{
    public function rules(): array
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
            {
                return [
                    'title' => ['required', 'between:3,50', Rule::unique('packages')],
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => ['required', 'between:3,50', Rule::unique('packages')->ignore(request('package'))],
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }

    public function attributes(): array
    {
        return ['title' => '套餐名称'];
    }

    public function messages(): array
    {
        return [
            // Validation messages
        ];
    }
}
