<?php
/**
 * Created by PhpStorm.
 * User: MAV
 * Date: 25.02.2017
 * Time: 21:03
 http://www.quirksmode.org/dom/inputfile.html
 */

mb_internal_encoding('UTF-8');

if (isset($_FILES['testFile'])) {

    $tmp_files = $_FILES['testFile']['tmp_name'];
    $fileName = 'data/' . $_FILES['testFile']['name'];
    if (file_exists($fileName)) {
        echo 'Пожалуйста, переименуйте файл. Такой файл существует';
        die(0);
    }
    if (move_uploaded_file($tmp_files, $fileName)) {
        echo 'Файл был загружен успешно.';
    } else {
        echo 'Возникли проблемы с сохранением загруженного файла';
    }
    echo '<br/><a href="admin.php">Назад к загрузке</a>';
} else {
    ?>
    <!DOCTYPE html>
    <html lang="ru-RU">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Форма">
        <meta name="keywords" content="сайт, тесты, html, css">
        <meta name="author" content="Андрюс Микялёнис">
        <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">

        <title>Загрузка тестов</title>

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/main.css">

    </head>
    <body>
    <!--[if lte IE 9]>
    <p>
        Ваш браузер устарел! Скачайте новую версию <a href="http://browsehappy.com/locale=ru_ru">браузера</a>
    </p>
    <![endif]-->
    <div class="wrapper wrapper_center">
        <div class="content">
            <div class="test">
                <h1>Загрузка тестов</h1>
            </div>
            <div class="form">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                    <div>
                        <label for="testFile">Выберите файл с тестом:</label>
                        <input type="file" name="testFile"><br/>
                    </div>
                    <!--                <input type="submit" value="Отправить" />-->
                    <div>
                        <button>Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?
}
?>
