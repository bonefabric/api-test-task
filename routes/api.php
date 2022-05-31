<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\DDD\User\Actions\AuthenticateAction;
use App\Http\Controllers\Api\V1\DDD\User\Actions\ChangeSettingsAction;
use App\Http\Controllers\Api\V1\DDD\User\Actions\RegisterAction;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {

    Route::post('/register', RegisterAction::class);
    Route::post('/authenticate', AuthenticateAction::class);

    Route::group(['middleware' => 'auth:sanctum'], function () {

        Route::put('/change-settings', ChangeSettingsAction::class);

    });
});
