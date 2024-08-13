<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Provider;

use Lukikrk\CurrencyExchange\Domain\Model\Currency;

interface ExchangeRateProvider
{
    public function provide(Currency $source, Currency $target): float;
}
