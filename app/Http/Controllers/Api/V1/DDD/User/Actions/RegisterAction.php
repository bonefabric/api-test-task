<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\DDD\User\Actions;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\DDD\User\Jobs\SendWelcomeEmail;
use App\Http\Controllers\Api\V1\DDD\User\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterAction extends ApiController
{
    /**
     * @param RegisterRequest $registerRequest
     * @return bool
     */
    public function __invoke(RegisterRequest $registerRequest)
    {
        $data = $registerRequest->validated();
        $this->dispatch(new SendWelcomeEmail($user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ])));
        return $user->email;
    }
}
