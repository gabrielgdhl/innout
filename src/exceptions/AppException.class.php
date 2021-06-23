<?php

class AppException extends Exception{
    
    /**
     * Método reposável por criar Exceptions personalizadas para o sistema
     *
     * @param string $message
     * @param integer $code
     * @param string $previous
     */
    public function __construct($message, $code = 0, $previous = null){
        parent::__construct($message, $code, $previous);
    }
}