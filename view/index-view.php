<!DOCTYPE html>
<html lang="ja">

<?php
$pageTitle = 'レシピ一覧';
include_once __DIR__ . '../../components/head.php';
?>

<body>
    <?php include_once __DIR__ . '../../components/header.php'; ?>

    <ul class="recipe-items">
        <?php foreach ($recipes as $recipe): ?>
            <?php
            // 画像が設定されていない場合に対応するため、初期値を設定
            $file_path = !empty($recipe['image'])
                ? __DIR__ . '/../uploads/' . htmlspecialchars($recipe['image'])
                : '';
            ?>
            <li>
                <a class="recipe-item" href="recipe.php?id=<?= $recipe['id'] ?>">
                    <!-- 画像の有無を確認 -->
                    <?php if (!empty($recipe['image']) && file_exists($file_path)): ?>
                        <img src="uploads/<?= htmlspecialchars($recipe['image']) ?>" alt="レシピ画像">
                    <?php else: ?>
                        <div class="no-image"></div>
                    <?php endif; ?>
                    <h3><?= htmlspecialchars($recipe['title']) ?></h3>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><a href="post_recipe.php" class="move-btn">レシピを投稿</a></p>
</body>

</html>