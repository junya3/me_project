<?php
include_once dirname(__FILE__) . '/model/functions.php';

// DB接続情報
$dbname = 'mysql:dbname=recipe_share;host=localhost;charset=utf8;';
$user = 'root';
$password = '';

// DB接続
$pdo = connectDb($dbname, $user, $password);

// IDを取得
$id = $_GET['id'];

// レシピのデータを取得
$stmt = $pdo->prepare("SELECT * FROM recipes WHERE id = ?");
$stmt->execute([$id]);
$recipe = $stmt->fetch();

// レシピが存在しない場合
if (!$recipe) {
    die("レシピが見つかりません。");
}

// Viewの読み込み
include_once dirname(__FILE__) . '/view/recipe-view.php';
