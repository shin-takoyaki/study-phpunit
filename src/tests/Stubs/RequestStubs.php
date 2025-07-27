<?php

namespace Tests\Stubs;

class RequestStubs
{
    public static function validUserRequest(): array
    {
        return ['user_id' => '123'];
    }

    public static function invalidUserRequest(): array
    {
        return ['user_id' => null];
    }
}
