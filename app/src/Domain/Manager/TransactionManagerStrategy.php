<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Manager;

use DomainException;
use Lukikrk\CurrencyExchange\Domain\Model\Transaction;
use Lukikrk\CurrencyExchange\Domain\Model\TransactionRequest;

final readonly class TransactionManagerStrategy
{
    public function __construct(
        /** @var iterable<TransactionManager> $managers */
        private iterable $managers,
    ) {
    }

    public function makeTransaction(TransactionRequest $request): Transaction
    {
        foreach ($this->managers as $manager) {
            if ($manager->supports($request)) {
                return $manager->makeTransaction($request);
            }
        }

        throw new DomainException(
            sprintf('No strategy found for transaction request %s', $request::class),
        );
    }
}
