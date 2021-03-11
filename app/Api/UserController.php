<?php

namespace App\Api;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(User::class, 'user');
    }

    public function info()
    {
        return new UserResource(Auth::user());
    }

    public function password(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            return $this->error('原密码输入错误', 403);
        }

        $request->validate(
            [
                'old_password' => ['required'],
                'password' => ['required', 'confirmed'],
            ],
            ['password.confirmed' => '确认密码输入错误']
        );

        $user->password = Hash::make($request->password);
        $user->save();

        return $this->message('密码修改成功');
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


    public function update(Request $request, User $user)
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
