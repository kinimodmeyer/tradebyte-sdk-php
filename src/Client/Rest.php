<?php

namespace Tradebyte\Client;

use XMLReader;

/**
 * @package Tradebyte
 */
class Rest
{
    /**
     * @var integer
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
     * @param integer $number
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
     * @return string
     */
    private function getAuthHeader()
    {
        $auth = base64_encode($this->accountUser . ':' . $this->accountPassword);
        return 'Authorization: Basic ' . $auth;
    }

    /**
     * @param string $url
     * @param array  $filter
     * @return string
     */
    private function getCreatedURI(string $url, array $filter = [])
    {
        $uri = $this->baseURL . '/' . $this->accountNumber . '/' . $url;

        if (!empty($filter)) {
            $uri .= '?' . http_build_query($filter);
        }

        return $uri;
    }

    /**
     * @param string $statusLine
     * @return integer
     */
    private function getStatusCode(string $statusLine): int
    {
        preg_match('{HTTP\/\S*\s(\d{3})}', $statusLine, $match);
        return (int)$match[1];
    }

    /**
     * @param string $localFilePath
     * @param string $url
     * @return string
     */
    public function uploadFile(string $localFilePath, string $url): string
    {
        $localHandle = fopen($localFilePath, 'r');
        $curl = curl_init($this->getCreatedURI($url, []));
        curl_setopt($curl, CURLOPT_PUT, true);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $this->accountUser . ':' . $this->accountPassword);
        curl_setopt($curl, CURLOPT_INFILE, $localHandle);
        curl_setopt($curl, CURLOPT_INFILESIZE, filesize($localFilePath));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3600);
        $response = curl_exec($curl);
        fclose($localHandle);
        curl_close($curl);

        return $response;
    }

    /**
     * @param string $localFilePath
     * @param string $url
     * @return string
     */
    public function postXMLFile(string $localFilePath, string $url): string
    {
        $localHandle = fopen($localFilePath, 'r');
        $curl = curl_init($this->getCreatedURI($url, []));
        curl_setopt($curl, CURLOPT_PUT, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $this->accountUser . ':' . $this->accountPassword);
        curl_setopt($curl, CURLOPT_INFILE, $localHandle);
        curl_setopt($curl, CURLOPT_INFILESIZE, filesize($localFilePath));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3600);
        $response = curl_exec($curl);
        var_dump($url, curl_error($curl));
        fclose($localHandle);
        curl_close($curl);

        return $response;
    }

    /**
     * @param string $localFilePath
     * @param string $url
     * @param array  $filter
     * @return boolean
     */
    public function downloadFile(string $localFilePath, string $url, array $filter = []): bool
    {
        $context = [
            'http' => [
                'header' => $this->getAuthHeader()
                    . "\r\n" . 'User-Agent: Tradebyte-SDK',
                'ignore_errors' => true,
                'time_out' => 3600,
            ]
        ];

        $handle = fopen($this->getCreatedURI($url, $filter), 'rb', false, stream_context_create($context));
        $statusLine = $http_response_header[0];

        if ($this->getStatusCode($statusLine) !== 200) {
            throw new \RuntimeException('unexpected response status: ' . $statusLine);
        }

        $localHandle = fopen($localFilePath, 'w+');

        // 8 mb in one go
        $length = 8 * 1024;

        while (!feof($handle)) {
            fwrite($localHandle, fread($handle, $length));
        }

        fclose($handle);
        fclose($localHandle);

        return true;
    }

    /**
     * @param string $url
     * @param string $postData
     * @return string
     */
    public function postXML(string $url, string $postData = ''): string
    {
        $context = [
            'http' => [
                'method'  => 'POST',
                'header' => $this->getAuthHeader()
                    . "\r\n" . 'Content-Type: application/xml'
                    . "\r\n" . 'Accept: application/xml'
                    . "\r\n" . 'User-Agent: Tradebyte-SDK',
                'content' => $postData,
                'ignore_errors' => true,
                'time_out' => 3600,
            ]
        ];

        $response =  file_get_contents($this->getCreatedURI($url, []), false, stream_context_create($context));
        $statusLine = $http_response_header[0];

        if (!in_array($this->getStatusCode($statusLine), [200, 201, 204])) {
            throw new \RuntimeException($statusLine . ' / ' . $response);
        }

        return $response;
    }

    /**
     * @param string  $url
     * @param mixed[] $filter
     * @return XMLReader
     */
    public function getXML(string $url, array $filter = []): XMLReader
    {
        libxml_set_streams_context(stream_context_create([
            'http' => [
                'header' => $this->getAuthHeader()
                    . "\r\n" . 'Accept: application/xml'
                    . "\r\n" . 'User-Agent: Tradebyte-SDK',
                'ignore_errors' => true,
                'time_out' => 3600,
            ]
        ]));

        $reader = new XMLReader();
        $reader->open($this->getCreatedURI($url, $filter));
        $statusLine = $http_response_header[0];

        if ($this->getStatusCode($statusLine) !== 200) {
            throw new \RuntimeException('unexpected response status: ' . $statusLine);
        }

        return $reader;
    }
}
