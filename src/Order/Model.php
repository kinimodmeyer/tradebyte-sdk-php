<?php
namespace Tradebyte\Order;

/**
 * @package Tradebyte
 */
class Model
{
    /**
     * @var mixed[]
     */
    private $data;

    /**
     * @param mixed[]
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->data['id'];
    }

    /**
     * @return mixed[]
     */
    public function getData(): array
    {
        return $this->data;
    }
}
