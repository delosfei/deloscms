<?php

namespace App\Http\Middleware;

use SiteService;
use Closure;
use Illuminate\Http\Request;

class FrontMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->initSite() === false) {
            abort(404);
        }

        return $next($request);
    }

    protected function initSite(): bool
    {
        return SiteService::getSiteByDomain() ? true : false;
    }
}
