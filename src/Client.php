<?php

namespace Tradebyte;

use Tradebyte\Product\Tbcat;

/**
 * Entry point of the library.
 *
 * @package Tradebyte
 */
class Client
{
    /**
     * @var mixed[]
     */
    private $options = [];

    /**
     * @var Client\Rest
     */
    private $restClient;

    /**
     * @param mixed[] $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
        $restClient = new Client\Rest();

        if (isset($this->options['credentials'])) {
            $restClient->setAccountNumber((int)$this->options['credentials']['account_number']);
            $restClient->setAccountUser($this->options['credentials']['account_user']);
            $restClient->setAccountPassword($this->options['credentials']['account_password']);
        }

        if (!empty($this->options['base_url'])) {
            $restClient->setBaseURL($this->options['base_url']);
        }

        $this->setRestClient($restClient);
    }

    /**
     * @return Client\Rest
     */
    public function getRestClient()
    {
        return $this->restClient;
    }

    /**
     * @param Client\Rest $client
     * @return void
     */
    public function setRestClient(Client\Rest $client): void
    {
        $this->restClient = $client;
    }

    /**
     * @return Order\Handler
     */
    public function getOrderHandler(): Order\Handler
    {
        return new Order\Handler($this);
    }

    /**
     * @return Upload\Handler
     */
    public function getUploaderHandler(): Upload\Handler
    {
        return new Upload\Handler($this);
    }

    /**
     * @return Message\Handler
     */
    public function getMessageHandler(): Message\Handler
    {
        return new Message\Handler($this);
    }

    /**
     * @return Product\Handler
     */
    public function getProductHandler(): Product\Handler
    {
        return new Product\Handler($this);
    }

    /**
     * @return Stock\Handler
     */
    public function getStockHandler(): Stock\Handler
    {
        return new Stock\Handler($this);
    }
}
