<?php

namespace App\Http\Middleware\User;

use Closure;

class CanUserCreate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->can('user-create')) {
            Session()->flash('flash_message_warning', __("Você não tem permissão para criar um usuário"));
            return redirect()->route('users.index');
        }
        return $next($request);
    }
}
