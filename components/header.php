<?php
ini_set('display_errors', 1);

// セッション変数の確認
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $userId = $_SESSION['user_id'];
    $userName = $_SESSION['username'];
} else {
    // セッション変数が設定されていない場合の処理
    $userId = null;  // 未設定の場合はnullを設定
    $userName = "ゲスト";  // デフォルトのユーザー名
}
?>

<header>
    <h1><a href="index.php">レシピ一覧</a></h1>
    <nav>
        <div class="h_user">
            <p>ようこそ、<b><?= $userName ?></b>さん</p>
        </div>
        <ul>
            <?php if ($userId): ?>
                <li style="background:#333;"><a href="post_recipe.php" style="color:#fff;">レシピを投稿</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            <?php else: ?>
                <!-- ログインしていない場合はログインページへのリンクを表示 -->
                <li><a href="login.php">ログイン</a></li>
                <li><a href="register.php">ユーザー登録</a></li>
            <?php endif; ?>

        </ul>
    </nav>
</header>