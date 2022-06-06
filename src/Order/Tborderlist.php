<?php

declare(strict_types=1);

namespace Tradebyte\Order;

use Tradebyte\Client;

class Tborderlist
{
    private Tborder\Iterator $iterator;

    public function __construct(Client $client, string $url, array $filter = [], bool $localFile = false)
    {
        $this->iterator = new Tborder\Iterator($client, $url, $filter);
        $this->iterator->setOpenLocalFilepath($localFile);
    }

    public function getOrders(): Tborder\Iterator
    {
        if (!$this->iterator->getIsOpen()) {
            $this->iterator->open();
        }

        return $this->iterator;
    }

    public function close(): void
    {
        $this->iterator->close();
    }
}
