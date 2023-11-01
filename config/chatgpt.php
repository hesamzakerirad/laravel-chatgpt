<?php 

return [
    'api_key' => env('CHATGPT_API_KEY', null), 
    'api_base_uri' => 'https://api.openai.com/v1/',
    'model' => 'gpt-3.5-turbo',
];