<?php
require_once('../vendor/autoload.php');
$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);

if (isset($_GET['id'])) {
    $gachimuchenik = \GachiNameSpace\Gachimuchenik::getByID($_GET['id']);
    if ($gachimuchenik) {
        echo $view->render('fupdate.twig', ['gachimuchenik' => $gachimuchenik]);

        if (isset($_POST['name'])) {
            $gachimuchenik->setSurname($_POST['surname']);
            $gachimuchenik->setName($_POST['name']);
            $gachimuchenik->setFathername($_POST['fathername']);
            $gachimuchenik->setCity($_POST['city']);
            $gachimuchenik->setRang($_POST['rang']);
            $gachimuchenik->setZarplataInBucks($_POST['ZarplataInBucks']);
            if ($gachimuchenik->save()) {
                echo "<label class='textok'>Изменения были успешно применены. Вернись на главную страницу, чтобы увидеть их.</label>";
            } else {
                echo "<label class='tablelabel'>ОШИБКА!</label>";
                echo "<label class='tablelabel'>Из-за неверных данных не удалось выполнить действие.</label>";
                echo "<label class='tablelabel'>Правила таковы:</label>";
                echo "<label class='tablelabel'> 1) Фамилия, Имя и Зарплата в баксах не должны быть пустыми!</label>";
                echo "<label class='tablelabel''> 2) Зарплата в баксах должна быть целым положительным числом!</label>";
                echo "<label class='tablelabel'> 3) Нельзя отредактировать/удалить запись с несуществующим id.</label>";
                echo "<label class='tablelabel'> 4) В таблице не должно быть двух одинаковых записей.</label>";
                echo "<label class='tablelabel'> 5) Все текстовые поля должны занимать не более 20 символов.</label>";
            }
        }
    } else {
        header("Location: error.php");
        die();
    }

    echo "<div>
            <a class='buttoncreate' href='index.php'>Вернуться на стартовую страницу...</a>
        </div>";
}
