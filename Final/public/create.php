<?php
require_once('../vendor/autoload.php');
$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $view->render('fcreate.twig');
} else {
    $gachimuchenik = new \GachiNameSpace\Gachimuchenik(
        $_POST['surname'],
        $_POST['name'],
        $_POST['fathername'],
        $_POST['city'],
        $_POST['rang'],
        $_POST['ZarplataInBucks']);
    if ($gachimuchenik->add()) {
        header("Location: index.php");
        die();
    } else {
        header("Location: error.php");
        die();
    }
}