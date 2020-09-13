<?php

require_once 'conf/config.php';

spl_autoload_register(function ($class_name) {
    require_once __DIR__ . '/' . str_replace('\\','/', $class_name) . '.php';
});

require_once __DIR__ . '/vendor/autoload.php';

$templates = new \League\Plates\Engine('./view', 'tpl');

use Controller\QuestionController;

$a = new QuestionController($templates);

$a->list();