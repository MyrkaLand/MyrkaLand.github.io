<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Муркаленд</title>

<style>
.rounded-rectangle {
width: 400px;
height: auto; /* Автоматическая высота для текста */
background-color: limegreen; /* Заливка зеленым цветом */
border: 5px solid green; /* Ярко-зеленый контур */
border-radius: 15px; /* Скругленные углы */
padding: 10px; /* Внутренние отступы */
margin: 20px 0; /* Внешние отступы */
color: white; /* Цвет текста */
}

.post-title {
font-size: 24px; /* Размер текста для первой строки */
font-weight: bold; /* Жирный шрифт */
margin-bottom: 5px; /* Отступ снизу */
text-align: center; /* Выравнивание текста */
color: white;
}

.post-content {
font-size: 16px; /* Размер текста для остальных строк */
text-align: left; /* Выравнивание текста */
}
</style>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#1a1a1a">
<h1 style="color: white">Муркаленд</h1>
<div class="topnav">
<a class="active" href="index.php">Главная</a>
<a href="news.php">Новости</a>
<a href="new_post.html">Публикация поста</a>
</div>

<h3 style="color: white">Привет! Это сайт Муркаленд.</h3>
<text>Тут можно можно просматривать посты про котиков!</text>

<div class="php">
<?php
$file = 'posts.txt';

// Читаем содержимое файла в строку
$content = file_get_contents($file);

// Проверяем, удалось ли прочитать файл
if ($content !== false) {
$posts = explode(',END,', $content); // Разделяем посты по строке ',END,'
$counter = 0; // Счетчик постов
foreach ($posts as $post) {
if ($counter >= 5) break; // Останавливаем цикл после 5 постов
$post = trim($post); // Убираем лишние пробелы
$lines = explode("
", $post); // Разделяем пост на строки
$title = array_shift($lines); // Первая строка - заголовок
$content = nl2br(implode("
", $lines)); // Остальные строки - контент
$id = urlencode(strtolower(str_replace(' ', '-', $title))); // Создаем идентификатор из заголовка
echo '<div class="rounded-rectangle">';
echo '<div class="post-title"><a style="color: white"href="news.php#' . $id . '" id="' . $id . '">' . $title . '</a></div>';
echo '<div class="post-content">' . $content . '</div>';
echo '</div>';
$counter++; // Увеличиваем счетчик постов
}
} else {
echo '<div class="rounded-rectangle">Не удалось прочитать файл.</div>';
}
?>
</div>
</body>
</html>