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

mb_internal_encoding('UTF-8');

if (!empty($_POST) && isset($_GET['id'])) {
    $testId = filter_input(INPUT_GET, 'id');
    if ($testId !== NULL || $testId !== false) {
        if ($testContents = file_get_contents($testId)) {
            $results = json_decode($testContents, true);
            $title = $results['title'];
            $questionCount = count($results['data']);
            $postCount = count($_POST);
            $inputValueCount = array();

            for ($i = 0; $i < $questionCount; $i++) {
                $inputValueCount[] = count($results['data'][$i]['inputValue']);
            }
            ?>
            <!DOCTYPE html>
            <html lang="ru-RU">

            <head>
                <meta charset="UTF-8">
                <meta name="description" content="Результаты теста">
                <meta name="keywords" content="сайт, тесты, html, css">
                <meta name="author" content="Андрюс Микялёнис">
                <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">

                <title>Результаты теста</title>

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
                <h1>Результаты теста: <?= $title ?></h1>
            </div>
            <div class="result">
            <?php
            $resultScore = 0;
            $dataID = 0;
            foreach ($_POST as $questionKey => $questionValue) {
                for ($id = 0; $id < $inputValueCount[$dataID]; $id++) {
                    if ($questionValue === $results['data'][$dataID]['inputValue'][$id]) {
                        $resultScore += $results['data'][$dataID]['inputValueScore'][$id];
                    }
                }
                $dataID++;
            }
            echo '<strong>Правильно: ' . $resultScore . " из $postCount </strong></br>";
//            echo '<br/><a href="list.php">Назад к списку тестов</a>'; ?>

            <div class="file-upload btn btn-info">
                <a href="list.php">Назад к списку тестов</a>
            </div>
            <?php
//            die (1);
        }
        ?>
        </div>
        </div>
    </div>
    </body>
        </html>
        <?php
    } else {
        echo 'Неправильный номер теста';
        echo '<br/><a href="list.php">Назад к списку тестов</a>';
        die (0);
    }

} else {
    $testId = filter_input(INPUT_GET, 'id');
    if ($testId !== NULL || $testId !== false) {
        if ($testContents = file_get_contents($testId)) {
            $results = json_decode($testContents, true);
            $title = $results['title'];
            $questionCount = count($results['data']);
            $inputValueCount = array();

            for ($i = 0; $i < $questionCount; $i++) {
                $inputValueCount[] = count($results['data'][$i]['inputValue']);
            }
            ?>
            <!DOCTYPE html>
            <html lang="ru-RU">

            <head>
                <meta charset="UTF-8">
                <meta name="description" content="Форма">
                <meta name="keywords" content="сайт, тесты, html, css">
                <meta name="author" content="Андрюс Микялёнис">
                <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">

                <title>Тестирование</title>

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
            <div class="wrapper wrapper_title">
            <div class="content">
            <h1><?= $title ?></h1>
            <form method="post" target="_blank">
            <ol>
            <div class="list__div">
            <?php
            for ($li = 0; $li < $questionCount; $li++) {
                echo '<div class="div_li">';
                echo '<li>';
                echo '<h3>' . $results['data'][$li]['question'] . '</h3>';
                echo '<div class="questions">';
                for ($divCount = 0; $divCount < $inputValueCount[$li]; $divCount++) {
                    echo '<div class="question">';
                    $inputValue = $results['data'][$li]['inputValue'][$divCount];
                    echo '<input type="' . $results['data'][$li]['inputType'] . '" name="question-answers-' . $li . '" id="question-answers-' . $li . '-' . $inputValue . '" value="' . $inputValue . '"/>';
                    echo '<label for="question-answers-' . $li . '-' . $inputValue . '">' . $results['data'][$li]['inputLabelValue'][$divCount] . '</label>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</li>';
                echo '</div>';
            }
        }
        ?>
        </div>
        </ol>
        <div>
            <button class="file-upload btn btn-info">Отправить</button>
        </div>
        </form>
        </div>
    </div>
    </body>
        </html>
        <?php
    } else {
        echo 'Неправильный номер теста';
        echo '<br/><a href="list.php">Назад к списку тестов</a>';
        die (0);
    }
}
?>