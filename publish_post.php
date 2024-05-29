<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Муркаленд - Публикация поста</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#1a1a1a">
<div class="topnav">
<h1 style="color: green">Муркаленд</h1>
<a href="index.php">Главная</a>
<a href="news.php">Новости</a>
<a href="new_post.html">Публикация поста</a>
</div>

<div style="color: white; padding: 20px;">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$post_title = htmlspecialchars($_POST["post_title"]);
$post_content = htmlspecialchars($_POST["post_content"]);

$file = 'posts.txt';
$new_post = $post_title . "
" . $post_content . ",END,
";

// Чтение текущего содержимого файла
$current_content = file_get_contents($file);

// Добавление нового поста в начало
$updated_content = $new_post . $current_content;

// Запись обновленного содержимого обратно в файл
if (file_put_contents($file, $updated_content, LOCK_EX)) {
echo "<h2>Пост успешно опубликован!</h2>";
echo "<p><a href='index.php'>Вернуться на главную</a></p>";
} else {
echo "<h2>Ошибка при публикации поста.</h2>";
}
}
?>
</div>
</body>
</html>