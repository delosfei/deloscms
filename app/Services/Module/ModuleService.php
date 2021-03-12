<?php

namespace App\Services\Module;

use App\Models\Module;
use Module as ModulePackage;
use App\Models\Site;
use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use Symfony\Component\HttpFoundation\Exception\ConflictingHeadersException;

/**
 * 站点服务
 * @package App\Services
 */
class ModuleService
{
    /**
     * 根据域名获取模块
     * @return mixed
     * @throws BindingResolutionException
     * @throws SuspiciousOperationException
     * @throws ConflictingHeadersException
     */
    public function getByDomain()
    {
        $host = parse_url(request()->url())['host'];
        $url = preg_replace('/https?:\/\/'.$host.'/', '', request()->url());
        $url = str_replace('/api', '', $url);
        preg_match('/\/(.*?)\//', $url, $match);
        if (isset($match[1])) {
            return Module::where('name', $match[1])->first();
        }
    }

    /**
     * 缓存模块
     * @param Module|null $module
     * @return null|Module
     */
    public function cache(Module $module = null)
    {
        static $cache = null;
        if ($module) {
            $cache = $module;
            define("MID", $module['id']);
        }
        $this->loadGlobalConfig($cache);

        return $cache;
    }


    public function all()
    {
        return ModulePackage::toCollection()->map(
            function ($module) {
                $name = $module->getName();
                $id = Module::where('name', $name)->value('id');

                return [
                        'id' => $id,
                        'preview' => url("modules/{$name}/static/preview.jpeg"),
                    ] + $this->config($name, 'config');
            }
        )->values();
    }

    public function config(string $name, string $file)
    {
        return include base_path("Modules/{$name}/config/{$file}.php");
    }

    /**
     * 站点拥有的所有模块
     *
     * @param Site $site
     * @return void
     */
    public function getSiteModules(Site $site)
    {
        $group = $site->master->group->load('packages.modules');
        $modules = collect();
        $group->packages->map(
            function ($package) use ($modules) {
                $package->modules->map(
                    function ($m) use ($modules) {
                        $modules->push($m);
                    }
                );
            }
        );

        return $modules->unique('name');
    }

    /**
     * 获取用户可以使用的模块
     *
     * @param Site $site
     * @return void
     */
    public function userModules(User $user)
    {
        $group = $user->group->load('packages.modules');
        $modules = collect();
        $group->packages->map(
            function ($package) use ($modules) {
                $package->modules->map(
                    function ($m) use ($modules) {
                        $modules->push($m);
                    }
                );
            }
        );

        return $modules->unique('name');
    }
}
