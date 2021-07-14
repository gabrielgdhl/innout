<?php

require_once(dirname(__FILE__, 2).'/src/config/config.php');
// require_once realpath(CONTROLLER_PATH.'/login.php');

$uri = urldecode($_SERVER['REQUEST_URI']);


if($uri === '/estudos/innout/public/' || $uri === '' || $uri === '/estudos/innout/public/index.php'){
    $uri = '/login.php';
}
echo $uri;
require_once(CONTROLLER_PATH. "/{$uri}");