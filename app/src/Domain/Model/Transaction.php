<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Model;

final readonly class Transaction
{
    public function __construct(
        private TransactionRequest $request,
        private float $exchangeRate,
        private float $commission,
        private float $value,
    ) {
    }

    public function getRequest(): TransactionRequest
    {
        return $this->request;
    }

    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }

    public function getCommission(): float
    {
        return $this->commission;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
