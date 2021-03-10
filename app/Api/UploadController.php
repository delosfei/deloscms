<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use UploadService;

/**
 * 文件上传
 */
class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
//        $this->middleware('module')->except(['local']);
    }

    /**
     * 站点上传
     * @param Request $request
     * @return void
     */
    public function site(Request $request)
    {
        $request->validate(
            [
                'file' => ['required', 'mimes:jpeg,jpg,bmp,png'],
            ]
        );
        $driver = config('site.upload.driver');

        return UploadService::$driver($request->file);
    }

    /**
     * 本地上传/只对后台系统使用
     * @param Request $request
     * @return void
     */
    public function local(Request $request)
    {
        $request->validate(
            [
                'file' => ['required', 'mimes:jpeg,jpg,bmp,png'],
            ]
        );

        return UploadService::local($request->file);
    }

    /**
     * wangEditor编辑器上传
     * @param Request $request
     * @return (int|array)[]
     * @throws BindingResolutionException
     */
    public function wangEditor(Request $request)
    {
        $request->validate(
            [
                'file' => ['required', 'mimes:jpeg,jpg,bmp,png'],
            ]
        );
        $driver = config('site.upload.driver');
        $file = UploadService::$driver($request->file);

        return [
            'errno' => 0,
            'data' => [
                ['url' => $file['path'], 'alt' => $file['name'], 'href' => $file['path']],
            ],
        ];
    }
}
