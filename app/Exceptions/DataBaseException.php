<?php

namespace App\Exceptions;

class DataBaseException extends \Exception
{
    public $statusCode;

    public function __construct($message, $statusCode = 500)
    {
        parent::__construct($message);
        $this->statusCode = $statusCode;
    }
}
