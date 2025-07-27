<?php

namespace App\Services;

use App\External\ExternalApiInterface;

class UserService
{
    private ExternalApiInterface $externalApi;

    public function __construct(ExternalApiInterface $externalApi)
    {
        $this->externalApi = $externalApi;
    }

    public function getUserData(string $userId): array
    {
        return $this->externalApi->fetchUserInfo($userId);
    }
}
