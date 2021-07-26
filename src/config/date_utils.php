<?php

/**
 * Método para transformar string em DateTime
 *
 * @param string $date
 * @return void
 */
function getDateAsDateTime($date){
    return is_string($date) ? new DateTime($date) : $date;
}