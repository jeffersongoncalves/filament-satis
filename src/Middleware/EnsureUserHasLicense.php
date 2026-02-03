<?php

namespace JeffersonGoncalves\FilamentSatis\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class EnsureUserHasLicense
{
    public function handle(Request $request, Closure $next): mixed
    {
        $token = $this->resolveToken($request);

        if (! $token) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Invalid token credentials.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $request->attributes->set('satis_token', $token);

        return $next($request);
    }

    protected function resolveToken(Request $request): mixed
    {
        // Try basic auth
        $password = $request->getPassword();

        if ($password) {
            $tokenModel = ModelResolver::token();

            return $tokenModel::where('token', $password)->first();
        }

        // Try bearer token
        $bearerToken = $request->bearerToken();

        if ($bearerToken) {
            $tokenModel = ModelResolver::token();

            return $tokenModel::where('token', $bearerToken)->first();
        }

        return null;
    }
}
