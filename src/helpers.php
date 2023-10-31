<?php

use HesamRad\LaravelChatGpt\ChatGpt;

if (! function_exists('gpt')) {
    /**
     * Ask ChatGpt something that is on your 
     * mind.
     *
     * @param  string  $question
     * @return string
     */
    function gpt($question)
    {
        $chatgpt = new ChatGpt(config('chatgpt.api_key'));

        return $chatgpt->ask($question);
    }
}