<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk;

use Janmuran\QdlSdk\Client\Client;

final class Dql
{

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function sendShipment(array $data): string
    {
        $response = $this->client->post('shipment', $data);

        return $response->getBody()->getContents();
    }

}