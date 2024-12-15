<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($recipe['title']) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1><?= htmlspecialchars($recipe['title']) ?></h1>
    <p>材料: <?= nl2br(htmlspecialchars($recipe['ingredients'])) ?></p>
    <p>手順: <?= nl2br(htmlspecialchars($recipe['instructions'])) ?></p>

    <?php if ($recipe['image']): ?>
        <img src="uploads/<?= htmlspecialchars($recipe['image']) ?>" alt="Recipe Image" width="300">
    <?php endif; ?>
    <!-- 編集・削除ボタン -->
    <?php if ($recipe['user_id'] === $_SESSION['user_id']): ?>
        <form action="edit_recipe.php" method="GET">
            <input type="hidden" name="id" value="<?= $recipe['id'] ?>">
            <input type="submit" value="編集">
        </form>
        <form action="delete_recipe.php" method="POST" onsubmit="return confirm('本当に削除しますか？');">
            <input type="hidden" name="id" value="<?= $recipe['id'] ?>">
            <input type="submit" value="削除">
        </form>
    <?php endif; ?>




    <p><a href="index.php">戻る</a></p>
</body>

</html>