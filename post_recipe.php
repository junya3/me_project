<?php
include_once dirname(__FILE__) . '/model/functions.php';

// データの取得
$sql = 'SELECT * FROM recipes';
$recipes = getData($dbname, $user, $password, $sql);

// デフォルト値を設定
$recipes = $recipes ?? [];

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    // 画像アップロード処理（省略）

    $stmt = $pdo->prepare("INSERT INTO recipes (user_id, title, ingredients, instructions, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $title, $ingredients, $instructions, '']); // 画像のパスを指定
    header("Location: index.php");
    exit();
}

// Viewの読み込み
include_once dirname(__FILE__) . '/view/post_recipe-view.php';
