<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

/**
 * 站点资源
 * @package App\Http\Resources
 */
class ModuleResource extends JsonResource
{
    public function toArray($request)
    {
        return ['preview' => url("modules/{$this->name}/static/preview.jpeg")] + parent::toArray($request);
    }
}
