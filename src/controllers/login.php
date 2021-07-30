<?php
session_start();
loadModel('Login');
$exception = null;

if(isset($_POST)){
    $login = new Login($_POST);
        try{
            $user = $login->checkLogin();
            $_SESSION['user'] = $user;
            header("Location: dayRecords.php");
        }catch(AppException $e){
            $exception = $e;
        }
}

loadView('login', $_POST+['exception'=> $exception]);