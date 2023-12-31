<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class IsCandidate
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (auth()->user()->roles()->candidateRole()->get()->isNotEmpty()) {
            return $next($request);
        }
        return redirect()->route('list-advertisements');
    }


}
