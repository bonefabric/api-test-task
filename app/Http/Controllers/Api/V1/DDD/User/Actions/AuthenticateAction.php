<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\DDD\User\Actions;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\DDD\User\Requests\AuthenticateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticateAction extends ApiController
{

    /**
     * @param AuthenticateRequest $authenticateRequest
     * @return Application|Response|ResponseFactory
     */
    public function __invoke(AuthenticateRequest $authenticateRequest)
    {
        if (!Auth::attempt($authenticateRequest->validated())) {
            return response(['error' => 'Not authorized'],403);
        }
        $user = Auth::user();

        $user->tokens()->where('name', 'default')->delete();

        return response(['token' => $user->createToken('default')->plainTextToken]);
    }
}
