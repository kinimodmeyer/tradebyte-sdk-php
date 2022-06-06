<?php

declare(strict_types=1);

namespace Tradebyte\Order\Model;

class Customer
{
    private ?int $id = null;

    private ?string $channelNumber = null;

    private ?string $firstname = null;

    private ?string $lastname = null;

    private ?string $name = null;

    private ?string $streetNumber = null;

    private ?string $zip = null;

    private ?string $city = null;

    private ?string $country = null;

    private ?string $email = null;

    private ?string $title = null;

    private ?string $nameExtension = null;

    private ?string $streetExtension = null;

    private ?string $phonePrivate = null;

    private ?string $phoneOffice = null;

    private ?string $phoneMobile = null;

    private ?string $vatId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): Customer
    {
        $this->id = $id;
        return $this;
    }

    public function getChannelNumber(): ?string
    {
        return $this->channelNumber;
    }

    public function setChannelNumber(string $channelNumber): Customer
    {
        $this->channelNumber = $channelNumber;
        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): Customer
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): Customer
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): Customer
    {
        $this->name = $name;
        return $this;
    }

    public function getStreetNumber(): ?string
    {
        return $this->streetNumber;
    }

    public function setStreetNumber(string $streetNumber): Customer
    {
        $this->streetNumber = $streetNumber;
        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): Customer
    {
        $this->zip = $zip;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): Customer
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): Customer
    {
        $this->country = $country;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): Customer
    {
        $this->email = $email;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): Customer
    {
        $this->title = $title;
        return $this;
    }

    public function getNameExtension(): ?string
    {
        return $this->nameExtension;
    }

    public function setNameExtension(string $nameExtension): Customer
    {
        $this->nameExtension = $nameExtension;
        return $this;
    }

    public function getStreetExtension(): ?string
    {
        return $this->streetExtension;
    }

    public function setStreetExtension(string $streetExtension): Customer
    {
        $this->streetExtension = $streetExtension;
        return $this;
    }

    public function getPhonePrivate(): ?string
    {
        return $this->phonePrivate;
    }

    public function setPhonePrivate(string $phonePrivate): Customer
    {
        $this->phonePrivate = $phonePrivate;
        return $this;
    }

    public function getPhoneOffice(): ?string
    {
        return $this->phoneOffice;
    }

    public function setPhoneOffice(string $phoneOffice): Customer
    {
        $this->phoneOffice = $phoneOffice;
        return $this;
    }

    public function getPhoneMobile(): ?string
    {
        return $this->phoneMobile;
    }

    public function setPhoneMobile(string $phoneMobile): Customer
    {
        $this->phoneMobile = $phoneMobile;
        return $this;
    }

    public function getVatId(): ?string
    {
        return $this->vatId;
    }

    public function setVatId(string $vatId): Customer
    {
        $this->vatId = $vatId;
        return $this;
    }

    public function getRawData(): array
    {
        return [
            'id' => $this->getId(),
            'channel_number' => $this->getChannelNumber(),
            'zip' => $this->getZip(),
            'city' => $this->getCity(),
            'firstname' => $this->getFirstname(),
            'lastname' => $this->getLastname(),
            'title' => $this->getTitle(),
            'name' => $this->getName(),
            'name_extension' => $this->getNameExtension(),
            'country' => $this->getCountry(),
            'email' => $this->getEmail(),
            'street_number' => $this->getStreetNumber(),
            'street_extension' => $this->getStreetExtension(),
            'phone_mobile' => $this->getPhoneMobile(),
            'phone_office' => $this->getPhoneOffice(),
            'phone_private' => $this->getPhonePrivate(),
            'vat_id' => $this->getVatId(),
        ];
    }
}
