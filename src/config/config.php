<?php

date_default_timezone_set('America/Manaus');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

//folders
define('MODEL_PATH', realpath(dirname(__FILE__).'/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__).'/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__).'/../views/templates'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__).'/../controllers'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__).'/../exceptions'));

//Auto Load
require_once realpath((dirname(__FILE__).'/database.php'));
require_once realpath((dirname(__FILE__).'/loader.php'));
require_once realpath((dirname(__FILE__).'/session.php'));
require_once realpath(MODEL_PATH.'/Model.class.php');
require_once realpath(MODEL_PATH.'/User.class.php');
require_once realpath(EXCEPTION_PATH.'/AppException.class.php');
require_once realpath(EXCEPTION_PATH.'/ValidationException.class.php');
