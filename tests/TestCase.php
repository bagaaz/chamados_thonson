<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();

        $this->user = User::find(1);
        $this->actingAs($this->user);
    }
}
