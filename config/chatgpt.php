<?php 

return [
    'api_key' => env('CHATGPT_API_KEY', null), 
    'api_base_uri' => 'https://api.openai.com/v1/',
    'request_headers' => [
        'Authorization' => 'Bearer ' . config('chatgpt.api_key'),
        'Content-Type' => 'application/json',
    ],
];