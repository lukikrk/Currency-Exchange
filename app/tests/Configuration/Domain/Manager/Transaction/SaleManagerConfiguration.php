<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Tests\Configuration\Domain\Manager\Transaction;

use Lukikrk\CurrencyExchange\Domain\Calculator\Commission\PercentageCommissionCalculator;
use Lukikrk\CurrencyExchange\Domain\Manager\Transaction\SaleManager;
use Lukikrk\CurrencyExchange\Domain\Provider\ExchangeRate\InMemoryExchangeRateProvider;

final readonly class SaleManagerConfiguration
{
    public static function saleManager(): SaleManager
    {
        return new SaleManager(
            new InMemoryExchangeRateProvider(),
            new PercentageCommissionCalculator(),
        );
    }
}
