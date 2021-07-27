<?php

class WorkingHours extends Model {
    /**
     * Nome da tabela
     *
     * @var string
     */
    protected static $tableName = 'working_hours';

    /**
     * Array com o nome de todas as colunas no BD
     *
     * @var array
     */
    protected static $columns = [
        'id',
        'user_id',
        'work_date',
        'time1',
        'time2',
        'time3',
        'time4',
        'working_time'
    ];

}
