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
        'worked_time'
    ];

    /**
     * Método responsável por buscar o usuário e os batimentos de ponto
     *
     * @param integer $userId
     * @param number $workDate
     * @return User
     */
    public static function loadFromUserAndDate($userId, $workDate){
        $registry = self::getOne(['user_id'=>$userId, 'work_date'=>$workDate]);
        if(!$registry){
            $registry = new WorkingHours([
                'user_id'=>$userId, 
                'work_date'=>$workDate,
                'woked_time' => 0
            ]);
        }

        return $registry;
    }

}
