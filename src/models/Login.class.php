<?php
loadModel('User');

class Login extends Model {

    /**
     * Método responsável por validar os dados de login
     *
     * @return User
     */
    public function checkLogin(){
        $user = User::getOne(['email' => $this->email]);
        if(isset($user)){
            if($user->end_date){
                throw new AppException("Usuário demitido!");
            }
            if(password_verify($this->password, $user->password)){
                return $user;
            }
        }
        throw new AppException('Usuário ou Senha Inválidos.');
    }
}