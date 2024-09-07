<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Response;

use JMS\Serializer\Annotation as Serializer;

final class ShipmentsResponse
{
    /**
     * @var array<string, mixed>
     * @Serializer\SerializedName("shipmentNumbers")
     * @Serializer\Type("array<string, array<int, array<string, array<string>>>>")
     */
    private array $shipments;

    /**
     * @var array<string, mixed>
     * @Serializer\SerializedName("shipmentNumbersByRef")
     * @Serializer\Type("array<string, array<int, array<string, array<string>>>>")
     */
    private array $shipmentNumbersByRef;

    /**
     * @return array<string, mixed>
     */
    public function getShipments(): array
    {
        return $this->shipments;
    }

    public function getShipmentNumbersByRef(): array
    {
        return $this->shipmentNumbersByRef;
    }
}
