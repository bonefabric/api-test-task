<?php

declare(strict_types=1);

namespace Http\Controllers\Api\V1\DDD\User\Jobs;

use App\Http\Controllers\Api\V1\DDD\User\Jobs\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class SendWelcomeEmailTest extends TestCase
{

    /**
     * @var SendWelcomeEmail
     */
    private SendWelcomeEmail $object;

    /**
     * @var User
     */
    private User $userStub;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->userStub = $this->createStub(User::class);
        $this->object = new SendWelcomeEmail($this->userStub);
    }

    /**
     * @return void
     */
    public function testHandle(): void
    {
        /** @var MockObject $PendingMailStub */
        $PendingMailStub = $this->createStub(PendingMail::class);

        Mail::shouldReceive('to')
            ->once()
            ->with($this->userStub)
            ->andReturn($PendingMailStub);

        $PendingMailStub->expects($this->once())
            ->method('queue');

        $this->object->handle();
    }
}
