<?php

namespace app\services\exceptions;

class AuthException extends \Exception 
{
    public function __construct($message)
    {        
        parent::__construct($message);
    }
}