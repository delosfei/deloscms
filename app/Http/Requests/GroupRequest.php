<?php

namespace App\Http\Requests;

class GroupRequest extends Request
{
    public function rules(): array
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':

                // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => ['required', 'between:3,20'],
                    'site_num' => ['required', 'numeric', 'between:0,50'],
                    'days' => ['required', 'numeric', 'between:3,200'],
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

    public function attributes()
    {
        return [
            'title' => '会员组名称',
            'site_num' => '站点数量',
            'days' => '可用天数',
        ];
    }

    public function messages(): array
    {
        return [
            // Validation messages
        ];
    }
}
