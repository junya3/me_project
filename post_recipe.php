<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    // 画像アップロード処理（省略）

    $stmt = $pdo->prepare("INSERT INTO recipes (user_id, title, ingredients, instructions, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $title, $ingredients, $instructions, '']); // 画像のパスを指定
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>レシピ投稿</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>レシピ投稿</h1>
    <form method="post">
        <label>タイトル: <input type="text" name="title" required></label><br>
        <label>材料: <textarea name="ingredients" required></textarea></label><br>
        <label>手順: <textarea name="instructions" required></textarea></label><br>
        <input type="submit" value="投稿">
    </form>
    <p><a href="index.php">レシピ一覧に戻る</a></p>
</body>

</html>