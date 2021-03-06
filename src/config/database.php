<?php

class Database {
    
    /**
     * Função que abre connexão com o banco de dados
     *
     * @return Mysqli Object
     */
    public static function getConnection(){
        $envPath = realpath(dirname(__FILE__).'/../env.ini');
        $env = parse_ini_file($envPath);
        $conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);

        if($conn->connect_error){
            die("Erro: ".$conn->connect_error);
        }

        return $conn;
    }

    /**
     * Método responsável por executar as querys
     * @param string com a Query que vai ser executada
     * @return Statement
     */
    public static function getResultFromQuery($sql){
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    /**
     * Método que executa uma query e retona o ID
     *
     * @param String $sql
     * @return int
     */
    public static function executeSQL($sql){
        $conn = self::getConnection();
        if(!mysqli_query($conn, $sql)){
            throw new Exception(mysqli_error($conn));
        }
        $id = $conn->insert_id;
        $conn->close();
        return $id;
    }

}//fim da classe Databse