<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Tests\Unit\Domain\Manager;

use Lukikrk\CurrencyExchange\Domain\Enum\CurrencyCode;
use Lukikrk\CurrencyExchange\Domain\Model\Currency;
use Lukikrk\CurrencyExchange\Domain\Model\Transaction;
use Lukikrk\CurrencyExchange\Domain\Model\TransactionRequest;
use Lukikrk\CurrencyExchange\Domain\Model\TransactionRequest\Purchase;
use Lukikrk\CurrencyExchange\Domain\Model\TransactionRequest\Sale;
use Lukikrk\CurrencyExchange\Tests\Configuration\Domain\Manager\TransactionManagerStrategyConfiguration;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class TransactionManagerStrategyTest extends TestCase
{
    #[Test]
    #[DataProvider('transactionProvider')]
    public function itShouldMakeTransaction(
        TransactionRequest $request,
        float $expectedExchangeRate,
        float $expectedCommission,
        float $expectedValue
    ): void {
        $manager = TransactionManagerStrategyConfiguration::transactionManagerStrategy();

        $transaction = $manager->makeTransaction($request);

        $this->assertInstanceOf(Transaction::class, $transaction);

        $this->assertSame($request,$transaction->getRequest());
        $this->assertSame($expectedExchangeRate, $transaction->getExchangeRate());
        $this->assertSame($expectedCommission, $transaction->getCommission());
        $this->assertSame($expectedValue, $transaction->getValue());
    }


    public static function transactionProvider(): array
    {
        return [
            [
                new Sale(
                    new Currency('Euro', CurrencyCode::EUR),
                    new Currency('Pound', CurrencyCode::GBP),
                    100,
                ),
                1.5678,
                1.57,
                155.21,
            ],
            [
                new Purchase(
                    new Currency('Euro', CurrencyCode::EUR),
                    new Currency('Pound', CurrencyCode::GBP),
                    100,
                ),
                1.5678,
                0.64,
                64.42,
            ],
            [
                new Sale(
                    new Currency('Pound', CurrencyCode::GBP),
                    new Currency('Euro', CurrencyCode::EUR),
                    100,
                ),
                1.5432,
                1.54,
                152.78,
            ],
            [
                new Purchase(
                    new Currency('Pound', CurrencyCode::GBP),
                    new Currency('Euro', CurrencyCode::EUR),
                    100,
                ),
                1.5432,
                0.65,
                65.45,
            ],
        ];
    }
}
