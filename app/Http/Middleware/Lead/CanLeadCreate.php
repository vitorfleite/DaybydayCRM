<?php

namespace App\Http\Middleware\Lead;

use Closure;

class CanLeadCreate
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
        if (!auth()->user()->can('lead-create')) {
            Session()->flash('flash_message_warning', __("Você não tem permissão para criar um leed"));
            return redirect()->route('leads.unqualified');
        }
        return $next($request);
    }
}
