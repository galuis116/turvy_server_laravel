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
    public function test_equals_email_address()
    {
        $expected = App::config('mail.from.address');
        Log::info(">>> From email address:".$expected);
        $actual = 'register@turvy.net';
        $this->assertEquals($expected, $actual);
    }
}
