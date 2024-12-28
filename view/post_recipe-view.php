<!DOCTYPE html>
<html lang="ja">

<?php
$pageTitle = 'レシピ投稿';
include_once __DIR__ . '../../components/head.php'; ?>

<body>
    <h1>レシピ投稿</h1>
    <form method="post" enctype="multipart/form-data">
        <label>タイトル: <input type="text" name="title" required></label><br>
        <label>材料: <textarea name="ingredients" required></textarea></label><br>
        <label>手順: <textarea name="instructions" required></textarea></label><br>
        <label>画像: <input type="file" name="image" accept="image/*"></label><br>
        <input type="submit" value="投稿">
    </form>

    <p><a href="index.php">レシピ一覧に戻る</a></p>

</body>

</html>