<?php

namespace App\Http\Middleware\Client;

use Closure;

class CanClientUpdate
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
        if (!auth()->user()->can('client-update')) {
            Session()->flash('flash_message_warning', __("Você não tem permissão para atualizar um cliente"));
            return redirect()->route('clients.index');
        }
        return $next($request);
    }
}
