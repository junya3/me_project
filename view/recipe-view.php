<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($recipe['title']) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1><?= htmlspecialchars($recipe['title']) ?></h1>
    <p>材料: <?= htmlspecialchars($recipe['ingredients']) ?></p>
    <p>手順: <?= htmlspecialchars($recipe['instructions']) ?></p>

    <!-- 編集ボタン -->
    <?php if ($recipe['user_id'] === $_SESSION['user_id']): ?>
        <a href="edit_recipe.php?id=<?= $recipe['id'] ?>">編集</a>
    <?php endif; ?>

    <!-- 削除ボタン -->
    <form action="delete_recipe.php" method="POST">
        <input type="hidden" name="id" value="<?= $recipe['id'] ?>">
        <button type="submit" name="delete">削除</button>
    </form>


    <p><a href="index.php">戻る</a></p>
</body>

</html>