<?php

declare(strict_types=1);

namespace Http\Controllers\Api\V1\DDD\User\Mail;

use App\Http\Controllers\Api\V1\DDD\User\Mail\UserWelcome;
use PHPUnit\Framework\TestCase;

class UserWelcomeTest extends TestCase
{

    /**
     * @var UserWelcome
     */
    private UserWelcome $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new UserWelcome();
    }

    /**
     * @return void
     */
    public function testBuild(): void
    {
        $this->assertInstanceOf(UserWelcome::class, $this->object->build());
    }
}
