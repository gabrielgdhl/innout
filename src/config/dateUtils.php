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

/**
 * Método responsavél por somar as horas
 *
 * @param string $interval1
 * @param string $interval2
 * @return void
 */
function sumIntervals($interval1, $interval2){
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->add($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

/**
 * Método responsavél por subtrair as horas
 *
 * @param string $interval1
 * @param string $interval2
 * @return void
 */
function subtractIntervals($interval1, $interval2){
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->sub($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

/**
 * Converte o tipo para DateTime object
 *
 * @param string $interval
 * @return void
 */
function convertIntervalToDate($interval){
    return new DateTime($interval->format('%H:%i:%s'));
}

/**
 * Método para converter um DateTime em string
 *
 * @param DateTime $string
 * @return void
 */
function getDateFromString($string){
    return DateTimeImmutable::createFromFormat('H:i:s', $string);
}