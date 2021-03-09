<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class SiteRequest extends Request
{
    public function rules(): array
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
            {
                return [
                    'title' => ['required', 'min:3', 'max:30', Rule::unique('sites')->ignore(request()->site)],
                    'domain' => ['required', 'url', Rule::unique('sites')->ignore(request()->site)],
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    // UPDATE ROLES
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
        return ['domain' => '站点域名'];
    }

    public function messages(): array
    {
        return [
            // Validation messages
        ];
    }
}
