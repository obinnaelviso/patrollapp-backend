<?php

namespace App\Http\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TokenService
{
    protected $userRepo;
    public function generateLoginToken(array $data): array
    {
        $user = User::where('username', $data['username'])->first();
        if (!$user || !$user->is_guard || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($data['device_name'])->plainTextToken;
        return [
            'user' => new UserResource($user),
            'token' => $token
        ];
    }

    public function revokeAllToken(): void
    {
        auth()->user()->tokens()->delete();
    }
}