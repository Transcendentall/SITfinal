<?php
require_once('../vendor/autoload.php');
$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $view->render('fcreate2.twig');
} else {
    $gachimuchenik = \GachiNameSpace\Repositoriy::store(new \GachiNameSpace\Gachimuchenik2(
            null,
            $_POST['surname'],
            $_POST['name'],
            $_POST['fathername'],
            $_POST['city'],
            $_POST['rang'],
            $_POST['ZarplataInBucks'])
    );
    if ($gachimuchenik) {
        header("Location: index2.php");
        die();
    } else {
        header("Location: error2.php");
        die();
    }
}