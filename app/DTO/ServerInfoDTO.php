<?php

namespace App\DTO;

use JsonSerializable;

// Убрали readonly перед class
class ServerInfoDTO implements JsonSerializable
{
    // Добавили readonly перед каждым полем
    public function __construct(
        public readonly string $php_version,
        public readonly string $sapi_name,
        public readonly string $os_name
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'php_version' => $this->php_version,
            'sapi_name'   => $this->sapi_name,
            'os_name'     => $this->os_name,
        ];
    }
}