<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\DDD\User\Jobs;

use App\Http\Controllers\Api\V1\DDD\User\Mail\UserWelcome;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var User
     */
    protected User $user;

    /**
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->queue(new UserWelcome());
    }
}
