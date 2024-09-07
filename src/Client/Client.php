<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use Janmuran\QdlSdk\Config\Config;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class Client
{
    protected GuzzleClient $client;

    public function __construct(Config $config)
    {
        $this->client = new GuzzleClient([
            'base_uri' => $config->getBaseUri(),
            'auth' => [$config->getLogin(), $config->getPassword()]
        ]);
    }

    public function get(string $url): ResponseInterface
    {
        return $this->sendRequest('GET', $url);
    }

    /**
     * @param array<mixed> $data
     */
    public function post(string $url, array $data): ResponseInterface
    {
        return $this->sendRequest('POST', $url, $data);
    }

    /**
     * @param array<mixed>|null $data
     */
    private function sendRequest(string $method, string $url, $data = null): ResponseInterface
    {
        $options = [];
        if ($data !== null) {
            $options[RequestOptions::JSON] = $data;
        }

        return $this->client->request($method, $url, $options);
    }
}
