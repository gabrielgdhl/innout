<?php
session_start();
requireValidSession();

loadModel('WorkingHours');

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try{
    $currentTime = strftime("%H:%M:%S", time());

    if($_POST['forcedTime']){
        $currentTime = $_POST['forcedTime'];
    }
    
    $records->innout($currentTime);
    addSuccessMessage('Ponto inserido com sucesso');
}catch(AppException $err){
    addErrorMessage($err->getMessage());
}

header("Location: dayRecords.php");