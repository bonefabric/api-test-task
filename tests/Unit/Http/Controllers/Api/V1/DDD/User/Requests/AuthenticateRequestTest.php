<?php

declare(strict_types=1);

namespace Http\Controllers\Api\V1\DDD\User\Requests;

use App\Http\Controllers\Api\V1\DDD\User\Requests\AuthenticateRequest;
use PHPUnit\Framework\TestCase;

class AuthenticateRequestTest extends TestCase
{

    /**
     * @var AuthenticateRequest
     */
    private AuthenticateRequest $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new AuthenticateRequest();
    }

    /**
     * @return void
     */
    public function testRules(): void
    {
        $this->assertEquals([
            'email' => 'required|email',
            'password' => 'required|min:6|max:100',
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
