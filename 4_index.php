<b><h3>Работа с сессиями</h3></b>
<p>По заходу на страницу запишите в сессию текст 'test'. Затем обновите страницу и выведите содержимое сессии на экран.</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
if (!isset($_SESSION['test']))
    $_SESSION['test'] = 'test';
else
    echo $_SESSION['test'];
?>
<p>Пусть у вас есть две страницы сайта. Запишите на первой странице что-нибудь в сессию, а затем выведите это при заходе на другую страницу.</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
$_SESSION['text'] = 'Привет!';
?>
другая страница:
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
if (!empty($_SESSION['text'])) echo $_SESSION['text'];
?>
<p>Сделайте счетчик обновления страницы пользователем. Данные храните в сессии. Скрипт должен выводить на экран количество обновлений. При первом заходе на страницу он должен вывести сообщение о том, что вы еще не обновляли страницу.</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
if (!isset($_SESSION['test'])) {
    echo 'Вы еще не обновляли страницу!';
    $_SESSION['test'] = 0;
} else {
    $_SESSION['test']++;
    echo 'Количество обновлений = ' . $_SESSION['test'];
}
?>
<p>Сделайте две страницы: index.php и test.php. При заходе на index.php спросите с помощью формы страну пользователя, запишите ее в сессию (форма при этом должна отправится на эту же страницу). Пусть затем пользователь зайдет на страницу test.php - выведите там страну пользователя.</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
if (!empty($_REQUEST['country'])) $_SESSION['country'] = $_REQUEST['country'];
?>
<?php
if (empty($_REQUEST['country'])) { ?>
<form>
<input type="text" name="country">
<input type="submit" name="submit">
</form>
<?php } ?>

test.php:
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
if (!empty($_SESSION['country'])) echo 'Ваша страна '.$_SESSION['country'];
?>
<p>Запишите в сессию время захода пользователя на сайт. При обновлении страницы выводите сколько секунд назад пользователь зашел на сайт.</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
if (!isset($_SESSION['time'])) $_SESSION['time'] = time(); else
echo 'Вы заходили '.(time() - $_SESSION['time']).' секунд назад';
?>
<p>Спросите у пользователя email с помощью формы. Затем сделайте так, чтобы в другой форме (поля: имя, фамилия, пароль, email) при ее открытии поле email было автоматически заполнено.</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
if (!empty($_REQUEST['email'])) { $_SESSION['email'] = $_REQUEST['email'];?>
    <form>
        <input type="text" name="name" value="имя"><br><br>
        <input type="text" name="family" value="фамилия"><br><br>
        <input type="password" name="password" value="пароль"><br><br>
        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"><br><br>
        <input type="submit" name="submit">
    </form>
<?php }
?>
<?php
if (empty($_REQUEST['email'])) { ?>
    <form>
        <input type="text" name="email">
        <input type="submit" name="submit">
    </form>
<?php } ?>
<p>Сделайте две страницы: index.php и form.php. При заходе на index.php спросите с помощью формы город и возраст пользователя. На form.php сделайте форму с полями 'Имя', 'Возраст', 'Город'. При заходе на form.php сделайте так, чтобы поля 'Возраст' и 'Город' уже были заполнены.</p>
<p>Добавьте в предыдущую задачу страницу logout.php. При заходе на нее разрушайте сессию пользователя.</p>
<form action="" method="GET">
    Город <input type="text" name="city"><br>
    Возраст <input type="text" name="age"><br>
    <input type="submit">
</form>

<?php
session_start();
if (!empty($_REQUEST['city'])) {
    $_SESSION['city'] = $_REQUEST['city'];
}
if (!empty($_REQUEST['age'])) {
    $_SESSION['age'] = $_REQUEST['age'];
}
?>

form.php

<?php
session_start();
$city = isset($_SESSION['city']) ? $_SESSION['city'] : '';
$age = isset($_SESSION['age']) ? $_SESSION['age'] : '';
?>
<form action="" method="GET">
    Имя <input type="text" name="name"><br>
    Город<input type="text" name="city" value="<?php echo $city; ?>"><br>
    Возраст<input type="text" name="age" value="<?php echo $age; ?>"><br>
    <input type="submit">
</form>

logout.php

<?php

session_start();
session_destroy();
?>
<p>Реализуйте тест по принципу 'одна страница сайта - одна задача'. Запомните результаты ответов пользователя в сессию.</p>
index.php
<form action="1.php" method="post">
    <h3>Вопрос</h3>
    <input type="radio" name="answer" value="wrong"> Правильно <br>
    <input type="radio" name="answer" value="no answer"> Нет ответа <br>
    <input type="radio" name="answer" value="right"> Неправильно <br>
    <input type="submit">
</form>

1.php

<?php

if (isset($_REQUEST['answer'])) {
    session_start();

    $_SESSION['answers'] = [];
    $_SESSION['answers'][1] = $_REQUEST['answer'];

    ?>
    <form action="2.php" method="post">
        <h3>Вопрос</h3>
        <input type="radio" name="answer" value="wrong"> Правильно <br>
        <input type="radio" name="answer" value="right"> Неправильно <br>
        <input type="radio" name="answer" value="no answer"> Нет ответа <br>
        <input type="submit">
    </form>
    <?php
} else {
    echo "Откуда ты?";
}
?>
2.php

<?php

if (isset($_REQUEST['answer'])) {
    session_start();

    $_SESSION['answers'][2] = $_REQUEST['answer'];
    ?>
    <form action="end.php" method="post">
        <h3>Вопрос</h3>
        <input type="radio" name="answer" value="right"> Неправильно <br>
        <input type="radio" name="answer" value="wrong"> Правильно <br>
        <input type="radio" name="answer" value="no answer"> Нет ответа <br>
        <input type="submit">
    </form>
    <?php
} else {
    echo "Откуда ты?";
}
?>
end.php

<?php

if (isset($_REQUEST['answer'])) {
    session_start();

    $_SESSION['answers'][3] = $_REQUEST['answer'];

    $right = 0;
    for ($i = 1; $i <= 3; $i++) {
        if ($_SESSION['answers'][$i] == 'right')
            $right++;
    }

    echo $right;
} else {
    echo "Откуда ты?";
}