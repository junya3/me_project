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

    // 対応するファイル形式
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // アップロードされたファイル情報を取得
        $file_name = basename($_FILES['image']['name']);
        $file_tmp = $_FILES['image']['tmp_name'];

        // 拡張子を取得して小文字に変換
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // 拡張子が許可されているか確認
        if (in_array($file_extension, $allowed_extensions)) {
            // ファイル保存用のユニークな名前を生成（重複防止）
            $image_name = uniqid('img_', true) . '.' . $file_extension;

            // アップロード先のパスを設定
            $image_path =  $image_name;

            // ファイルを移動 この際アップロード先と実際のURLを間違えないように
            if (move_uploaded_file($file_tmp, 'uploads/' . $image_path)) {
                // アップロード成功
            } else {
                // ファイル移動に失敗した場合
                $image_path = '';
                echo "ファイルの保存に失敗しました。";
            }
        } else {
            // 許可されていない拡張子の場合
            $image_path = '';
            echo "許可されていないファイル形式です。対応形式: " . implode(', ', $allowed_extensions);
        }
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
