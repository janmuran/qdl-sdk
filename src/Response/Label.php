<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Response;

use RuntimeException;

final class Label
{
    private string $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }

    public function getLabelPdfContent(): string
    {
        /** @var string|false $content */
        $content = base64_decode($this->data);
        if ($content === false) {
            throw new RuntimeException('Invalid JSON data');
        }

        return $content;
    }
}
