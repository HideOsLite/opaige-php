<?php

declare(strict_types=1);

namespace Opaige;

/**
 * Checks that a webhook came from Opaige and was not replayed. Pass the raw request body exactly as received
 * (file_get_contents('php://input')), the Opaige-Signature header and your endpoint's signing secret.
 *   Opaige-Signature: t=<unix seconds>,v1=<hex HMAC-SHA256 of "<t>.<raw body>">
 */
final class Webhook
{
    /** @return array The event: id, event, created_at, data. */
    public static function verify(string $rawBody, ?string $signature, string $secret, int $toleranceSeconds = 300, ?int $now = null): array
    {
        $parts = [];
        foreach (explode(',', (string) $signature) as $p) {
            [$k, $v] = array_pad(explode('=', trim($p), 2), 2, '');
            $parts[$k] = $v;
        }
        if (!isset($parts['t'], $parts['v1']) || !ctype_digit($parts['t'])) {
            throw new \UnexpectedValueException('Opaige-Signature is missing or malformed.');
        }
        $t = (int) $parts['t'];
        if (abs(($now ?? time()) - $t) > $toleranceSeconds) {
            throw new \UnexpectedValueException('Opaige-Signature is too old: a replay, or a clock far off.');
        }
        if (!hash_equals(hash_hmac('sha256', $t . '.' . $rawBody, $secret), $parts['v1'])) {
            throw new \UnexpectedValueException('Opaige-Signature does not match this body and secret.');
        }
        return json_decode($rawBody, true, 512, JSON_THROW_ON_ERROR);
    }
}
