<?php
/**
 * Created by PhpStorm.
 * User: MAV
 * Date: 25.02.2017
 * Time: 21:03
 */
if (isset($_FILES['testFile'])) {
    var_dump($_FILES);
//if (count($_FILES)){
    $tmp_files = $_FILES['testFile']['tmp_name'];
    $fileName = 'data/' . $_FILES['testFile']['name'];
    if (file_exists($fileName)) {
        echo 'Пожалуйста, переименуйте файл. Такой файл существует';
        die(1);
    }
//     echo '$tmp_files';
//     var_dump($tmp_files);
//     echo '</br>';
//    echo '$fileName';
//    var_dump($fileName);
//    echo '</br>';
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
        <!--    <link rel="stylesheet" href="css/admin.css">-->

    </head>
    <body>
    <!--[if lte IE 9]>
    <p>
        Ваш браузер устарел! Скачайте новую версию <a href="http://browsehappy.com/locale=ru_ru">браузера</a>
    </p>
    <![endif]-->
    <div class="wrapper wrapper_title">
        <div class="title">
            <div class="test">
                <h1>Загрузка тестов</h1>
            </div>
            <div class="form">
                <form method="post" enctype="multipart/form-data">
                    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                    <div>
                        <label for="testFile">Выберите файл с тестом:</label>
                        <!--                Отправить этот файл:-->
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
