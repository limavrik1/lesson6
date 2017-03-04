<?php
/**
 * Created by PhpStorm.
 * User: MAV
 * Date: 26.02.2017
 * Time: 17:50
 */
?>
<!DOCTYPE html>
<html lang="ru-RU">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Список тестов">
    <meta name="keywords" content="сайт, тесты, html, css">
    <meta name="author" content="Андрюс Микялёнис">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">

    <title>Список тестов</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/admin.css">

</head>
<body>
<!--[if lte IE 9]>
<p>
    Ваш браузер устарел! Скачайте новую версию <a href="http://browsehappy.com/locale=ru_ru">браузера</a>
</p>
<![endif]-->
<div class="wrapper wrapper_title">
    <div class="title">
        <ul class="tests__list">
            <? if (!empty(glob("data/*.json"))) {
                foreach (glob("data/*.json") as $filename) {
                    if ($contents = file_get_contents($filename)) {
                        $contents = utf8_encode($contents);
                        $results = json_decode($contents, true);
                        if (array_key_exists('title', $results)) {
                            ?>
                            <li class="tests__list-item">
                                <a href="test.php?id=<?= $filename ?>" class="tests__list-link">
                                    <i class="tests__list-icon fa fa-list"></i>
                                    <span class="tests__list-text">
                                        <? echo $results['title']; ?>
                                    </span>
                                </a>
                            </li>
                        <? }else { echo "Некорректный файл. Проверьте формат теста $filename. <br />"; }
                    }
                }
            } else {
                echo 'Тесты не загружены.';
                echo '<br/><a href="admin.php">Загрузить тесты ...</a>';
            } ?>
        </ul>
    </div>
</div>
</body>
</html>