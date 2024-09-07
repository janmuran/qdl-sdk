<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Response;

use RuntimeException;

class ShipmentProtocol
{
    private string $pdf;

    public function __construct(string $pdf)
    {
        $this->pdf = $pdf;
    }

    public function getPdf(): string
    {
        return $this->pdf;
    }

    public function setPdf(string $pdf): void
    {
        $this->pdf = $pdf;
    }

    public function getContent(): string
    {
        /** @var string|false $content */
        $content = base64_decode($this->pdf);
        if ($content === false) {
            throw new RuntimeException('Invalid JSON pdf');
        }

        return $content;
    }
}
