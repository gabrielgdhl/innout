<?php

/**
 * Método responsável por carregar os models
 *
 * @param String $modelName
 * @return void
 */
function loadModel($modelName){
    require_once(MODEL_PATH."/{$modelName}.class.php");
}

/**
 * Método responsável por carregar as Views
 *
 * @param String $viewName
 * @param Array $params
 */
function loadView($viewName, $params = array()){
    if(count($params) > 0){
        foreach($params as $key => $value){
            if(strlen($key) > 0){
                ${$key} = $value;
            }
        }
    }
    require_once(VIEW_PATH."/{$viewName}.php");
}

/**
 * Método responsável por carregar as Views
 *
 * @param String $viewName
 * @param Array $params
 */
function loadTemplateView($viewName, $params = array()){
    if(count($params) > 0){
        foreach($params as $key => $value){
            if(strlen($key) > 0){
                ${$key} = $value;
            }
        }
    }
    require_once(VIEW_PATH."/{$viewName}.php");
}