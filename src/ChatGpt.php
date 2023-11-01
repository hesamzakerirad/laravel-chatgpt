<?php

namespace HesamRad\LaravelChatGpt;

use GuzzleHttp\Client;

class ChatGpt
{
    /**
     * The API key used to connect to openai 
     * servers and communicate with ChatGPT.
     *
     * @link https://platform.openai.com/account/api-keys
     * @var string
     */
    protected string $apiKey;

    /**
     * The HTTP client used to send requests
     * to ChatGPT servers.
     *
     * @var mixed
     */
    protected $httpClient;

    public function __construct($apiKey)
    /**
     * Create a new instance of ChatGpt to ask a question
     * from.
     * 
     * @param  string  $apiKey
     * @return void
     */
    {
        $this->apiKey = $apiKey;

        $this->httpClient = new Client([
            'headers' => config('chatgpt.request_headers')
            'base_uri' => config('chatgpt.api_base_uri'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('chatgpt.api_key'),
                'Content-Type' => 'application/json',
            ]
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
                    'model' => config('chatgpt.model'),
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are'],
                        ['role' => 'user', 'content' => $something],
                    ],
                ],
            ]);

        return json_decode($response->getBody(), true);
    }
}
