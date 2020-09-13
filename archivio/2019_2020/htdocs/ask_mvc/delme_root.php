<?php

require_once 'conf/config.php';

spl_autoload_register(function ($class_name) {
    include_once __DIR__ . '/' . str_replace('\\','/', $class_name) . '.php';
});

echo \Util\Helper::root_path();