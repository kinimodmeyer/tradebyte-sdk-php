<?php

declare(strict_types=1);

namespace Tradebyte\Message;

use Tradebyte\Client;

class Tbmessagelist
{
    private Tbmessage\Iterator $iterator;

    public function __construct(Client $client, string $url, array $filter = [], bool $localFile = false)
    {
        $this->iterator = new Tbmessage\Iterator($client, $url, $filter);
        $this->iterator->setOpenLocalFilepath($localFile);
    }

    public function getMessages(): Tbmessage\Iterator
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
