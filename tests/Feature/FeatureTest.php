<?php

namespace HesamRad\LaravelChatGpt\Tests\Feature;

use HesamRad\LaravelChatGpt\Tests\TestCase;

class FeatureTest extends TestCase
{
    public function test_package_throws_exception_without_api_key()
    {
        $this->expectException(\HesamRad\LaravelChatGpt\Exceptions\InvalidApiKey::class);

        $this->app['config']->set('chatgpt.api_key', null);
        $this->app['config']->set('chatgpt.openai_base_uri', 'https://api.openai.com/v1/');
        $this->app['config']->set('chatgpt.model', 'gpt-3.5-turbo');

        $chatgpt = $this->app->get('chatgpt');
        $chatgpt->ask('can you hear me?');
    }

    public function test_package_fails_to_connect_to_chatgpt_with_invalid_api_key()
    {
        $this->expectException(\GuzzleHttp\Exception\ClientException::class);

        $this->app['config']->set('chatgpt.api_key', 'invalid-api-key');
        $this->app['config']->set('chatgpt.openai_base_uri', 'https://api.openai.com/v1/');
        $this->app['config']->set('chatgpt.model', 'gpt-3.5-turbo');

        $chatgpt = $this->app->get('chatgpt');
        $chatgpt->ask('can you hear me?');
    }

    public function test_package_fails_to_talk_to_chatgpt_without_a_question()
    {
        $this->expectException(\ArgumentCountError::class);

        $this->app['config']->set('chatgpt.api_key', 'invalid-api-key');
        $this->app['config']->set('chatgpt.openai_base_uri', 'https://api.openai.com/v1/');
        $this->app['config']->set('chatgpt.model', 'gpt-3.5-turbo');

        $chatgpt = $this->app->get('chatgpt');
        $chatgpt->ask();
    }

    public function test_package_fails_to_talk_to_chatgpt_with_invalid_question()
    {
        $this->expectException(\HesamRad\LaravelChatGpt\Exceptions\InvalidQuestion::class);

        $this->app['config']->set('chatgpt.api_key', 'invalid-api-key');
        $this->app['config']->set('chatgpt.openai_base_uri', 'https://api.openai.com/v1/');
        $this->app['config']->set('chatgpt.model', 'gpt-3.5-turbo');

        $chatgpt = $this->app->get('chatgpt');
        $chatgpt->ask(' ');
    }
}