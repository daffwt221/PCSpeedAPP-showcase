<?php

declare(strict_types=1);

namespace PortfolioSamples;

use RuntimeException;

final class CsrfGuard
{
    private const SESSION_KEY = 'portfolio_csrf_token';

    public function token(): string
    {
        $token = $_SESSION[self::SESSION_KEY] ?? null;

        if (!is_string($token) || strlen($token) !== 64) {
            $token = bin2hex(random_bytes(32));
            $_SESSION[self::SESSION_KEY] = $token;
        }

        return $token;
    }

    public function verify(?string $submittedToken): void
    {
        $sessionToken = $_SESSION[self::SESSION_KEY] ?? null;

        if (
            !is_string($submittedToken)
            || !is_string($sessionToken)
            || !hash_equals($sessionToken, $submittedToken)
        ) {
            throw new RuntimeException('The request could not be verified.');
        }
    }
}
