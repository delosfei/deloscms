<?php

namespace App\Http\Requests;

class SystemConfigRequest extends Request
{
    public function rules(): array
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    // CREATE ROLES
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
        return [
            // 'domain' => '站点域名'
        ];
    }

    public function messages(): array
    {
        return [
            // Validation messages
        ];
    }
}
