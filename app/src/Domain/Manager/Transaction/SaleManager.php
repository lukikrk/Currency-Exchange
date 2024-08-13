<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Manager\Transaction;

use Lukikrk\CurrencyExchange\Domain\Calculator\CommissionCalculator;
use Lukikrk\CurrencyExchange\Domain\Manager\TransactionManager;
use Lukikrk\CurrencyExchange\Domain\Model\Transaction;
use Lukikrk\CurrencyExchange\Domain\Model\TransactionRequest;
use Lukikrk\CurrencyExchange\Domain\Model\TransactionRequest\Sale;
use Lukikrk\CurrencyExchange\Domain\Provider\ExchangeRateProvider;

final readonly class SaleManager implements TransactionManager
{
    public function __construct(
        private ExchangeRateProvider $provider,
        private CommissionCalculator $calculator,
    ) {
    }

    public function makeTransaction(TransactionRequest $request): Transaction
    {
        $rate = $this->provider->provide($request->getSourceCurrency(), $request->getTargetCurrency());

        $amount = $request->getAmount() * $rate;
        $amount -= $commission = round($this->calculator->calculate($amount), 2);

        return new Transaction(
            $request,
            $rate,
            $commission,
            round($amount, 2)
        );
    }

    public function supports(TransactionRequest $request): bool
    {
        return true === $request instanceof Sale;
    }
}
