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
     * @param mixed[] $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }
}
