<?php

use JeffersonGoncalves\FilamentSatis\Models\Token;

it('uses configured table prefix', function () {
    $token = new Token;

    expect($token->getTable())->toBe('satis_tokens');
});

it('hides token attribute', function () {
    $token = new Token;
    $hidden = $token->getHidden();

    expect($hidden)->toContain('token');
});

it('generates unique tokens', function () {
    $token1 = Token::generateToken();
    $token2 = Token::generateToken();

    expect($token1)
        ->toHaveLength(64)
        ->not->toBe($token2);
});
