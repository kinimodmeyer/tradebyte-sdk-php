<?php

declare(strict_types=1);

namespace Tradebyte\Base;

use Tradebyte\Client;
use XMLReader;

class Iterator
{
    protected ?XMLReader $xmlReader = null;

    protected int $i = 0;

    protected Client $client;

    protected string $url;

    protected array $filter;

    protected bool $openLocalFilepath = false;

    protected bool $isOpen = false;

    public function __construct(Client $client, string $url, array $filter = [])
    {
        $this->client = $client;
        $this->url = $url;
        $this->filter = $filter;
    }

    public function setOpenLocalFilepath(bool $openLocalFilepath): void
    {
        $this->openLocalFilepath = $openLocalFilepath;
    }

    public function key(): int
    {
        return $this->i;
    }

    public function rewind(): void
    {
        $this->i = 0;
        $this->isOpen = false;
        $this->open();
        $this->next();
    }

    public function getIsOpen(): bool
    {
        return $this->isOpen;
    }

    public function close(): void
    {
        $this->xmlReader->close();
    }
}
