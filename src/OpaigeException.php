<?php

declare(strict_types=1);

namespace Opaige;

/** An answer that was not a success: the status, Opaige's error code, the request id to quote to support, and any details. */
final class OpaigeException extends \RuntimeException
{
    public function __construct(string $message, public readonly int $status, public readonly ?string $errorCode = null, public readonly ?string $requestId = null, public readonly mixed $details = null)
    {
        parent::__construct($message, $status);
    }
}
