<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemConfig;

/**
 * 系统配置
 * @package App\Api
 */
class SystemConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * 获取配置项
     *
     * @param SystemConfig $config
     * @return void
     */
    public function show(SystemConfig $config)
    {
        return $config['config'];
    }

    /**
     * 保存配置项
     *
     * @param Request $request
     * @return array|void
     */
    public function store(Request $request)
    {
        SystemConfig::updateOrcreate(
            ['id' => 1],
            [
                'config' => $request->input(),
            ]
        );

        return $this->message('系统配置修改成功');
    }
}
