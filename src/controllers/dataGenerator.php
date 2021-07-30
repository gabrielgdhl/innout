<?php

loadModel('WorkingHours');

Database::executeSQL('DELETE FROM working_hours');
// Database::executeSQL('DELETE FROM users WHERE id > 5');

/**
 * Método para Gerar Datas e Horas aleatorias para popular o BD
 *
 * @param number $regularRate
 * @param number $extraRate
 * @param number $lazyRate
 */
function getDayTemplateByOdds($regularRate, $extraRate, $lazyRate){

    $regularDaytemplate = [
        'time1'=>'08:00:00',
        'time2'=>'12:00:00',
        'time3'=>'13:00:00',
        'time4'=>'17:00:00',
        'worked_time'=> DAILY_TIME
    ];

    $extraHourDaytemplate = [
        'time1'=>'08:00:00',
        'time2'=>'12:00:00',
        'time3'=>'13:00:00',
        'time4'=>'18:00:00',
        'worked_time'=> DAILY_TIME + 3600
    ];

    $lazyDaytemplate = [
        'time1'=>'08:30:00',
        'time2'=>'12:00:00',
        'time3'=>'13:00:00',
        'time4'=>'17:00:00',
        'worked_time'=> DAILY_TIME - 1800
    ];

    
    $value = rand(0, 100);

    if($value <= $regularRate){
        return $regularDaytemplate;
    }elseif($value <= $regularRate + $extraRate){
        return $extraHourDaytemplate;
    }
    return $lazyDaytemplate;
    
}

function populateWorkingHours($userId, $initialDate, $regularRate, $extraRate, $lazyRate){
    $currentDate = $initialDate;
    $today = new DateTime();
    $columns = ['user_id'=>$userId, 'work_date'=>$currentDate];
    
    while(isBefore($currentDate, $today)){
        if(!isWeekend($currentDate)){
            $template = getDayTemplateByOdds($regularRate, $extraRate, $lazyRate);
            $columns1 = array_merge($columns, $template);
            $workingHours = new WorkingHours($columns1);
            try{
                $workingHours->insert();
            }catch(Exception $e){
                echo $e->getMessage();
            }
            
        }
        $currentDate = getNextDay($currentDate)->format('Y-m-d');
        $columns['work_date'] = $currentDate;
    }
}

populateWorkingHours(1, date('Y-m-1'), 70, 20, 10);
populateWorkingHours(2, date('Y-m-1'), 75, 15, 5);
populateWorkingHours(3, date('Y-m-1'), 60, 20, 20);
populateWorkingHours(4, date('Y-m-1'), 70, 20, 10);
populateWorkingHours(5, date('Y-m-1'), 50, 20, 30);
echo "Fim";