<?php
include_once dirname(__FILE__) . '/model/functions.php';

// データベース接続
$dbh = new PDO($dbname, $user, $password);

// データの取得
$sql = 'SELECT * FROM recipes';
$recipes = getData($dbname, $user, $password, $sql);

// デフォルト値を設定
$recipes = $recipes ?? [];

// Viewの読み込み
include_once dirname(__FILE__) . '/view/login-view.php';

// POSTリクエストがあった場合、ログイン処理を行う
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ユーザー情報をデータベースから取得
    $stmt = $dbh->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // パスワード照合
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username']; // セッションにユーザー名を保存
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
