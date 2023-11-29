<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageUserAccess
{

    public function handle(Request $request, Closure $next): Response
    {
        $role = $request->session()->get('role');

        if($role == "admin"){
            return redirect()->route("dashboard");
        }

        return $next($request);
    }
}
