<?php

namespace App\Api;

use App\Models\Site;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


	public function index()
	{
        return SiteResource::collection(Site::all());
	}

    public function show(Site $site)
    {
        return new SiteResource($site);
    }

	public function store(SiteRequest $request,Site $site)
	{
        $site->fill($request->input());
        $site->user_id = Auth::id();
        $site->config = [];
        $site->save();
        return  $this->message('站点添加成功');


	}


	public function update(SiteRequest $request, Site $site)
    {
        $this->authorize('update', $site);
        $site->fill($request->input())->save();
        return ['message' => '修改成功'];
    }

	public function destroy(Site $site)
    {
        $this->authorize('delete', $site);
        $site->delete();
        return ['message' => '删除成功'];
    }
}
