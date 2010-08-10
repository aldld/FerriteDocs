<?php

namespace ferrite\config\exceptions;

class ConfigKeyNotFoundException extends \Exception
{
    public function __construct($message=null, $code=0, Exception $previous = null) {
        // Set the default message if none is supplied
        if (!$message)
            $message = 'Configuration key not found';
        
        // Call the parent Exception constructor
        parent::__construct($message, $code, $previous);
    }
}
