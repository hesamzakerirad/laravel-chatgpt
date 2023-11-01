<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | This is the api key obtained from OpenAI website. This cannot be null, 
    | otherwise you won't be able to talk to ChatGPT.
    |
    */
    'api_key' => env('CHATGPT_API_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | OpenAI Base URI
    |--------------------------------------------------------------------------
    |
    | This is the address we will be using to call ChatGPT.
    |
    */
    'openai_base_uri' => 'https://api.openai.com/v1/',

    /*
    |--------------------------------------------------------------------------
    | ChatGPT Model
    |--------------------------------------------------------------------------
    |
    | This is the version of ChatGPT we are going to use.
    |
    */
    'model' => 'gpt-3.5-turbo',

    /*
    |--------------------------------------------------------------------------
    | Internal API Route
    |--------------------------------------------------------------------------
    |
    | This is the route, that our front-end clients could use to talk to ChatGPT. 
    | You can change it however you wish; but don't leave it empty 
    | or all hell breaks loose!
    |
    */
    'internal_api_route' => '/api/chatgpt/ask'
];
