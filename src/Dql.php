<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk;

use Janmuran\ObjectBuilder\ResponseBuilder;
use Janmuran\QdlSdk\Client\Client;
use Janmuran\QdlSdk\Model\Shipments;
use Janmuran\QdlSdk\Response\Label;
use Janmuran\QdlSdk\Response\ShipmentProtocol;
use Janmuran\QdlSdk\Response\ShipmentsResponse;
use RuntimeException;

final class Dql
{
    private const SHIPMENTS_ENDPOINT = '/myq-api/shipment/create-shipment';
    private const LABEL_PRINT_ENDPOINT = '/myq-api/shipment/get-label';

    private const SHIPMENT_PROTOCOL = '/myq-api/shipment/protocol';
    private const SHIPMENT_STORNO_ENDPOINT = '/myq-api/shipment/storno';

    private const PICKUP_REQUEST_ENDPOINT = '/myq-api/shipping/request-pickup';
    private const SHIPMENT_HISTORY_ENDPOINT = '/myq-api/shipment/status-history';

    private Client $client;
    private ResponseBuilder $responseBuilder;

    public function __construct(Client $client, ResponseBuilder $responseBuilder)
    {
        $this->client = $client;
        $this->responseBuilder = $responseBuilder;
    }

    public function sendShipments(Shipments $shipments): ShipmentsResponse
    {
        $response = $this->client->post(self::SHIPMENTS_ENDPOINT, $shipments->toArray());

        return $this->responseBuilder->createObjectFromResponse($response, ShipmentsResponse::class);
    }

    /**
     * @param array<string> $shipmentNumbers
     */
    public function getLabelForShipments(
        array $shipmentNumbers,
        string $type = 'ZPL',
        int $position = 1
    ): Label {
        $response = $this->client->post(self::LABEL_PRINT_ENDPOINT, [
            'shipment' => $shipmentNumbers,
            'type' => $type,
            'position' => $position,
        ]);

        return $this->responseBuilder->createObjectFromResponse($response, Label::class);
    }

    /**
     * @param array<string> $shipmentNumbers
     */
    public function getShipmentProtocol(array $shipmentNumbers): ShipmentProtocol
    {
        $response = $this->client->post(self::SHIPMENT_PROTOCOL, [
            'shipments' => $shipmentNumbers,
        ]);

        return $this->responseBuilder->createObjectFromResponse($response, ShipmentProtocol::class);
    }

    public function storno(string $shipmentNumber): void
    {
        $response = $this->client->post(self::SHIPMENT_STORNO_ENDPOINT, [
            'shipmentNumber' => $shipmentNumber,
        ]);

        if ($response->getStatusCode() === 200) {
            return;
        }

        throw new RuntimeException('Storno failed');
    }

    public function createPickupRequest(): void
    {
        $this->client->post(self::PICKUP_REQUEST_ENDPOINT, []);
    }

    /**
     * @param array<string> $shipmentNumbers
     * @return array<mixed>
     */
    public function getShipmentHistory(array $shipmentNumbers): array
    {
        $response = $this->client->post(self::SHIPMENT_HISTORY_ENDPOINT, [
            'shipments' => $shipmentNumbers,
        ]);

        /** @var array<mixed>|null $data */
        $data = json_decode($response->getBody()->getContents());
        if($data === null){
            throw new RuntimeException('Invalid JSON data');
        }

        return $data;
    }
}