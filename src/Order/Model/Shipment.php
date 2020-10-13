<?php
namespace Tradebyte\Order\Model;

/**
 * @package Tradebyte
 */
class Shipment
{
    /**
     * @var string
     */
    protected $idcodeShip;

    /**
     * @var string
     */
    protected $idcodeReturn;

    /**
     * @var string
     */
    protected $routingCode;

    /**
     * @var float
     */
    protected $price;

    /**
     * @return string|null
     */
    public function getIdcodeShip(): ?string
    {
        return $this->idcodeShip;
    }

    /**
     * @param string $idcodeShip
     */
    public function setIdcodeShip(string $idcodeShip): void
    {
        $this->idcodeShip = $idcodeShip;
    }

    /**
     * @return string|null
     */
    public function getIdcodeReturn(): ?string
    {
        return $this->idcodeReturn;
    }

    /**
     * @param string $idcodeReturn
     */
    public function setIdcodeReturn(string $idcodeReturn): void
    {
        $this->idcodeReturn = $idcodeReturn;
    }

    /**
     * @return string|null
     */
    public function getRoutingCode(): ?string
    {
        return $this->routingCode;
    }

    /**
     * @param string $routingCode
     */
    public function setRoutingCode(string $routingCode): void
    {
        $this->routingCode = $routingCode;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed[]
     */
    public function getRawData()
    {
        return [
            'idcode_return' => $this->getIdcodeReturn(),
            'idcode_ship' => $this->getIdcodeShip(),
            'price' => $this->getPrice(),
            'routing_code' => $this->getRoutingCode()
        ];
    }
}
