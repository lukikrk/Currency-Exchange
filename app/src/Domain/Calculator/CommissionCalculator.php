<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Calculator;

interface CommissionCalculator
{
    public function calculate(float $value): float;
}
