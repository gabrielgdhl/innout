<?php
loadModel('Login');
$exception = null;

if(isset($_POST)){
    $login = new Login($_POST);
        try{
            $user = $login->checkLogin();
            echo 'Usuario Logado';
        }catch(AppException $e){
            $exception = $e;
        }
}

loadView('login', $_POST+['exception'=> $exception]);