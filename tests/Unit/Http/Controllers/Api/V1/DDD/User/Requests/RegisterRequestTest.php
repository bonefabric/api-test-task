<?php

declare(strict_types=1);

namespace Http\Controllers\Api\V1\DDD\User\Requests;

use App\Http\Controllers\Api\V1\DDD\User\Requests\RegisterRequest;
use PHPUnit\Framework\TestCase;

class RegisterRequestTest extends TestCase
{

    /**
     * @var RegisterRequest
     */
    private RegisterRequest $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new RegisterRequest();
    }

    /**
     * @return void
     */
    public function testRules(): void
    {
        $this->assertEquals([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:100|confirmed',
        ], $this->object->rules());
    }

    /**
     * @return void
     */
    public function testAuthorize(): void
    {
        $this->assertTrue($this->object->authorize());
    }
}
