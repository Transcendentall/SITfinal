<?php
$filePath = __DIR__ . '/data.json';
$currentuser = "АНОНИМУС";
$user = [
    "Billy Herrington" => "12345",
    "Van Darkholm" => "leatherman",
    "Ricardo Milos" => "gachimuchi",
];

if (htmlspecialchars(isset($_GET['login'])) && htmlspecialchars(isset($_GET['password'])))
{
    echo "Введённый логин:\n\n" , htmlspecialchars($_GET['login']), "<br/>";
    echo "Введённый пароль:\n" , htmlspecialchars($_GET['password']), "<br/>";
    if ((key_exists($_GET['login'], $user) == false))
    {
        echo '<div class="authorisation">ОШИБКА! Пользователя с таким логином не существует.</div>', "<br/>";
    }
    else
    {
        if ($user[$_GET['login']] != $_GET['password'])
        {
            echo '<div class="authorisation">ОШИБКА! Неверный пароль.</div>', "<br/>";
        }
        else
        {
            echo '<div class="authorisationtrue">Авторизация успешно выполнена.</div>', "<br/>";
            $currentuser = $_GET['login'];
            echo '<form action="" method="POST"> 
                    <input class="field" name="message"> 
                    <button class="but" name="but1">Отправить сообщение</button> 
                    </form>';
        }
    }
}
echo "<br/>";
echo "<br/>";
echo "<br/>";


$messages = json_decode(file_get_contents($filePath), true);

date_default_timezone_set('Asia/Vladivostok');

if (isset($_POST['message'])) {

    $messages [] = [
        "currentuser" => $currentuser,
        "data" => date("дата: d.m.Y, время: H:i:s"),
        "message" => $_POST['message']
    ];

}
file_put_contents(__DIR__ . '/data.json', json_encode($messages));

foreach ($messages as $message) { ?>
    <div class="text">Юзер <?=$message["currentuser"]?> (<?=$message["data"]?>) пишет: <?=htmlspecialchars($message["message"])?></div>
<?php }

echo "<br/>";
echo "<br/>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <link rel="stylesheet" href="visual.css">
</head>
<body>

<form action="" method="GET">
    <input class="field" name="login" placeholder="Логин">
    <input class="field" name="password" placeholder="Пароль">
    <button class="but">Авторизироваться</button>
</form>
</body>