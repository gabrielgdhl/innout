<?php
session_start();
//valida sessão do usuário
requireValidSession();

loadModel('WorkingHours');

$date = (new DateTime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));


loadTemplateView('dayRecords', ['today'=>$today,
                                'records'=>$records]);