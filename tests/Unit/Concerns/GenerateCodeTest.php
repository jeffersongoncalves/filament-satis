<?php

use JeffersonGoncalves\FilamentSatis\Models\Package;
use JeffersonGoncalves\FilamentSatis\Models\Token;

it('generates unique code with default length', function () {
    $code = Package::generateUniqueCode();

    expect($code)->toHaveLength(32);
});

it('generates unique code with custom length', function () {
    $code = Package::generateUniqueCode(16);

    expect($code)->toHaveLength(16);
});

it('generates token with 64 characters', function () {
    $token = Token::generateToken();

    expect($token)->toHaveLength(64);
});

it('generates webhook secret with 40 characters', function () {
    $secret = Package::generateWebhookSecret();

    expect($secret)->toHaveLength(40);
});

it('generates reference with 20 characters', function () {
    $reference = Package::generateReference();

    expect($reference)->toHaveLength(20);
});
