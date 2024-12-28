<!DOCTYPE html>
<html lang="ja">

<?php
$pageTitle = 'レシピ編集';
include_once __DIR__ . '../../components/head.php'; ?>

<body>
    <h1>レシピ編集</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($recipe['id']) ?>">
        <label>タイトル: <input type="text" name="title" value="<?= htmlspecialchars($recipe['title']) ?>" required></label><br>
        <label>材料: <textarea name="ingredients" required><?= htmlspecialchars($recipe['ingredients']) ?></textarea></label><br>
        <label>手順: <textarea name="instructions" required><?= htmlspecialchars($recipe['instructions']) ?></textarea></label><br>
        <label>画像: <input type="file" name="image"></label><br>
        <?php if (!empty($recipe['image'])): ?>
            <p>現在の画像:</p>
            <img src="<?= htmlspecialchars($recipe['image']) ?>" alt="現在の画像" style="max-width: 300px;">
        <?php endif; ?>
        <input type="submit" value="更新">
    </form>
    <p><a href="index.php">レシピ一覧に戻る</a></p>
</body>

</html>