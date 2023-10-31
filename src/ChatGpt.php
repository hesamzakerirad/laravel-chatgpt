<?php

namespace HesamRad\LaravelChatGpt;

use GuzzleHttp\Client;

class ChatGpt
{
    protected string $apiKey;
    protected $httpClient;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;

        $this->httpClient = new Client([
            'base_uri' => config('chatgpt.api_base_url'),
            'headers' => config('chatgpt.request_headers')
        ]);
    }

    /**
     * Ask ChatGpt whatever you want!
     *
     * @param  string  $something
     * @return string
     */
    public function ask($something)
    {
        $response = $this->httpClient
            ->post('chat/completions', [
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are'],
                        ['role' => 'user', 'content' => $something],
                    ],
                ],
            ]);

        return json_decode($response->getBody(), true);
    }
}
