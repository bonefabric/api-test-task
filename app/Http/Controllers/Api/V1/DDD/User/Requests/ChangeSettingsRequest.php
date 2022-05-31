<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\DDD\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeSettingsRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'language' => 'string|size:2',
            'timezone' => 'int|between:-12,12',
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
