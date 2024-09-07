<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Model;

final class Item
{
    private float $weight;
    private string $clientReference;

    public function __construct(float $weight, string $clientReference)
    {
        $this->weight = $weight;
        $this->clientReference = $clientReference;
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return [
            'weight' => $this->weight,
            'clientReference' => $this->clientReference,
        ];
    }
}
