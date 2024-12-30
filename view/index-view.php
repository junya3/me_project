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
    if ($userId) {
        echo "ログイン中のユーザー: " . htmlspecialchars($userName);
    } else {
        echo 'ゲストさんようこそ';
    }
    ?>

    <ul class="recipe-items">
        <?php foreach ($recipes as $recipe): ?>
            <li>
                <a class="recipe-item" href="recipe.php?id=<?= $recipe['id'] ?>">
                    <!-- 画像の有無を確認 -->
                    <?php if (!empty($recipe['image']) && file_exists($file_path)): ?>
                        <img src="uploads/<?= htmlspecialchars($recipe['image']) ?>" alt="レシピ画像">
                    <?php else: ?>
                        <img src="assets/images/dummyIcon.png" alt="レシピ画像">
                    <?php endif; ?>
                    <h3><?= htmlspecialchars($recipe['title']) ?></h3>
                    <p><?= htmlspecialchars($recipe['ingredients']) ?></p>
                    <p><?= htmlspecialchars($recipe['instructions']) ?></p>
                </a>

                <?php
                // ファイルパスの生成
                $file_path = __DIR__ . '/../uploads/' . htmlspecialchars($recipe['image']);
                ?>


            </li>
        <?php endforeach; ?>



    </ul>
    <p><a href="post_recipe.php">レシピを投稿</a></p>
</body>

</html>