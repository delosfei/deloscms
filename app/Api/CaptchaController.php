<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Mews\Captcha\Facades\Captcha;


/**
 * 验证码
 * @package App\Api
 */
class CaptchaController extends Controller
{
    public function create()
    {
        return Captcha::create('default', true);
    }
}
