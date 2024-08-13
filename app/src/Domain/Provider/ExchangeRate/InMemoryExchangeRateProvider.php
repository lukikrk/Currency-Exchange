<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Provider\ExchangeRate;

use Lukikrk\CurrencyExchange\Domain\Enum\CurrencyCode;
use Lukikrk\CurrencyExchange\Domain\Model\Currency;
use Lukikrk\CurrencyExchange\Domain\Provider\ExchangeRateProvider;

final readonly class InMemoryExchangeRateProvider implements ExchangeRateProvider
{
    /** @var array<array{source: CurrencyCode, target: CurrencyCode, target: float}> $exchangeRates */
    private array $exchangeRates;

    public function __construct()
    {
        $this->exchangeRates = [
            ['source' => CurrencyCode::EUR->value, 'target' => CurrencyCode::GBP->value, 'rate' => 1.5678],
            ['source' => CurrencyCode::GBP->value, 'target' => CurrencyCode::EUR->value, 'rate' => 1.5432],
        ];
    }

    public function provide(Currency $source, Currency $target): float
    {
        $criteria = ['source' => $source->getCode()->value, 'target' => $target->getCode()->value];

        $result = array_filter(
            $this->exchangeRates,
            static fn (array $exchangeRate): bool
            => count(array_intersect_assoc($criteria, $exchangeRate)) === count($criteria),
        );

        return $this->exchangeRates[array_key_first($result)]['rate'];
    }
}
