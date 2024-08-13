<?php

declare(strict_types=1);

namespace Lukikrk\CurrencyExchange\Domain\Manager;

use Lukikrk\CurrencyExchange\Domain\Model\Transaction;
use Lukikrk\CurrencyExchange\Domain\Model\TransactionRequest;

interface TransactionManager
{
    public function makeTransaction(TransactionRequest $request): Transaction;

    public function supports(TransactionRequest $request): bool;
}
