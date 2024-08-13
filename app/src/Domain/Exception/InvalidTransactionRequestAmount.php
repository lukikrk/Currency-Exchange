<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Exception;

use DomainException;

final class InvalidTransactionRequestAmount extends DomainException
{
    public function __construct()
    {
        parent::__construct('Transaction request amount has to be grater than 0.');
    }
}
