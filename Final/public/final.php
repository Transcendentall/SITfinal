<?php
require_once('../vendor/autoload.php');

$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);
echo $view->render('final.twig');