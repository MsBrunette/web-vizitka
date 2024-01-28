<?php

spl_autoload_register(function($class) {
    $slash = DIRECTORY_SEPARATOR;
    $type = ['Models' => '.model', 'Controllers' => '.controller'];
    foreach($type as $folder => $suffix)
    {
        $filepath = __DIR__ . $slash . $folder . $slash . $class . $suffix .'.php';
        if (file_exists($filepath))
            require_once($filepath);
    }
});

?>