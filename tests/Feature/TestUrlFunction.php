<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestUrlFunction extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $expected = url('/admin/user/rider/list');
        $actual = 'http://localhost:8080/admin/user/rider/list';
        $this->assertEquals($expected, $actual);
    }
}
