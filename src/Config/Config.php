<?php

declare(strict_types=1);

namespace Janmuran\QdlSdk\Config;

final class Config
{
    private string $login;
    private string $password;
    private string $baseUri;

    public function __construct(string $login, string $password, string $baseUri)
    {
        $this->login = $login;
        $this->password = $password;
        $this->baseUri = $baseUri;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }
}
