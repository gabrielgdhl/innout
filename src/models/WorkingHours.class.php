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

    /**
     * Método responsável por determinar a sequência de pontos a bater
     *
     * @return string
     */
    public function getNextTime(){
        if(!$this->time1) return 'time1';
        if(!$this->time2) return 'time2';
        if(!$this->time3) return 'time3';
        if(!$this->time4) return 'time4';

        return null;
    }

    /**
     * Método responsável por registrar todos os pontos
     *
     * @param DateTime $time
     * @return void
     */
    public function innout($time){
        $timeColumn = $this->getNextTime();
        if(is_null($timeColumn)){
            throw new AppException("Você já fez os 4 batimentos do dia!");
        }
        
        $this->$timeColumn = $time;
        if($this->id){
            $this->update();
        }else{
            $this->insert();
        }
    }

    /**
     * Método para agrupar as Horas trabalhadas em um unico array
     *
     * @return array
     */
    private function getTimes(){
        $times = [];

        $this->time1 ? array_push($times, getDateFromString($this->time1)) : array_push($times, null);
        $this->time2 ? array_push($times, getDateFromString($this->time2)) : array_push($times, null);
        $this->time3 ? array_push($times, getDateFromString($this->time3)) : array_push($times, null);
        $this->time4 ? array_push($times, getDateFromString($this->time4)) : array_push($times, null);

        return $times;
    }

}
