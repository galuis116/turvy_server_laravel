<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class GetFromEmailFromAppConfig extends TestCase
{
    /**
     * test `from` email address is register@turvy.net
     *
     * @return void
     */
    public function test()
    {
        $expected = config('mail.staff.address');
        Log::info(">>> From email address:".$expected);
        $actual = 'register@turvy.net';
        $this->assertEquals($expected, $actual);
    }
}
