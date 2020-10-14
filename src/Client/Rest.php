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
     * @param mixed[] $filter
     * @return XMLReader
     */
    public function getXML(string $url, array $filter = []): XMLReader
    {
        $auth = base64_encode($this->accountUser.':'.$this->accountPassword);
        $context = [
            'http' => [
                'header' => 'Authorization: Basic '.$auth,
                'ignore_errors' => true,
                'time_out' => 3600,
            ]
        ];
        libxml_set_streams_context(stream_context_create($context));
        $reader = new XMLReader();
        $uri = $this->baseURL.'/'.$this->accountNumber.'/'.$url.'/';

        if (!empty($filter)) {
            if (!empty($filter['extra'])) {
                $uri .= $filter['extra'];
                unset($filter['extra']);
            }

            if (!empty($filter)) {
                $uri .= '?'.http_build_query($filter);
            }
        }

        $reader->open($uri);

        $statusLine = $http_response_header[0];
        preg_match('{HTTP\/\S*\s(\d{3})}', $statusLine, $match);
        $status = $match[1];

        if ($status !== '200') {
            throw new \RuntimeException('unexpected response status: '.$statusLine);
        }

        return $reader;
    }
}
