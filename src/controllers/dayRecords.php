<?php
session_start();
//valida sessão do usuário
requireValidSession();

$date = (new DateTime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);

loadTemplateView('dayRecords', ['today'=>$today]);