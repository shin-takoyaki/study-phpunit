<?php

namespace App\External;

interface ExternalApiInterface
{
    public function fetchUserInfo(string $userId): array;
}
