<?php
require_once __DIR__ . '/vendor/autoload.php';

$templates = new \League\Plates\Engine('./view', 'tpl');

echo $templates->render('index', []);
?>
