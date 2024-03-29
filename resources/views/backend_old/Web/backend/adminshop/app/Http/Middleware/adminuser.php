<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use phpDocumentor\Reflection\Types\True_;

class adminuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
//            $roless = auth()->user()->roleid;
//            foreach ($roless as $role){
//                $permisstion = $role ->permisstions;
//                if($permisstion->contains('key_code', $roles)) {
//
//                }
//                }
//                return abort(403);
//
        return $next($request);
            }

}
