<?php

/**
 *Método para válidar a sessão do usuário
 */
function requireValidSession(){
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
}