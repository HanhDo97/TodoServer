<?php

namespace App\Filters\User;

use App\Models\User;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GetByName
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Builder $query, Closure $next)
    {
        $query->where('name', 'REGEXP', $this->request->qrTxt);
        return $next($query);
    }
}
