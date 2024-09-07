<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Model;

final class Services
{
    private bool $g24;
    private bool $t12;
    private bool $sms;
    private bool $call;
    private bool $documentsBack;
    private string $infoAboutDelivery;

    public function __construct(
        bool $g24,
        bool $t12,
        bool $sms,
        bool $call,
        bool $documentsBack,
        string $infoAboutDelivery
    ) {
        $this->g24 = $g24;
        $this->t12 = $t12;
        $this->sms = $sms;
        $this->call = $call;
        $this->documentsBack = $documentsBack;
        $this->infoAboutDelivery = $infoAboutDelivery;
    }

    public function getG24(): bool
    {
        return $this->g24;
    }

    public function getT12(): bool
    {
        return $this->t12;
    }

    public function getSms(): bool
    {
        return $this->sms;
    }

    public function getCall(): bool
    {
        return $this->call;
    }

    public function getDocumentsBack(): bool
    {
        return $this->documentsBack;
    }

    public function getInfoAboutDelivery(): string
    {
        return $this->infoAboutDelivery;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'g24' => $this->g24,
            't12' => $this->t12,
            'sms' => $this->sms,
            'call' => $this->call,
            'documentsBack' => $this->documentsBack,
            'infoAboutDelivery' => $this->infoAboutDelivery,
        ];
    }
}
