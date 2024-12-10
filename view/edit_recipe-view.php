<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>レシピ編集</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($recipe['id']) ?>">
        <label>タイトル: <input type="text" name="title" value="<?= htmlspecialchars($recipe['title']) ?>" required></label><br>
        <label>材料: <textarea name="ingredients" required><?= htmlspecialchars($recipe['ingredients']) ?></textarea></label><br>
        <label>手順: <textarea name="instructions" required><?= htmlspecialchars($recipe['instructions']) ?></textarea></label><br>
        <input type="submit" value="更新">
    </form>
    <p><a href="index.php">レシピ一覧に戻る</a></p>


</body>

</html>