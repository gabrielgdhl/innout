<?php

class ValidationException extends Exception{
    
    /**
     * Array de erros de validação
     *
     * @var array
     */
    private $errors = [];

    /**
     * Método reponsavél por inserir os erros de validação
     *
     * @param array $erros
     * @param string $message
     * @param integer $code
     * @param [type] $previous
     */
    public function __construct($errors = [], $message = "Erros de validação!", $code = 0, $previous = null){
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    /**
     * Método para retornar um array de erros personalizados
     *
     * @return Array errors
     */
    public function getErrors(){
        return $this->errors;
    }

    /**
     * Método para retornar errors específicos
     *
     * @param string $att
     * @return void
     */
    public function get($att){
        return $this->errors[$att];
    }
}