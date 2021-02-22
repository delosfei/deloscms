<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UserRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    'mobile' => ['required', 'regex:/^\d{11}$/', Rule::exists('users')],
                    'password' => ['required'],
                    'captcha.content' => ['required', 'captcha_api:' . request('captcha.key') . ',default']
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

    public function messages()
    {
        return [
            'mobile.required' => '手机号不能为空',
            'mobile.regex' => '手机号格式错误',
            'mobile.exists' => '手机号不存在',
            'captcha.content.required' => '验证码不能为空',
            'captcha.content.captcha_api' => '验证码输入错误'
        ];
    }
}
