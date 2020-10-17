<?php
namespace Tradebyte\Product;

use Tradebyte\Client;

/**
 * @package Tradebyte
 */
class Tbcat
{
    /**
     * @var Tbcat\Iterator
     */
    protected $iterator;

    /**
     * @param Client $client
     * @param string $url
     * @param mixed[] $filter
     * @param bool $localFile
     */
    public function __construct(Client $client, string $url, $filter = [], $localFile = false)
    {
        $this->iterator = new Tbcat\Iterator($client, $url, $filter);
        $this->iterator->setOpenLocalFilepath($localFile);
    }

    /**
     * @return string|null
     */
    public function getSupplierName(): ?string
    {
        return $this->iterator->getSupplierName();
    }

    /**
     * @return Tbcat\Iterator
     */
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
