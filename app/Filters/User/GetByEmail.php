<?php

namespace App\Filters\User;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GetByEmail
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Builder $query, Closure $next)
    {
        $query->where('email', 'REGEXP', $this->request->qrTxt);
        return $next($query);
    }
}
