<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM recipes WHERE id = ?");
$stmt->execute([$id]);
$recipe = $stmt->fetch();

if (!$recipe) {
    die("レシピが見つかりません。");
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($recipe['title']) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1><?= htmlspecialchars($recipe['title']) ?></h1>
    <p>材料: <?= htmlspecialchars($recipe['ingredients']) ?></p>
    <p>手順: <?= htmlspecialchars($recipe['instructions']) ?></p>
    <p><a href="index.php">戻る</a></p>
</body>

</html>