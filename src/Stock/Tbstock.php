<?php

declare(strict_types=1);

namespace Tradebyte\Stock;

use Tradebyte\Client;

class Tbstock
{
    private Tbstock\Iterator $iterator;

    public function __construct(Client $client, string $url, array $filter = [], bool $localFile = false)
    {
        $this->iterator = new Tbstock\Iterator($client, $url, $filter);
        $this->iterator->setOpenLocalFilepath($localFile);
    }

    public function getChangeDate(): ?string
    {
        return $this->iterator->getChangeDate();
    }

    public function getStock(): Tbstock\Iterator
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
