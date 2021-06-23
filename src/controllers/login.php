<?php
loadModel('Login');

if(isset($_POST)){
    $login = new Login($_POST);
        try{
            $user = $login->checkLogin();
            echo 'Usuario Logado';
        }catch(Exception $e){
            echo "Erro no Login";
        }
}

loadView('login', $_POST);