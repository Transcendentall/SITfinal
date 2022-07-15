<?php
require_once('../vendor/autoload.php');
$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);

if (isset($_GET['id'])) {
    $gachimuchenik = \GachiNameSpace\Repositoriy::getByID($_GET['id']);
    if ($gachimuchenik) {
        echo $view->render('fupdate2.twig', ['gachimuchenik' => $gachimuchenik]);

        if (isset($_POST['name'])) {

            if (\GachiNameSpace\Repositoriy::store(new \GachiNameSpace\Gachimuchenik2(
                $_GET['id'],
                $_POST['surname'],
                $_POST['name'],
                $_POST['fathername'],
                $_POST['city'],
                $_POST['rang'],
                $_POST['ZarplataInBucks']))) {
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
        header("Location: error2.php");
        die();
    }

    echo "<div>
            <a class='buttoncreate' href='index2.php'>Вернуться на стартовую страницу...</a>
        </div>";
}
