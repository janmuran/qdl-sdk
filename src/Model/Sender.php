<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Model;

final class Sender
{
    private int $id;
    private int $type;
    private string $name;
    private string $street;
    private string $zip;
    private string $city;
    private string $country;

    public function __construct(
        int $id,
        int $type,
        string $name,
        string $street,
        string $zip,
        string $city,
        string $country
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->street = $street;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
    }

    public static function createForDefaultSender(int $id): self
    {
        return new self(
            1,
            0,
            '',
            '',
            '',
            '',
            ''
        );
    }

    public static function createNoSender(): self
    {
        return new self(
            0,
            2,
            '',
            '',
            '',
            '',
            ''
        );
    }

    public static function createSender(
        string $name,
        string $street,
        string $zip,
        string $city,
        string $country
    ): self {
        return new self(
            0,
            1,
            $name,
            $street,
            $zip,
            $city,
            $country,
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'label' => [
                'name' => $this->name,
                'street' => $this->street,
                'zip' => $this->zip,
                'city' => $this->city,
                'country' => $this->country,
            ],
        ];
    }
}
