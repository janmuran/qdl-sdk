<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Model;

final class Shipments
{
    /**
     * @var array<Shipment>
     */
    private array $shipments;

    /**
     * @param array<Shipment> $shipments
     */
    public function __construct(array $shipments = [])
    {
        $this->shipments = $shipments;
    }

    /**
     * @return array<Shipment>
     */
    public function getShipments(): array
    {
        return $this->shipments;
    }

    public function addShipment(Shipment $shipment): void
    {
        $this->shipments[] = $shipment;
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        $result['shipments'] = array_map(
            static fn(Shipment $shipment): array => $shipment->toArray(),
            $this->shipments
        );

        return $result;
    }
}
