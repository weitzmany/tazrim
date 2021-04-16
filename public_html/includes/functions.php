<?
function array_set(&$array, $key, $value){

    return arrayObj::set($array, $key, $value);

}

function array_get($array, $key, $default = null){

    return arrayObj::get($array, $key, $default);

}

function getContainer($name){
    global $container;

    return $container ? $container->getContainer($name) : false;

}



