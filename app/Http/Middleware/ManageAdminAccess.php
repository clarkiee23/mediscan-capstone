<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageAdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $role = $request->session()->get('role');

        if($role == "user"){
            return redirect()->route("user_consultation_form");
        }
        return $next($request);
    }
}
