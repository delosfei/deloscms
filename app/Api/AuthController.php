<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Auth;

class AuthController extends Controller
{

    public function login(UserRequest $request)
    {
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
