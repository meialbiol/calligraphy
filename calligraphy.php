#!/usr/bin/env php
<?php

include __DIR__.'/vendor/autoload.php';

use Calligraphy\CreateHtmlDoc;
use Symfony\Component\Console\Application;

$application = new Application();

// ... register commands
$options =  array('extension' => '.html');
$moustache= new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates', $options),
));


$application->add(new \Console\CreatePdfTableCommand(new CreateHtmlDoc($moustache), new \Calligraphy\CreateHtmlDataArray(), new \Calligraphy\HtmlTable()));

$application->run();