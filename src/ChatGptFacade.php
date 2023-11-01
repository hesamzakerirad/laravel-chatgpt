<?php

namespace HesamRad\LaravelChatGpt;

use Illuminate\Support\Facades\Facade;

class ChatGptFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'chatgpt';
    }
}
