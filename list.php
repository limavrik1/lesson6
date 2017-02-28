<?php
/**
 * Created by PhpStorm.
 * User: MAV
 * Date: 25.02.2017
 * Time: 21:03
 */
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);

if (isset($_FILES['file-7'])) {
//    echo '$_FILES:';
//    var_dump($_FILES);
//    die(1);
    $tmp_files = $_FILES['file-7']['tmp_name'][0];
    $uploadedFile = 'data/' . $_FILES['file-7']['name'][0];
    if (file_exists($uploadedFile)) {
        echo 'Пожалуйста, переименуйте файл. Такой файл существует';
        echo '<br/><a href="list.php">Назад к загрузке</a>';
        die(1);
    }
    if (move_uploaded_file($tmp_files, $uploadedFile)) {
        echo 'File was uploaded successfully.';
    } else {
        echo 'There was a problem saving the uploaded file';
    }
    echo '<br/><a href="list.php">Back to Uploader</a>';
} else {
    ?>
    <!--        <form action="FileUpload.php" method="post" enctype="multipart/form-data">-->
    <!--            <label for="upload">File:</label>-->
    <!--            <input type="file" name="upload" id="upload"><br/>-->
    <!--            <input type="submit" name="submit" value="Upload">-->
    <!--        </form>-->
    <!DOCTYPE html>
    <html lang="ru-RU" class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Форма">
        <meta name="keywords" content="сайт, тесты, html, css">
        <meta name="author" content="Андрюс Микялёнис">
        <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">

        <title>Загрузка тестов</title>

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/demo.css"/>
        <link rel="stylesheet" href="css/component.css"/>
        <!--    <link rel="stylesheet" href="css/admin.css">-->
        <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    </head>
    <body>
    <!--[if lte IE 9]>
    <p>
        Ваш браузер устарел! Скачайте новую версию <a href="http://browsehappy.com/locale=ru_ru">браузера</a>
    </p>
    <![endif]-->
    <div class="container">
        <div class="content">
            <div class="box">
                <form name="form" method="post" enctype="multipart/form-data">
                <input type="file" name="file-7[]" id="file-7" class="inputfile inputfile-6"
                       data-multiple-caption="{count} files selected" multiple/>
                <label for="file-7"><span></span> <strong>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                        </svg>
                        Выбирети файл(ы)&hellip;</strong></label>
                 <div>
                     <input type="button" onclick="formSubmit()">
                     <label for="button"><span></span> <strong>
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                 <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                             </svg>Отправить</strong></label>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/custom-file-input.js"></script>
    </body>
    </html>
    <?php
}
?>


