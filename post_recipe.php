<?php
ini_set('display_errors', '1');

// functions.phpをインクルード
include_once dirname(__FILE__) . '/model/functions.php';

// セッションが開始されていない場合のみ、session_start() を呼び出す
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// DB接続情報
$dbname = 'mysql:dbname=recipe_share;host=localhost;charset=utf8;';
$user = 'root';
$password = '';

// ログインチェック
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// DBからデータを取得する
$sql = 'SELECT * FROM recipes';
$recipes = getData($dbname, $user, $password, $sql);

// デフォルト値を設定
$recipes = $recipes ?? [];

// レシピ投稿処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームから送信されたデータを取得
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    // 画像アップロード処理（未実装の場合は空文字を指定）
    $image = ''; // 画像処理を後で実装

    // データベースにレシピを挿入
    $sql_insert = "INSERT INTO recipes (user_id, title, ingredients, instructions, image) VALUES (?, ?, ?, ?, ?)";
    $params = [$user_id, $title, $ingredients, $instructions, $image];

    setData($dbname, $user, $password, $sql_insert, $params);

    // 成功したらインデックスページにリダイレクト
    header("Location: index.php");
    exit();
}

// Viewの読み込み
include_once dirname(__FILE__) . '/view/post_recipe-view.php';
