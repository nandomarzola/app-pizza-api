<?php

namespace App\Exceptions;

use Exception;

class ExceptionHandler extends Exception
{
    /**
     * ExceptionHandler constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct(
        $message = '',
        $code = 500
    ) {
        parent::__construct($message, $code);
    }
}
