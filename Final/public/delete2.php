<?php
require_once('../vendor/autoload.php');

$GachimuchenikForRemove = \GachiNameSpace\Repositoriy::getById($_GET['id']);
$is_remove = \GachiNameSpace\Repositoriy::remove($GachimuchenikForRemove);
if ($is_remove) {
    header("Location: index2.php");
    die();
} else {
    header("Location: error2.php");
    die();
}