<?php
require_once('../vendor/autoload.php');

$is_delete = \GachiNameSpace\Gachimuchenik::delete($_GET['id']);
if ($is_delete) {
    header("Location: index.php");
    die();
} else {
    header("Location: error.php");
    die();

}