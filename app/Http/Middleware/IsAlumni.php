<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAlumni
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check() && Auth::user()->hasRole('Admin')) {
            return redirect()->route('adminDashboard');
        }

        if (Auth::user()->hasRole('Alumni')) {
            return $next($request);
        }


        return redirect()->back()->with(['message' => 'Anda Bukan Alumni']);
    }
}
