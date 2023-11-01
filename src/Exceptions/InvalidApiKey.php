<?php 

namespace HesamRad\LaravelChatGpt\Exceptions;

class InvalidApiKey extends \Exception
{
    /**
     * Create a new instance of this class.
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            'Invalid API key! Please make sure you have the right API key from https://platform.openai.com/account/api-keys'
        );
    }
}