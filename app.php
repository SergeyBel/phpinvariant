#!/usr/bin/env php
<?php



foreach ([__DIR__ . '/vendor/autoload.php', __DIR__ . '/../vendor/autoload.php', __DIR__ . '/../../../vendor/autoload.php'] as $file) {
    if (file_exists($file)) {
        require $file;
        break;
    }
}

use PhpClassFuzz\Application\Application;

$app = new Application();
$app->registerCommands();
$app->run();
