<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Model;

final class Insurance
{
    private bool $enabled;
    private float $shipmentValue;

    public function __construct(bool $enabled, float $shipmentValue)
    {
        $this->enabled = $enabled;
        $this->shipmentValue = $shipmentValue;
    }

    public static function createNoInsurance(): self
    {
        return new self(false, 0.0);
    }

    public static function createInsurance(float $shipmentValue): self
    {
        return new self(true, $shipmentValue);
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function getShipmentValue(): float
    {
        return $this->shipmentValue;
    }

    public function toArray(): array
    {
        return [
            'enabled' => $this->enabled,
            'shipmentValue' => $this->shipmentValue,
        ];
    }
}
