<?php
namespace Tradebyte\Order\Model;

/**
 * @package Tradebyte
 */
class Payment
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $directdebit;

    /**
     * @var float
     */
    protected $costs;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDirectdebit(): string
    {
        return $this->directdebit;
    }

    /**
     * @param string $directdebit
     */
    public function setDirectdebit(string $directdebit): void
    {
        $this->directdebit = $directdebit;
    }

    /**
     * @return float
     */
    public function getCosts(): float
    {
        return $this->costs;
    }

    /**
     * @param float $costs
     */
    public function setCosts(float $costs): void
    {
        $this->costs = $costs;
    }

    /**
     * @return mixed[]
     */
    public function getRawData()
    {
        return [
            'costs' => $this->getCosts(),
            'directdebit' => $this->getDirectdebit(),
            'type' => $this->getType()
        ];
    }
}
