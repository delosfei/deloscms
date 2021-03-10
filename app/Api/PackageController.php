<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;
use Auth;

/**
 * 套餐控制器
 * @package App\Http\Controllers
 */
class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->authorizeResource(Package::class, 'package');
    }

    public function index()
    {
        return Package::all();
    }

    public function store(PackageRequest $request)
    {
        Package::create($request->input());

        return $this->message('套餐添加成功');
    }


    public function show(Package $package)
    {
        return $package;
    }

    public function update(PackageRequest $request, Package $package)
    {
        $package->fill($request->input())->save();

        return $this->message('修改成功');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return $this->message('套餐删除成功');
    }
}
