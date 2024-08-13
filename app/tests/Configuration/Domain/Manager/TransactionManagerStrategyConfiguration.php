<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Tests\Configuration\Domain\Manager;

use Lukikrk\CurrencyExchange\Domain\Manager\TransactionManagerStrategy;
use Lukikrk\CurrencyExchange\Tests\Configuration\Domain\Manager\Transaction\PurchaseManagerConfiguration;
use Lukikrk\CurrencyExchange\Tests\Configuration\Domain\Manager\Transaction\SaleManagerConfiguration;

final readonly class TransactionManagerStrategyConfiguration
{
    public static function transactionManagerStrategy(): TransactionManagerStrategy
    {
        return new TransactionManagerStrategy([
            PurchaseManagerConfiguration::purchaseManager(),
            SaleManagerConfiguration::saleManager(),
        ]);
    }
}
