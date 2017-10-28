<?php

namespace Tests;

use App\Models\Main\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TenantTestCase extends TestCase
{
    use RefreshDatabase;

    /**
     * @var User
     */
    protected $user;

    protected function setUp()
    {
        parent::setUp();

        $this->actingAs($this->user = create(User::class));
    }
}
