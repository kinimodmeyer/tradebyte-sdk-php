<?php
namespace Tradebyte;

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
    public function __construct(array $options)
    {
        $this->options = $options;

        $restClient = new Client\Rest();
        $restClient->setAccountNumber((int)$this->options['credentials']['account_number']);
        $restClient->setAccountUser($this->options['credentials']['account_user']);
        $restClient->setAccountPassword($this->options['credentials']['account_password']);

        if (!empty($this->options['base_url'])) {
            $restClient->setBaseURL($this->options['base_url']);
        }

        $this->restClient = $restClient;
    }

    /**
     * @return Client\Rest
     */
    public function getRestClient()
    {
        return $this->restClient;
    }

    /**
     * @return Order\Handler
     */
    public function getOrderHandler(): Order\Handler
    {
        return new Order\Handler($this);
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
