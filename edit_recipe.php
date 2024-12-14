<?php
include_once dirname(__FILE__) . '/model/functions.php';

// DB接続情報
$dbname = 'mysql:dbname=recipe_share;host=localhost;charset=utf8;';
$user = 'root';
$password = '';
$dbh = new PDO($dbname, $user, $password);

// 編集フォーム
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $stmt = $dbh->prepare("SELECT * FROM recipes WHERE id = ?");
    $stmt->execute([$id]);
    $recipe = $stmt->fetch();
}

// 編集処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    // 画像処理
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // 画像がアップロードされた場合の処理
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $file_name = basename($_FILES['image']['name']);
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            $image_name = uniqid('img_', true) . '.' . $file_extension;
            $image_path = $image_name;

            if (move_uploaded_file($file_tmp, 'uploads/' .  $image_path)) {
                // 古い画像を削除（必要なら）
                if (!empty($recipe['image']) && file_exists($recipe['image'])) {
                    unlink($recipe['image']);
                }
            }
        } else {
            $image_path = $recipe['image']; // 既存画像を保持
        }
    } else {
        $image_path = $recipe['image']; // 画像がアップロードされていない場合、既存画像を保持
    }

    // データベース更新
    $stmt = $dbh->prepare("UPDATE recipes SET title = ?, ingredients = ?, instructions = ?, image = ? WHERE id = ?");
    $stmt->execute([$title, $ingredients, $instructions, $image_path, $id]);

    header('Location: recipe.php?id=' . $id);
    exit();
}

// Viewの読み込み
include_once dirname(__FILE__) . '/view/edit_recipe-view.php';
