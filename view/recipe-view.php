<!DOCTYPE html>
<html lang="ja">

<?php
$pageTitle = htmlspecialchars($recipe['title']) . 'のレシピ';
include_once __DIR__ . '../../components/head.php'; ?>

<body>
    <?php include_once __DIR__ . '../../components/header.php'; ?>
    <h2><?= htmlspecialchars($recipe['title']) ?></h2>
    <p>材料: <?= nl2br(htmlspecialchars($recipe['ingredients'])) ?></p>
    <p>手順:<br> <?= nl2br(htmlspecialchars($recipe['instructions'])) ?></p>

    <?php if ($recipe['image']): ?>
        <img src="uploads/<?= htmlspecialchars($recipe['image']) ?>" alt="Recipe Image" width="300">
    <?php endif; ?>
    <!-- 編集・削除ボタン -->
    <?php if (isset($_SESSION['user_id']) && $recipe['user_id'] === $_SESSION['user_id']): ?>
        <form action="edit_recipe.php" method="GET">
            <input type="hidden" name="id" value="<?= htmlspecialchars($recipe['id'], ENT_QUOTES, 'UTF-8') ?>">
            <input type="submit" value="編集">
        </form>
        <form action="delete_recipe.php" method="POST" onsubmit="return confirm('本当に削除しますか？');">
            <input type="hidden" name="id" value="<?= htmlspecialchars($recipe['id'], ENT_QUOTES, 'UTF-8') ?>">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
            <input type="submit" value="削除">
        </form>
    <?php endif; ?>




    <p><a href="index.php" class="move-btn">戻る</a></p>
</body>

</html>