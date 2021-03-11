<?php

namespace App\Api;

use App\Models\GroupPackage;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupPackageRequest;
use App\Http\Resources\GroupPackageResource;

class GroupPackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


	public function index()
	{
        return GroupPackageResource::collection();
	}

    public function show(GroupPackage $group_package)
    {
        return new GroupPackageResource($group_package);
    }

	public function store(GroupPackageRequest $request,GroupPackage $group_package)
	{
      //  $site->fill($request->input());
      //  $site->user_id = Auth::id();
      //  $site->config = [];
      //  $site->save();
      //  return  $this->message('站点添加成功');

		$group_package -> fill($request->input());
		$group_package->save();
		return  $this->message('添加成功');
	}


	public function update(GroupPackageRequest $request, GroupPackage $group_package)
    {
        $this->authorize('update', $group_package);
        $group_package->fill($request->input())->save();
        return ['message' => '修改成功'];
    }

	public function destroy(GroupPackage $group_package)
    {
        $this->authorize('delete', $group_package);
        $group_package->delete();
        return ['message' => '删除成功'];
    }
}
