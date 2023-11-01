<?php

use HesamRad\LaravelChatGpt\ChatGpt;

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
        $chatgpt = new ChatGpt(config('chatgpt.api_key'));

        return $chatgpt->ask($question);
    }
}