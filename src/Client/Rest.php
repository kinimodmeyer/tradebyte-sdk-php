<?php

declare(strict_types=1);

namespace Tradebyte\Client;

use XMLReader;

class Rest
{
    private ?int $accountNumber = null;

    private ?string $accountUser = null;

    private ?string $accountPassword = null;

    private string $baseURL = 'https://rest.trade-server.net';

    private string $userAgent = 'Tradebyte-SDK-PHP';

    public function setAccountNumber(int $number): void
    {
        $this->accountNumber = $number;
    }

    public function setAccountUser(string $user): void
    {
        $this->accountUser = $user;
    }

    public function setAccountPassword(string $password): void
    {
        $this->accountPassword = $password;
    }

    public function setBaseURL(string $baseURL): void
    {
        $this->baseURL = $baseURL;
    }

    private function getAuthHeader(): string
    {
        $auth = base64_encode($this->accountUser . ':' . $this->accountPassword);
        return 'Authorization: Basic ' . $auth;
    }

    private function getCreatedURI(string $url, array $filter = []): string
    {
        $uri = $this->baseURL . '/' . $this->accountNumber . '/' . $url;

        if (!empty($filter)) {
            $uri .= '?' . http_build_query($filter);
        }

        return $uri;
    }

    private function getStatusCode(string $statusLine): int
    {
        preg_match('{HTTP\/\S*\s(\d{3})}', $statusLine, $match);
        return (int)$match[1];
    }

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
        $response = (string)curl_exec($curl);
        fclose($localHandle);
        curl_close($curl);

        return $response;
    }

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
        $response = (string)curl_exec($curl);
        fclose($localHandle);
        curl_close($curl);

        return $response;
    }

    public function downloadFile(string $localFilePath, string $url, array $filter = []): bool
    {
        $context = [
            'http' => [
                'header' => $this->getAuthHeader()
                    . "\r\n" . 'User-Agent: ' . $this->userAgent,
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

    public function fileGetContents(string $filename, bool $useIncludePath, array $contextArray): array
    {
        $content = file_get_contents($filename, $useIncludePath, stream_context_create($contextArray));

        return [
            'content' => $content,
            'status_line' =>  $http_response_header[0]
        ];
    }

    public function postXML(string $url, string $postData = ''): string
    {
        $context = [
            'http' => [
                'method'  => 'POST',
                'header' => $this->getAuthHeader()
                    . "\r\n" . 'Content-Type: application/xml'
                    . "\r\n" . 'Accept: application/xml'
                    . "\r\n" . 'User-Agent: ' . $this->userAgent,
                'content' => $postData,
                'ignore_errors' => true,
                'time_out' => 3600,
            ]
        ];

        $response = $this->fileGetContents($this->getCreatedURI($url, []), false, $context);
        $content = $response['content'];
        $statusLine = $response['status_line'];

        if (!in_array($this->getStatusCode($statusLine), [200, 201, 204])) {
            throw new \RuntimeException($statusLine . ' / ' . $content);
        }

        return $content;
    }

    public function getXML(string $url, array $filter = []): XMLReader
    {
        libxml_set_streams_context(stream_context_create([
            'http' => [
                'header' => $this->getAuthHeader()
                    . "\r\n" . 'Accept: application/xml'
                    . "\r\n" . 'User-Agent: ' . $this->userAgent,
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
