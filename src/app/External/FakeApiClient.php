<?php

namespace App\External;

class FakeApiClient implements ExternalApiInterface
{
    public function fetchUserInfo(string $userId): array
    {
        return [
            'id' => $userId,
            'name' => 'Fake User',
            'email' => 'fake@example.com',
        ];
    }
}
