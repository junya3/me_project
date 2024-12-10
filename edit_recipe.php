<?php
include_once dirname(__FILE__) . '/model/functions.php';

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

    $stmt = $dbh->prepare("UPDATE recipes SET title = ?, ingredients = ?, instructions = ? WHERE id = ?");
    $stmt->execute([$title, $ingredients, $instructions, $id]);
    header('Location: recipe.php?id=' . $id);
}

// Viewの読み込み
include_once dirname(__FILE__) . '/view/edit_recipe-view.php';
