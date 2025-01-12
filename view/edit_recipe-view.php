<!DOCTYPE html>
<html lang="ja">

<?php
$pageTitle = 'レシピ編集';
include_once __DIR__ . '../../components/head.php'; ?>

<body>
    <?php include_once __DIR__ . '../../components/header.php'; ?>
    <main>
        <article>
            <h2><?= $pageTitle  ?></h2>
            <form method="post" enctype="multipart/form-data">
                <div class="edit-image">
                    <?php if (!empty($recipe['image'])): ?>
                        <p>現在の画像:</p>
                        <img src="./uploads/<?= htmlspecialchars($recipe['image']) ?>" alt="現在の画像">
                    <?php endif; ?>
                    <label>画像: <input type="file" name="image"></label><br>
                </div>
                <input type="hidden" name="id" value="<?= htmlspecialchars($recipe['id']) ?>">
                <label>タイトル: <input type="text" name="title" value="<?= htmlspecialchars($recipe['title']) ?>" required></label><br>
                <label>材料: <textarea name="ingredients" required><?= htmlspecialchars($recipe['ingredients']) ?></textarea></label><br>
                <label>手順: <textarea name="instructions" required><?= htmlspecialchars($recipe['instructions']) ?></textarea></label><br>


                <input type="submit" value="更新">
            </form>
            <p><a href="index.php" class="move-btn">レシピ一覧に戻る</a></p>
        </article>
    </main>
</body>

</html>