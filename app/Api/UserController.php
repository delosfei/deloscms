<?php

namespace App\Api;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function info()
    {
        return new UserResource(Auth::user());
    }


    public function index()
    {
        return UserResource::collection();
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function store(UserRequest $request, User $user)
    {
        //  $site->fill($request->input());
        //  $site->user_id = Auth::id();
        //  $site->config = [];
        //  $site->save();
        //  return  $this->message('站点添加成功');

        $user = fill($request->input());
        $user->save();

        return $this->message('添加成功');
    }


    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $user->fill($request->input())->save();

        return ['message' => '修改成功'];
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();

        return ['message' => '删除成功'];
    }
}
