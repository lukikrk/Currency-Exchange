<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Model;

use Lukikrk\CurrencyExchange\Domain\Enum\CurrencyCode;

final class Currency
{
    public function __construct(
        private string $name,
        private CurrencyCode $code,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): CurrencyCode
    {
        return $this->code;
    }
}
