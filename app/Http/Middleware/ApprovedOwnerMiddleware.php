<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Enums\Status;
use Symfony\Component\HttpFoundation\Response;

class ApprovedOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (\Illuminate\Http\Response|RedirectResponse) $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->status == Status::Approved) {
            return $next($request);
        }
        return response()->json([
            'message' => 'You do not have permission to access this resource.',
        ], Response::HTTP_FORBIDDEN);
    }
}
