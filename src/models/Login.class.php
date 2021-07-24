<?php

class Login extends Model {

    public function validate(){
        $errors = [];
        if(!$this->email){
            $errors['email'] = 'E-mail é obrigatório';
        }

        if(!$this->password){
            $errors['password'] = 'Informe sua senha';
        }

        if(count($errors) > 0){
            throw new ValidationException($errors);
        }
    }

    /**
     * Método responsável por validar os dados de login
     *
     * @return User
     */
    public function checkLogin(){
        $this->validate();
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