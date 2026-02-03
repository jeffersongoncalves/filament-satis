<?php

namespace JeffersonGoncalves\FilamentSatis\Providers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher;

class EloquentTokenProvider implements UserProvider
{
    protected Hasher $hasher;

    protected string $model;

    public function __construct(Hasher $hasher, string $model)
    {
        $this->hasher = $hasher;
        $this->model = $model;
    }

    public function retrieveById($identifier): ?Authenticatable
    {
        $model = $this->createModel();

        return $model->newQuery()
            ->where($model->getAuthIdentifierName(), $identifier)
            ->first();
    }

    public function retrieveByToken($identifier, $token): ?Authenticatable
    {
        return null;
    }

    public function updateRememberToken(Authenticatable $user, $token): void
    {
        //
    }

    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        if (empty($credentials)) {
            return null;
        }

        $model = $this->createModel();
        $query = $model->newQuery();

        // For basic auth: username is the token value
        if (isset($credentials['token'])) {
            $query->where('token', $credentials['token']);
        } elseif (isset($credentials['password'])) {
            // In Composer basic auth, the password IS the token
            $query->where('token', $credentials['password']);
        }

        return $query->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        $token = $credentials['token'] ?? $credentials['password'] ?? null;

        if (! $token) {
            return false;
        }

        return $user->getAuthIdentifier() === $token;
    }

    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false): void
    {
        //
    }

    protected function createModel(): Authenticatable
    {
        return new $this->model;
    }
}
