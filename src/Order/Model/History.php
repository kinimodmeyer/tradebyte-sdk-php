<?php

namespace Tradebyte\Order\Model;

/**
 * @package Tradebyte
 */
class History
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $createdDate;

    /**
     * @return integer|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return History
     */
    public function setId(int $id): History
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return History
     */
    public function setType(string $type): History
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }

    /**
     * @param string $createdDate
     * @return History
     */
    public function setCreatedDate(string $createdDate): History
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getRawData()
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'created_date' => $this->getCreatedDate(),
        ];
    }
}
