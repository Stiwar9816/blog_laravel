<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentsForbiddenWords
{
    protected $forbidden = [
        'puta'
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        foreach ($this->forbidden as $word) {
            $request ->merge([
                'name' => Str::replace($word,'****', $request->input('name')),
                'content' => Str::replace($word,'****', $request->input('content'))
            ]);
        }

        return $next($request);
    }
}
