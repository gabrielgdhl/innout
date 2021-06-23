<?php

date_default_timezone_set('America/Manaus');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

//folders
define('MODEL_PATH', realpath(dirname(__FILE__).'/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__).'/../views'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__).'/../controllers'));

//Auto Load
require_once realpath((dirname(__FILE__).'/database.php'));
require_once realpath((dirname(__FILE__).'/loader.php'));
require_once realpath(MODEL_PATH.'/Model.class.php');
