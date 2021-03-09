<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

/**
 * 站点资源
 * @property mixed id
 * @property mixed name
 * @property mixed icon
 * @property mixed email
 * @property mixed qq
 * @property mixed home
 * @property mixed github
 * @property mixed wechat
 * @property mixed weibo
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed group
 * @property mixed mobile
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'avatar' => $this->icon,
            'email' => $this->email,
            'qq' => $this->qq,
            'home' => $this->home,
            'github' => $this->github,
            'wechat' => $this->wechat,
            'weibo' => $this->weibo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'group' => $this->group,
            'mobile' => $this->when($this->check(), $this->mobile),
        ];
    }

    protected function check(): bool
    {
        if (Auth::check()) {
            return Auth::id() == $this->resource->id;
        }
    }
}
