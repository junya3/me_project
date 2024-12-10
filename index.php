<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM recipes ORDER BY created_at DESC");
$recipes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>レシピ一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>レシピ一覧</h1>
    <p><a href="login.php">ログイン</a> | <a href="register.php">ユーザー登録</a></p>
    <ul>
        <?php foreach ($recipes as $recipe): ?>
            <li>
                <a href="recipe.php?id=<?= $recipe['id'] ?>"><?= htmlspecialchars($recipe['title']) ?></a>
                <p><?= htmlspecialchars($recipe['ingredients']) ?></p>
                <p><?= htmlspecialchars($recipe['instructions']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <p><a href="post_recipe.php">レシピを投稿</a></p>
</body>

</html>