<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

/**
 * 站点资源
 * @property mixed keyword
 * @property mixed title
 * @property mixed id
 * @property mixed domain
 * @property mixed permission
 * @property mixed master
 * @property mixed created_at
 * @package App\Http\Resources
 */
class SiteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'keyword' => $this->keyword,
            'domain' => $this->domain,
            'config' => $this->when($this->check(), $this->config),
            'created_at' => $this->created_at,
            'permission' => $this->permission,
            'master' => $this->master,
        ];
    }

    private function check(): bool
    {
        if (Auth::check()) {
            return Auth::id() == $this->resource->user_id;
        }
    }
}
