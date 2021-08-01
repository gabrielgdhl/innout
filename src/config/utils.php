<?php

/**
 * Método responsável por inserir as mensagens de sucesso
 *
 * @param string $msg
 * @return void
 */
function addSuccessMessage($msg){
    $_SESSION['message'] = [
        'type'    => 'success',
        'message' => $msg
    ];
}

/**
 * Método responsável por inserir as mensagens de erro
 *
 * @param string $msg
 * @return void
 */
function addErrorMessage($msg){
    $_SESSION['message'] = [
        'type'    => 'error',
        'message' => $msg
    ];
}