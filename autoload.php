<?php 
require_once './bootstrap.php';
session_start();

spl_autoload_register('autoload');

function autoload($class_name){
    $array_paths = array(
        'database/',
        'app/classes/',
        'models/',
        'controllers/',
        'views/includes'
    );

    $parts = explode('\\', $class_name);
    $name = array_pop($parts);

    foreach($array_paths as $path){
        $file = sprintf($path. '%s.php', $name);
        if(is_file($file)){
            include_once $file; 
        }
    }

    
}