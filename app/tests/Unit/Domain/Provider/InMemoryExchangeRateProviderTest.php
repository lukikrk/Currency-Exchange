<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Tests\Unit\Domain\Provider;

use Lukikrk\CurrencyExchange\Domain\Enum\CurrencyCode;
use Lukikrk\CurrencyExchange\Domain\Model\Currency;
use Lukikrk\CurrencyExchange\Domain\Provider\ExchangeRate\InMemoryExchangeRateProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class InMemoryExchangeRateProviderTest extends TestCase
{
    #[Test]
    #[DataProvider('currencyProvider')]
    public function itShouldProvideExchangeRate(Currency $source, Currency $target, float $expectedRate): void
    {
        $provider = new InMemoryExchangeRateProvider();

        $rate = $provider->provide($source , $target);

        $this->assertSame($expectedRate, $rate);
    }

    /** @return array<array<Currency|float>> */
    public static function currencyProvider(): array
    {
        $eur = new Currency('Euro', CurrencyCode::EUR);
        $gbp = new Currency('Pound', CurrencyCode::GBP);

        return [
            [$eur, $gbp, 1.5678],
            [$gbp, $eur, 1.5432],
        ];
    }
}
