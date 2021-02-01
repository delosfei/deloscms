<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'regex:/^\d{11}$/', Rule::exists('users')],
            'password' => ['required'],
            // 'captcha.content' => ['required', 'captcha_api:' . request('captcha.key') . ',default']
        ], [
            'mobile.required' => '手机号不能为空',
            'mobile.regex' => '手机号格式错误',
            'mobile.exists' => '手机号不存在',
            'captcha.content.required' => '验证码不能为空',
            'captcha.content.captcha_api' => '验证码输入错误'
        ]);

        if (Auth::attempt(
            ['mobile' => $request->mobile, 'password' => $request->password],
            (bool)$request->remember
        )) {

            $token = Auth::user()->createToken('token-name');

            return ['message' => '登录成功', 'token' => $token->plainTextToken];
        }
        return response(['message' => '帐号或密码错误'], 405);
    }
}
