<?php

class User extends Model {

    /**
     * Nome da tabela
     *
     * @var string
     */
    protected static $tableName = 'users';

    /**
     * Array com o nome de todas as colunas no BD
     *
     * @var array
     */
    protected static $columns = [
        'id',
        'name',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin'
    ];

}