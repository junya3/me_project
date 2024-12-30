<?php
include_once dirname(__FILE__) . '/model/functions.php';

// データの取得
$sql = 'SELECT * FROM recipes';
$recipes = getData($dbname, $user, $password, $sql);

// セッション変数の確認
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $userId = $_SESSION['user_id'];
    $userName = $_SESSION['username'];
} else {
    // セッション変数が設定されていない場合の処理
    $userId = null;  // 未設定の場合はnullを設定
    $userName = "ゲスト";  // デフォルトのユーザー名
    echo "ログインしていません";
}

// デフォルト値を設定
$recipes = $recipes ?? [];

// Viewの読み込み
include_once dirname(__FILE__) . '/view/index-view.php';
