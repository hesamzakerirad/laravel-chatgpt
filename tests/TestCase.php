<?php

namespace HesamRad\LaravelChatGpt\Tests;

use HesamRad\LaravelChatGpt\ChatGpt;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * Setting up our testcase.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        // Binding the main class to the application
        $this->app->singleton('chatgpt', function () {
            return new ChatGpt($this->app['config']->get('chatgpt.api_key'));
        });
    }
}
