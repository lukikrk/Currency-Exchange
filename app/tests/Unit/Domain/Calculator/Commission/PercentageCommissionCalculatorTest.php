<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Tests\Unit\Domain\Calculator\Commission;

use Lukikrk\CurrencyExchange\Domain\Calculator\Commission\PercentageCommissionCalculator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PercentageCommissionCalculatorTest extends TestCase
{
    #[Test]
    public function itShouldCalculateCommission(): void
    {
        $calculator = new PercentageCommissionCalculator();

        $this->assertEquals(1.23, $calculator->calculate(123));
    }
}
