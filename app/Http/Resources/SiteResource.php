<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

/**
 * 站点资源
 * @package App\Http\Resources
 */
class SiteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'keyword'=>$this->keyword
        ];
    }
}
