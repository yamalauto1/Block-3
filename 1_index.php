<b><h3>Переменные и строки</h3></b>
<p>Дана переменная $name со значением 'Иван'. Выведите с ее помощью на экран фразу 'Привет, Иван!'. Напишите два варианта решения - с одинарными кавычками и двойными.</p>
<?php
$name = 'Иван';
echo 'Привет, '.$name.'!'.'<br>';
echo "Привет, $name!";
?>
<p>Дан массив ['name'=>'Иван', 'age'=>30]. Выведите с его помощью на экран фразу 'Привет, Иван! Тебе 30 лет.'. Напишите два варианта решения - с одинарными кавычками и двойными.</p>
<?php
$arr = ['name'=>'Иван', 'age'=>30];
echo 'Привет, '.$arr['name'].'! Тебе '.$arr['age'].' лет.'.'<br>';
echo "Привет, $arr[name]! Тебе $arr[age] лет";
?>
<b><h3>Формирование тегов</h3></b>
<p>Дана переменная $text со значением '!!!'. Выведите с ее помощью на экран текст < p>!!!< /p>. Напишите два варианта решения - с одинарными кавычками и двойными.</p>
<?php
$text = '!!!';
echo '<p>'.$text.'</p>';
echo "<p>$text</p>";
?>

<p>Дана переменная $href со значением 'index.html' и переменная $text со значением 'ссылка'. Выведите с их помощью на экран текст < a href="index.html">ссылка< /a>. Напишите два варианта решения - с одинарными кавычками и двойными.</p>
<?php
$href = 'index.html';
$text = 'ссылка';
echo '<a href="'.$href.'">'.$text.'</a>'.'<br>';
echo "<a href=\"$href\">$text</a>";
?>

<b><h3>Теги и циклы</h3></b>
<p>Дан массив. Выведите каждый элемент этого массива в отдельном абзаце.</p>
<?php
$arr = [1, 2, 3, 4, 5];
    foreach ($arr as $item) {
        echo "<p>$item</p>";
    }
?>
<p>Дан массив. Выведите каждый элемент этого массива в отдельной li в теге ul.</p>
<?php
$arr = [1, 2, 3, 4, 5];
echo "<ul>";
foreach ($arr as $item) {
    echo "<li>$item</li>";
}
echo "</ul>";
?>
<p>Дан массив:</p>
<p>< ?php<br>
    $arr = [<br>
        ['href'=>'1.html', 'text'=>'ссылка 1'],<br>
        ['href'=>'2.html', 'text'=>'ссылка 2'],<br>
        ['href'=>'3.html', 'text'=>'ссылка 3'],<br>
    ];<br>
    ?></p>
<p>С помощью цикла сформируйте с его помощью следующий HTML код:</p>
<p>< ?php<br>
    < a href="1.html">ссылка 1< /a><br>
    < a href="2.html">ссылка 2< /a><br>
    < a href="3.html">ссылка 3< /a><br>
    ?></p>
<?php
$arr = [
    ['href'=>'1.html', 'text'=>'ссылка 1'],
    ['href'=>'2.html', 'text'=>'ссылка 2'],
    ['href'=>'3.html', 'text'=>'ссылка 3'],
];
    foreach ($arr as $item) {
        echo "<a href=\"$item[href]\">$item[text]</a><br>";
    }
?>
<p>Модифицируйте предыдущую задачу так, чтобы получился следующий HTML код:</p>
<p>< ?php<br>
    < ul><br>
    < li>< a href="1.html">ссылка 1< /a>< /li><br>
    < li>< a href="2.html">ссылка 2< /a>< /li><br>
    < li>< a href="3.html">ссылка 3< /a>< /li><br>
    < /ul><br>
    ?></p>
<?php
$arr = [
    ['href'=>'1.html', 'text'=>'ссылка 1'],
    ['href'=>'2.html', 'text'=>'ссылка 2'],
    ['href'=>'3.html', 'text'=>'ссылка 3'],
];
echo "<ul>";
foreach ($arr as $item) {
    echo "<li><a href=\"$item[href]\">$item[text]</a></li></br>";
}
echo "</ul>";
?>
<p>Дан массив:</p>
<p>< ?php<br>
    $arr = [<br>
    ['name'=>'Коля', 'age'=>30, 'salary'=>500],<br>
    ['name'=>'Вася', 'age'=>31, 'salary'=>600],<br>
    ['name'=>'Петя', 'age'=>32, 'salary'=>700],<br>
    ];<br>
    ?></p>
<p>С помощью цикла сформируйте с его помощью следующий HTML код:</p>
< table><br>
    < tr><br>
    < tr><br>
        < td>Коля< /td><br>
        < td>30< /td><br>
        < td>500< /td><br>
    < /tr><br>
    < tr><br>
        < td>Вася< /td><br>
        < td>31< /td><br>
        < td>600< /td><br>
    < /tr><br>
    < tr><br>
        < td>Петя< /td><br>
        < td>32< td><br>
        < td>700< /td><br>
    < /tr><br>
    < /tr><br>
< /table><br><br>

<?php
$arr = [
    ['name' => 'Коля', 'age' => 30, 'salary' => 500],
    ['name' => 'Вася', 'age' => 31, 'salary' => 600],
    ['name' => 'Петя', 'age' => 32, 'salary' => 700],
];
?>
<table>
    <tr>
        <?php
        foreach ($arr as $item) {
        $name = $item['name'];
        $age = $item['age'];
        $salary = $item['salary'];
        ?>
    <tr>
        <td><?php echo $name; ?></td>
        <td><?php echo $age; ?></td>
        <td><?php echo $salary; ?></td>
    </tr>
    <?php } ?>
    </tr>
</table>
