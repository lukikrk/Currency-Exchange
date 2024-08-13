<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Tests\Unit\Domain\Model\TransactionRequest;

use Lukikrk\CurrencyExchange\Domain\Enum\CurrencyCode;
use Lukikrk\CurrencyExchange\Domain\Exception\InvalidTransactionRequestAmount;
use Lukikrk\CurrencyExchange\Domain\Model\Currency;
use Lukikrk\CurrencyExchange\Domain\Model\TransactionRequest\Purchase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PurchaseTest extends TestCase
{
    #[Test]
    #[DataProvider('invalidAmountProvider')]
    public function itShouldThrowExceptionWHenInvalidAmountProvided(float $invalidAmount): void
    {
        $this->expectException(InvalidTransactionRequestAmount::class);

        new Purchase(
            new Currency('Euro', CurrencyCode::EUR),
            new Currency('Pound', CurrencyCode::GBP),
            $invalidAmount,
        );
    }

    public static function invalidAmountProvider(): array
    {
        return [
            [0],
            [-1.23],
        ];
    }
}
