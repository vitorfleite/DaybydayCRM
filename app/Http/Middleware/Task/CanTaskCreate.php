<?php

namespace App\Http\Middleware\Task;

use Closure;

class CanTaskCreate
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
        if (!auth()->user()->can('task-create')) {
            Session()->flash('flash_message_warning', __("Você não tem permissão para criar uma tarefa"));
            return redirect()->route('tasks.index');
        }
        return $next($request);
    }
}
