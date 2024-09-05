<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Client;

use GuzzleHttp\Client as GuzzleClient;
use Janmuran\QdlSdk\Config\Config;

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
}
