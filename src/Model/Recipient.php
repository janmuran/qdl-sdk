<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Model;

final class Recipient
{
    private string $name;
    private string $street;
    private string $zip;
    private string $city;
    private string $country;
    private string $phone;
    private string $mail;
    private string $contactPerson;

    public function __construct(
        string $name,
        string $street,
        string $zip,
        string $city,
        string $country,
        string $phone,
        string $mail,
        string $contactPerson
    ) {
        $this->name = $name;
        $this->street = $street;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->contactPerson = $contactPerson;
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
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'street' => $this->street,
            'zip' => $this->zip,
            'city' => $this->city,
            'country' => $this->country,
            'phone' => $this->phone,
            'mail' => $this->mail,
            'contactPerson' => $this->contactPerson,
        ];
    }
}
