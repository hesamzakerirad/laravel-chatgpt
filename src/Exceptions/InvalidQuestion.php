<?php 

namespace HesamRad\LaravelChatGpt\Exceptions;

class InvalidQuestion extends \Exception
{
    /**
     * Create a new instance of this class.
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Invalid question! You need to ask a valid question.');
    }
}