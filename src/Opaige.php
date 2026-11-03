<?php

declare(strict_types=1);

namespace Opaige;

/**
 * The Opaige API for PHP. Every method is one API call, named as in the API reference (opaige.com/developers):
 *
 *   $opaige = new Opaige\Opaige(getenv('OPAIGE_KEY'));
 *   $answer = $opaige->checkRequirements(passport: 'IN', destination: 'FR');
 *   $opaige->sendBookings(body: ['bookings' => [...]]);
 *
 * A sandbox key answers in the same shape and saves and bills nothing.
 */
final class Opaige extends Operations
{
    private Requester $requester;

    public function __construct(string $key, string $baseUrl = 'https://opaige.com/api/company/v1', int $timeout = 120, int $maxRetries = 2)
    {
        $this->requester = new Requester($key, $baseUrl, $timeout, $maxRetries);
    }

    protected function http(): Requester
    {
        return $this->requester;
    }
}
