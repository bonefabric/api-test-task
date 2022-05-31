<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\DDD\User\Actions;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\DDD\User\Requests\ChangeSettingsRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ChangeSettingsAction extends ApiController
{
    /**
     * @param ChangeSettingsRequest $changeSettingsRequest
     * @return Application|ResponseFactory|Response
     */
    public function __invoke(ChangeSettingsRequest $changeSettingsRequest)
    {
        $data = $changeSettingsRequest->validated();

        if (empty($data)) {
            return response(null, 204);
        }

        Auth::user()->update($data);

        return response(['success' => true]);
    }
}
