<?php
require_once('../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();


$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);

$gachimuchies = \GachiNameSpace\Gachimuchenik::getAll();

echo $view->render('fmainpage.twig', ['gachimuchies' => $gachimuchies]);

