<!DOCTYPE html>
<html lang="ja">

<?php
$pageTitle = 'レシピ一覧';
include_once __DIR__ . '../../components/head.php';
?>

<body>
    <h1>レシピ一覧</h1>
    <p><a href="login.php">ログイン</a> | <a href="register.php">ユーザー登録</a> | <a href="logout.php">ログアウト</a></p>

    <?php
    echo $userId;
    echo $userName;
    ?>

    <ul>
        <?php foreach ($recipes as $recipe): ?>
            <li>
                <a href="recipe.php?id=<?= $recipe['id'] ?>"><?= htmlspecialchars($recipe['title']) ?></a>
                <p><?= htmlspecialchars($recipe['ingredients']) ?></p>
                <p><?= htmlspecialchars($recipe['instructions']) ?></p>

                <?php
                // ファイルパスの生成
                $file_path = __DIR__ . '/../uploads/' . htmlspecialchars($recipe['image']);
                ?>

                <!-- 画像の有無を確認 -->
                <?php if (!empty($recipe['image']) && file_exists($file_path)): ?>
                    <img src="uploads/<?= htmlspecialchars($recipe['image']) ?>" alt="レシピ画像" style="max-width: 200px; height: auto;">
                <?php else: ?>
                    <p>画像はありません。</p>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>



    </ul>
    <p><a href="post_recipe.php">レシピを投稿</a></p>
</body>

</html>