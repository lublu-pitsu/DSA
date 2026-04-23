<?php

namespace App\DTO;

use JsonSerializable;

class DatabaseInfoDTO implements JsonSerializable
{
    public function __construct(
        public readonly string $driver,
        public readonly string $version,
        public readonly string $database_name
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'driver'        => $this->driver,
            'version'       => $this->version,
            'database_name' => $this->database_name,
        ];
    }
}