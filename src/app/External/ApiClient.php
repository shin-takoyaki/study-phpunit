<?php

namespace App\External;

use Illuminate\Support\Facades\Http;

class ApiClient implements ExternalApiInterface
{
    public function fetchUserInfo(string $userId): array
    {
        $response = Http::get("https://external.api/users/{$userId}");
        return $response->json();
    }
}
