<?php
namespace Tradebyte\Client;

use XMLReader;

/**
 * @package Tradebyte
 */
class Rest
{
    /**
     * @var int
     */
    private $accountNumber;

    /**
     * @var string
     */
    private $accountUser;

    /**
     * @var string
     */
    private $accountPassword;

    /**
     * @var string
     */
    private $baseURL = 'https://rest.trade-server.net';

    /**
     * @param int $number
     */
    public function setAccountNumber(int $number)
    {
        $this->accountNumber = $number;
    }

    /**
     * @param string $user
     */
    public function setAccountUser(string $user)
    {
        $this->accountUser = $user;
    }

    /**
     * @param string $password
     */
    public function setAccountPassword(string $password)
    {
        $this->accountPassword = $password;
    }

    /**
     * @param string $baseURL
     */
    public function setBaseURL(string $baseURL)
    {
        $this->baseURL = $baseURL;
    }

    /**
     * @param string $url
     * @return XMLReader
     */
    public function getXML(string $url): XMLReader
    {
        $auth = base64_encode($this->accountUser.':'.$this->accountPassword);
        $context = [
            'http' => [
                'header' => 'Authorization: Basic '.$auth
            ]
        ];
        libxml_set_streams_context(stream_context_create($context));
        return XMLReader::open($this->baseURL.'/'.$this->accountNumber.'/'.$url.'/');
    }
}
