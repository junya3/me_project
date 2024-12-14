<?php
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

    // 画像処理
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = basename($_FILES['image']['name']);
        // 実際に踏むリンクを設定
        $image_path =  $image_name;
        // このファイルからアップロードするパスを設定
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' .  $image_path);
    } else {
        $image_path = ''; // 画像がアップロードされていない場合は空
    }

    // データベースにレシピを挿入
    $sql_insert = "INSERT INTO recipes (user_id, title, ingredients, instructions, image) VALUES (?, ?, ?, ?, ?)";
    $params = [$user_id, $title, $ingredients, $instructions, $image_path];

    setData($dbname, $user, $password, $sql_insert, $params);

    // 成功したらインデックスページにリダイレクト
    header("Location: index.php");
    exit();
}

// Viewの読み込み
include_once dirname(__FILE__) . '/view/post_recipe-view.php';
