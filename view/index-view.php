<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>レシピ一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>レシピ一覧</h1>
    <p><a href="login.php">ログイン</a> | <a href="register.php">ユーザー登録</a> | <a href="logout.php">ログアウト</a></p>

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

                <!-- デバッグ情報の出力 -->
                <!-- <pre>
                    <?php
                    echo "デバッグ情報:\n";
                    echo "recipe['image']: ";
                    var_dump($recipe['image']);
                    echo "file_path: ";
                    var_dump($file_path);
                    echo "file_exists: ";
                    var_dump(file_exists($file_path));
                    echo "ディレクトリ確認 (__DIR__): ";
                    var_dump(__DIR__);
                    echo "アップロードディレクトリの中身:\n";
                    $uploads_dir = __DIR__ . '/uploads/';
                    if (is_dir($uploads_dir)) {
                        var_dump(scandir($uploads_dir));
                    } else {
                        echo "uploads ディレクトリが存在しません。\n";
                    }
                    ?>
        </pre> -->
            </li>
        <?php endforeach; ?>



    </ul>
    <p><a href="post_recipe.php">レシピを投稿</a></p>
</body>

</html>