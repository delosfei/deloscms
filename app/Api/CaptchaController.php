<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;


/**
 * 验证码
 * @package App\Api
 */
class CaptchaController extends Controller
{
    public function create()
    {
        return \Captcha::create('default', true);
    }
}
