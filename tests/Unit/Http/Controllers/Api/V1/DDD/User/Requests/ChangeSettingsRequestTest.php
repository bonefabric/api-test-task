<?php

declare(strict_types=1);

namespace Http\Controllers\Api\V1\DDD\User\Requests;

use App\Http\Controllers\Api\V1\DDD\User\Requests\ChangeSettingsRequest;
use PHPUnit\Framework\TestCase;

class ChangeSettingsRequestTest extends TestCase
{

    /**
     * @var ChangeSettingsRequest
     */
    private ChangeSettingsRequest $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new ChangeSettingsRequest();
    }

    /**
     * @return void
     */
    public function testRules(): void
    {
        $this->assertEquals([
            'language' => 'string|size:2',
            'timezone' => 'int|between:-12,12',
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
