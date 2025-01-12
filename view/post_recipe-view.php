<!DOCTYPE html>
<html lang="ja">

<?php
$pageTitle = 'レシピ投稿';
include_once __DIR__ . '../../components/head.php'; ?>

<body>
    <?php include_once __DIR__ . '../../components/header.php'; ?>
    <main>
        <article>
            <h2><?= $pageTitle  ?></h2>
            <form method="post" enctype="multipart/form-data">
                <label>タイトル: <input type="text" name="title" required></label><br>
                <label>材料: <textarea name="ingredients" required></textarea></label><br>
                <label>手順: <textarea name="instructions" required></textarea></label><br>
                <label>画像: <input type="file" name="image" accept="image/*"></label><br>
                <input type="submit" value="投稿">
            </form>
            <p><a href="index.php" class="move-btn">レシピ一覧に戻る</a></p>
        </article>
    </main>
</body>

</html>