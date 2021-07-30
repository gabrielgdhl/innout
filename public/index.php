<?php

require_once(dirname(__FILE__, 2).'/src/config/config.php');

//Capturando a URL e salvando valor em uma variável
$uri = urldecode(
                 parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                );
                
if($uri === '/' || $uri === '' || $uri === '/index.php'){
    $uri = 'dayRecords.php';
}

require_once(CONTROLLER_PATH. "/{$uri}");