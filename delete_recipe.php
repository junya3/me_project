<?php
session_start();
include_once dirname(__FILE__) . '/model/functions.php';

// DB接続情報
$dbname = 'mysql:dbname=recipe_share;host=localhost;charset=utf8;';
$user = 'root';
$password = '';

// DB接続
$pdo = new PDO($dbname, $user, $password);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // 作成者チェック
    $stmt = $pdo->prepare("SELECT user_id FROM recipes WHERE id = ?");
    $stmt->execute([$id]);
    $recipe = $stmt->fetch();

    if ($recipe['user_id'] == $_SESSION['user_id']) {
        // 削除処理
        $stmt = $pdo->prepare("DELETE FROM recipes WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: index.php');
    } else {
        echo "権限がありません。";
    }
}
