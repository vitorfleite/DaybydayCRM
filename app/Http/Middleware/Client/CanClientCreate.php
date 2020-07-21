<?php

namespace App\Http\Middleware\Client;

use Closure;

class CanClientCreate
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
        if (!auth()->user()->can('client-create')) {
            Session()->flash('flash_message_warning', __("Você não tem permissão para criar um cliente"));
            return redirect()->route('clients.index');
        }

        return $next($request);
    }
}
