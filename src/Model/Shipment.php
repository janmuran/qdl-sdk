<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Model;

class Shipment
{
    private string $clientReference;
    private string $pickupdate;
    private float $cod = 0.0;
    private ?string $codVarSym;
    private string $codIban = '';
    private string $note = '';
    private Sender $sender;
    private Recipient $recipient;
    private Insurance $insurance;
    private Services $services;
    /**
     * @var array<Item>
     */
    private array $items = [];

    public function __construct(string $clientReference, string $pickupdate, float $cod, ?string $codVarSym, string $codIban, string $note, Sender $sender, Recipient $recipient, Insurance $insurance, Services $services, array $items)
    {
        $this->clientReference = $clientReference;
        $this->pickupdate = $pickupdate;
        $this->cod = $cod;
        $this->codVarSym = $codVarSym;
        $this->codIban = $codIban;
        $this->note = $note;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->insurance = $insurance;
        $this->services = $services;
        $this->items = $items;
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return [
            'clientReference' => $this->clientReference,
            'pickupdate' => $this->pickupdate,
            'cod' => $this->cod,
            'codVarSym' => $this->codVarSym,
            'codIban' => $this->codIban,
            'note' => $this->note,
            'sender' => $this->sender->toArray(),
            'recipient' => $this->recipient->toArray(),
            'insurance' => $this->insurance->toArray(),
            'services' => $this->services->toArray(),
            'items' => array_map(
                static fn(Item $item): array => $item->toArray(),
                $this->items
            ),
        ];
    }
}
