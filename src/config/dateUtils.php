<?php

/**
 * Método para transformar string em DateTime
 *
 * @param DateTime $date
 * @return DateTime
 */
function getDateAsDateTime($date){
    return is_string($date) ? new DateTime($date) : $date;
}

/**
 * Método que verifica se é dia de fim de semana
 *
 * @param DateTime $date
 * @return DateTime
 */
function isWeekend($date){
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >=6;
}

/**
 * verifica se data é anterior a outra
 *
 * @param DateTime $date1
 * @param DateTime $date2
 * @return DateTime
 */
function isBefore($date1, $date2){
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);
    return $inputDate1 <= $inputDate2;
}

/**
 * Método que retorna um dia após data informada
 *
 * @param DateTime $date
 * @return DateTime
 */
function getNextDay($date){
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('+1 day');
    return $inputDate;
}