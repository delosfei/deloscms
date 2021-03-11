<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Undocumented class
 */
class GroupResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
                'packages' => $this->packages,
            ];
    }
}
