<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Model;

use Lukikrk\CurrencyExchange\Domain\Exception\InvalidTransactionRequestAmount;

abstract class TransactionRequest
{
    public function __construct(
        private Currency $sourceCurrency,
        private Currency $targetCurrency,
        private float $amount,
    ) {
        if (0 >= $this->amount) {
            throw new InvalidTransactionRequestAmount();
        }
    }

    public function getSourceCurrency(): Currency
    {
        return $this->sourceCurrency;
    }

    public function getTargetCurrency(): Currency
    {
        return $this->targetCurrency;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}
