<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleResource;
use App\Models\Module;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use ModuleService;
use App\Models\Site;
use Illuminate\Database\Eloquent\Collection;
use Auth;

/**
 * 模块控制器
 * @package App\Api
 */
class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->authorizeResource(Module::class, 'module');
    }

    /**
     * 获取当前用户可使用的模块
     * @return void
     */
    public function user()
    {
        $modules = ModuleService::userModules(Auth::user());

        return ModuleResource::collection($modules);
    }

    /**
     * 获取站点模块
     * @param Site $site
     * @return void
     */
    public function site(Site $site)
    {
        return ModuleService::getSiteModules($site);
    }

    /**
     * 模块列表
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return ModuleService::all();
    }

    /**
     * 获取所有已经安装的模块
     * @return Collection<mixed, Module>
     */
    public function installed()
    {
        return ModuleResource::collection(Module::all());
    }


    /**
     * 保存模块
     * @param Request $request
     * @return array
     * @throws BindingResolutionException
     */
    public function store(Request $request)
    {
        $config = ModuleService::config($request->name, 'config');
        $module = Module::create($config);

        return $this->message('模块安装成功', 0, $module);
    }


    /**
     * 删除模块
     * @param Module $module
     * @return array
     * @throws Exception
     */
    public function destroy(Module $module)
    {
        $module->delete();

        return $this->message('模块卸载成功');
    }
}
