<?php

loadModel('workingHours');

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

print_r(getDayTemplateByOdds(50, 30, 20));