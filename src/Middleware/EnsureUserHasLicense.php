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

        if (! $this->validateTenantAccess($request, $token)) {
            return response()->json([
                'error' => 'Forbidden',
                'message' => 'Token does not belong to this tenant.',
            ], Response::HTTP_FORBIDDEN);
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

    protected function validateTenantAccess(Request $request, $token): bool
    {
        if (! config('filament-satis.tenancy.enabled')) {
            return true;
        }

        $tenantId = $request->route('tenant');

        if (! $tenantId) {
            return true;
        }

        $fk = config('filament-satis.tenancy.foreign_key');

        return $token->{$fk} == $tenantId;
    }
}
