<?php

class Model {
    /**
     * Nome da tabela
     *
     * @var string
     */
    protected static $tableName = '';

    /**
     * Array com o nome de todas as colunas no BD
     *
     * @var array
     */
    protected static $columns = [];
    
    /**
     * Valores carregados na instância
     *
     * @var array
     */
    protected $values = [];

    function __construct($dados){
       $this->loadFromArray($dados);
    }

    /**
     * Método responsável por carregar os valores da instancia no array de dados
     *
     * @param array $dados
     * @return void
     */
    public function loadFromArray($dados){
        if($dados){
            foreach($dados as $key => $value){
                $this->$key = $value;
            }
        }
    }

    /**
     * Método que retorna o valor da chave enviada
     *
     * @param string $key
     * @return string
     */
    public function __get($key){
        return $this->values[$key];
    }

    /**
     * Método reponsável por setar a chave e o valor no array values
     *
     * @param string $key será a chave do array que será criado
     * @param string $value valores do array
     * @return void
     */
    public function __set($key, $value){
        $this->values[$key] = $value;
    }

    /**
     * Método responsável por criar a Query formatada de SELECT
     *
     * @param array $filters
     * @param string $columns
     * @return string com uma Query formatada com os parâmetros fornecidos pelo usuário
     */
    public static function getResultSetFromSelect($filters = [], $columns = '*'){
        $sql = "SELECT ${columns} FROM ".static::$tableName.static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0){
            return null;
        }
        return $result;
    }

    /**
     * Método que busca todos os resultados de uma tabela
     *
     * @param array $filters
     * @param string $columns
     * @return Object de Classe
     */
    public static function get($filters = [], $columns = '*'){
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if($result){
            $class = get_called_class();
            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

    /**
     * Busca um unico objeto no DB
     *
     * @param array $filters
     * @param string $columns
     * @return void
     */
    public static function getOne($filters = [], $columns = '*'){
        $result = static::getResultSetFromSelect($filters, $columns);
        $class = get_called_class();
        
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    /**
     * Método responsável por adicionar os parametros da clausula WHERE
     *
     * @param [type] $filters
     * @return string
     */
    private static function getFilters($filters){
        $sql = '';
        if(count($filters)>0){
            $sql .= ' WHERE 1 = 1';
            foreach($filters as $column => $value){
                $sql .= " AND ${column} = ".self::getValorWhereFormatado($value);
            }
        }
        return $sql;
    }

    /**
     * Método para formartar os parâmetros WHERE 
     *
     * @param [type] $value
     * @return string
     */
    private static function getValorWhereFormatado($value){
        if(is_null($value)){
            return "null";
        }else if(is_string($value)){
            return "'$value'";
        }

        return $value;
    }

    /**
     * Método que Inseri valores no BD
     *
     * @return integer
     */
    public function insert(){
        $sql = "INSERT INTO ".static::$tableName." ("
        . implode(",", static::$columns).") VALUES (";
        foreach(static::$columns as $col){
            $sql.=static::getValorWhereFormatado($this->$col) . ",";
        }
        $sql[strlen($sql)-1] = ')';
        $id = Database::executeSQL($sql);
        $this->id = $id;
    }


}//fim da classe Model;