<?php

use HesamRad\LaravelChatGpt\ChatGptFacade as ChatGpt;

if (! function_exists('chatgpt')) {
    /**
     * Ask ChatGpt something that is on your 
     * mind.
     *
     * @param  string  $question
     * @return string
     */
    function chatgpt($question)
    {
        return ChatGpt::ask($question);
    }
}