<?php

declare(strict_types=1);

namespace Tradebyte\Product;

use Tradebyte\Client;

class Tbcat
{
    private Tbcat\Iterator $iterator;

    public function __construct(Client $client, string $url, array $filter = [], bool $localFile = false)
    {
        $this->iterator = new Tbcat\Iterator($client, $url, $filter);
        $this->iterator->setOpenLocalFilepath($localFile);
    }

    public function getSupplierName(): ?string
    {
        return $this->iterator->getSupplierName();
    }

    public function getProducts(): Tbcat\Iterator
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
