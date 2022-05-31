<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\DDD\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|max:100',
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
