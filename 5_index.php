<b><h3>Работа с cookie</h3></b>
<p>По заходу на страницу запишите в куку с именем test текст '123'. Затем обновите страницу и выведите содержимое этой куки на экран.</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
setcookie('test', '123');
echo $_COOKIE['test'];
?>
<p>Удалите куку с именем test.</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
setcookie('test', '', time());
?>
<p>Сделайте счетчик посещения сайта посетителем. Каждый раз, заходя на сайт, он должен видеть надпись: 'Вы посетили наш сайт % раз!'.</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
if (!isset($_COOKIE['cc'])) {
    setcookie('cc', 1, time() + 3600);
    echo 'Вы на сайте в первый раз!';
} else {
    $s = $_COOKIE['cc'] + 1;
    setcookie('cc', $s, time() + 3600);
    echo 'Вы на сайте ' . $s . ' раз!';
}
?>
<p>Спросите дату рождения пользователя. При следующем заходе на сайт напишите сколько дней осталось до его дня рождения. Если сегодня день рождения пользователя - поздравьте его!</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
if (isset($_COOKIE['day'])) {
    $arr = explode('.', $_COOKIE['day']);
    $month = date('n');
    $day = date('j');
    if ($day == $arr[0] && $month == $arr[1]) echo 'Поздравляем Вас с днем рождения!';
    if ($month < $arr[1]) echo 'До Вашего дня рождения ' . (date('z', mktime(0, 0, 0, $arr[1], $arr[0])) - date('z')) . ' дней';
    if ($month > $arr[1])
        echo 'До вашего дня рождения ' . (date('z', mktime(0, 0, 0, $arr[1], $arr[0], date('Y') + 1)) +
                (365 - date('z'))) . ' дней';
}
?>
<?php
if (empty($_REQUEST['day'])) {
    if (!isset($_COOKIE['day'])) { ?>
        <form>
            <p>Введите Ваш день рождения:</p>
            <input type="text" name="day" placeholder="день.месяц.год">
            <input type="submit" name="submit">
        </form>
    <?php }
}
if (!empty($_REQUEST['day']) && !isset($_COOKIE['day'])) setcookie('day', $_REQUEST['day'], time() + 3600); ?>
<p>Установите куку с именем age. Запишите туда случайное число от 10 до 70 (с помощью mt_rand). Сделайте так, чтобы эта кука установилась на 1 час, на 3 часа, на 1 день, на год, на 10 лет, до конца текущего дня, до конца текущего года.</p>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
setcookie($age, mt_rand(10, 70), time() + 3600); // час
setcookie($age, mt_rand(10, 70), time() + 3600*3); // 3 часа
setcookie($age, mt_rand(10, 70), time() + 3600*24); // 1 день
setcookie($age, mt_rand(10, 70), time() + 3600*24*30*365); // 1 год
setcookie($age, mt_rand(10, 70), time() + 3600*24*30*365*10); // 10 лет
setcookie('age', mt_rand(10,70), mktime(23,59,59,date('m'), date('d'), date('Y')));//до конца текущего дня
setcookie('age', mt_rand(10,70), mktime(23,59,59,12,31,date('Y')));//до конца текущего года
?>
<b><h3>Задачи</h3></b>
<p>Напишите оболочку над cookie. Оболочка должна представлять собой набор функций: сохранение куки, удаление куки, редактирование куки.</p>
<?php
function savecookie($value)
{
    setcookie('value', $value);
}

function deletecookie()
{
    if (!empty($_COOKIE['value'])) {
        setcookie('value', '', time());
    }
}

function editcookie($edit)
{
    if (!empty($_COOKIE['value'])) {
        setcookie('value', $edit);
    }
}

?>
<p>Сделайте на сайте 5 картинок с товарами. Реализуйте корзину. Под каждой картинкой должна быть ссылка 'Положить в корзину'. По нажатию на эту ссылку этот товар должен занестись в корзину (сессия), также должна увеличиться общая сумма, которую должен заплатить пользователь (сумма также должна быть указана под картинками с товарами).</p>

<p>Сделайте счетчик посещения сайта посетителем. Каждый раз, заходя на сайт, он должен видеть надпись: 'Вы посетили наш сайт % раз!'.</p>

<p>Покажите пользователю баннер с кнопкой 'Не показывать больше!'. Если он нажмет на эту кнопку - не показывайте ему баннер в течении месяца.</p>

<p>Запомните дату последнего посещения сайта пользователем. При заходе на сайт напишите ему, сколько дней он не был на вашем сайте.</p>

<p>Спросите дату рождения пользователя. При следующем заходе на сайт напишите сколько дней осталось до его дня рождения. Если сегодня день рождения пользователя - поздравьте его!</p>

<p>Реализуйте выбор дизайна сайта пользователем. Сделайте несколько дизайнов сайта. Пользователь может выбрать один из дизайнов с помощью выпадающего списка. Этот выбор будет сохранен в куки и пользователь, заходя на сайт, всегда будет видеть один и тот же дизайн.</p>