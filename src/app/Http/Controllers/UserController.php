<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function info(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|string',
        ]);

        $data = $this->userService->getUserData($validated['user_id']);

        return response()->json($data);
    }
}
