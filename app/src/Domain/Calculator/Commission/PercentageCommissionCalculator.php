<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Calculator\Commission;

use Lukikrk\CurrencyExchange\Domain\Calculator\CommissionCalculator;

final readonly class PercentageCommissionCalculator implements CommissionCalculator
{
    private const float COMMISSION_PERCENT = 1;

    public function calculate(float $value): float
    {
        return $value * (self::COMMISSION_PERCENT / 100);
    }
}
