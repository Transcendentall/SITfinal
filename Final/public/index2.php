<?php
require_once('../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();


$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);

$gachimuchies = \GachiNameSpace\Repositoriy::getAll();

echo $view->render('fmainpage2.twig', ['gachimuchies' => $gachimuchies]);
