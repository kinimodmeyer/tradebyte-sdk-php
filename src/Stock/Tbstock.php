<?php

namespace Tradebyte\Stock;

use Tradebyte\Client;

/**
 * @package Tradebyte
 */
class Tbstock
{
    /**
     * @var Tbstock\Iterator
     */
    protected $iterator;

    /**
     * @param Client  $client
     * @param string  $url
     * @param mixed[] $filter
     * @param boolean $localFile
     */
    public function __construct(Client $client, string $url, $filter = [], $localFile = false)
    {
        $this->iterator = new Tbstock\Iterator($client, $url, $filter);
        $this->iterator->setOpenLocalFilepath($localFile);
    }

    /**
     * @return string|null
     */
    public function getChangeDate(): ?string
    {
        return $this->iterator->getChangeDate();
    }

    /**
     * @return Tbstock\Iterator
     */
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
