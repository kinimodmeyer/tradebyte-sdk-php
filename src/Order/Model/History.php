<?php

declare(strict_types=1);

namespace Tradebyte\Order\Model;

class History
{
    private ?int $id = null;

    private ?string $type = null;

    private ?string $createdDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): History
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): History
    {
        $this->type = $type;
        return $this;
    }

    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }

    public function setCreatedDate(string $createdDate): History
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    public function getRawData(): array
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'created_date' => $this->getCreatedDate(),
        ];
    }
}
