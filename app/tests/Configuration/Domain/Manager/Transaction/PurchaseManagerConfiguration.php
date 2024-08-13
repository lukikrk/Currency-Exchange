<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Tests\Configuration\Domain\Manager\Transaction;

use Lukikrk\CurrencyExchange\Domain\Calculator\Commission\PercentageCommissionCalculator;
use Lukikrk\CurrencyExchange\Domain\Manager\Transaction\PurchaseManager;
use Lukikrk\CurrencyExchange\Domain\Provider\ExchangeRate\InMemoryExchangeRateProvider;

final readonly class PurchaseManagerConfiguration
{
    public static function purchaseManager(): PurchaseManager
    {
        return new PurchaseManager(
            new InMemoryExchangeRateProvider(),
            new PercentageCommissionCalculator(),
        );
    }
}
