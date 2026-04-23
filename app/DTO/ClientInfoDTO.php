<?php

namespace App\DTO;

use JsonSerializable;

class ClientInfoDTO implements JsonSerializable
{
    public function __construct(
        public readonly string $ip_address,
        public readonly string $user_agent
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
        ];
    }
}