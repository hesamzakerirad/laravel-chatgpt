<?php

namespace HesamRad\LaravelChatGpt;

use GuzzleHttp\Client;
use HesamRad\LaravelChatGpt\Exceptions\InvalidApiKey;
use HesamRad\LaravelChatGpt\Exceptions\InvalidQuestion;

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

    /**
     * Create a new instance of ChatGpt to ask a question
     * from.
     * 
     * @param  string  $apiKey
     * @return void
     */
    public function __construct($apiKey)
    {
        if (is_null($apiKey)) {
            throw new InvalidApiKey;
        }

        $this->apiKey = $apiKey;

        $this->httpClient = new Client([
            'base_uri' => config('chatgpt.openai_base_uri'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('chatgpt.api_key'),
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    /**
     * Ask ChatGpt whatever you want!
     *
     * @param  string  $question
     * @return string
     */
    public function ask($question)
    {
        $question = trim($question);

        if (empty($question)) {
            throw new InvalidQuestion;
        }

        $response = $this->httpClient
            ->post('chat/completions', [
                'json' => [
                    'model' => config('chatgpt.model'),
                    'messages' => [
                        ['role' => 'user', 'content' => $question],
                    ],
                ],
            ]);

        return json_decode($response->getBody(), true)['choices'][0]['message']['content'];
    }
}
