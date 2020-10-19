<?php

namespace Tradebyte\Order\Model;

/**
 * @package Tradebyte
 */
class Customer
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $channelNumber;

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $streetNumber;

    /**
     * @var string
     */
    protected $zip;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $nameExtension;

    /**
     * @var string
     */
    protected $streetExtension;

    /**
     * @var string
     */
    protected $phonePrivate;

    /**
     * @var string
     */
    protected $phoneOffice;

    /**
     * @var string
     */
    protected $phoneMobile;

    /**
     * @var string
     */
    protected $vatId;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Customer
     */
    public function setId(int $id): Customer
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannelNumber(): ?string
    {
        return $this->channelNumber;
    }

    /**
     * @param string $channelNumber
     * @return Customer
     */
    public function setChannelNumber(string $channelNumber): Customer
    {
        $this->channelNumber = $channelNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Customer
     */
    public function setFirstname(string $firstname): Customer
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Customer
     */
    public function setLastname(string $lastname): Customer
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Customer
     */
    public function setName(string $name): Customer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetNumber(): ?string
    {
        return $this->streetNumber;
    }

    /**
     * @param string $streetNumber
     * @return Customer
     */
    public function setStreetNumber(string $streetNumber): Customer
    {
        $this->streetNumber = $streetNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     * @return Customer
     */
    public function setZip(string $zip): Customer
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Customer
     */
    public function setCity(string $city): Customer
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Customer
     */
    public function setCountry(string $country): Customer
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Customer
     */
    public function setEmail(string $email): Customer
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Customer
     */
    public function setTitle(string $title): Customer
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameExtension(): ?string
    {
        return $this->nameExtension;
    }

    /**
     * @param string $nameExtension
     * @return Customer
     */
    public function setNameExtension(string $nameExtension): Customer
    {
        $this->nameExtension = $nameExtension;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetExtension(): ?string
    {
        return $this->streetExtension;
    }

    /**
     * @param string $streetExtension
     * @return Customer
     */
    public function setStreetExtension(string $streetExtension): Customer
    {
        $this->streetExtension = $streetExtension;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhonePrivate(): ?string
    {
        return $this->phonePrivate;
    }

    /**
     * @param string $phonePrivate
     * @return Customer
     */
    public function setPhonePrivate(string $phonePrivate): Customer
    {
        $this->phonePrivate = $phonePrivate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneOffice(): ?string
    {
        return $this->phoneOffice;
    }

    /**
     * @param string $phoneOffice
     * @return Customer
     */
    public function setPhoneOffice(string $phoneOffice): Customer
    {
        $this->phoneOffice = $phoneOffice;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneMobile(): ?string
    {
        return $this->phoneMobile;
    }

    /**
     * @param string $phoneMobile
     * @return Customer
     */
    public function setPhoneMobile(string $phoneMobile): Customer
    {
        $this->phoneMobile = $phoneMobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatId(): ?string
    {
        return $this->vatId;
    }

    /**
     * @param string $vatId
     * @return Customer
     */
    public function setVatId(string $vatId): Customer
    {
        $this->vatId = $vatId;
        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getRawData()
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
