<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>HD</title>
</head>

<body>
    <div class="container">
        <?php require_once("template/header.php"); ?>
        <div class="content">
            <?php
            // Получаем параметр page из URL
            $page = isset($_GET['page']) ? $_GET['page'] : 'start'; // По умолчанию test1
            // Определяем путь к файлу
            $pageFile = "pages/$page.php";

            // Проверяем, существует ли файл
            if (file_exists($pageFile)) {
                include $pageFile; // Включаем нужный файл
            } else {
                include 'template/404.php'; // Страница не найдена
            }
            ?>

        </div>
        <?php require_once("template/footer.php") ?>
    </div>

</body>

</html>