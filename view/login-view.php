<!DOCTYPE html>
<html lang="ja">

<?php
$pageTitle = 'ログインページ';
include_once __DIR__ . '../../components/head.php'; ?>

<body>
    <h1>ログイン</h1>
    <form method="post">
        <label>ユーザー名: <input type="text" name="username" required></label><br>
        <label>パスワード: <input type="password" name="password" required></label><br>
        <input type="submit" value="ログイン">
    </form>
    <p><a href="register.php">ユーザー登録</a></p>
</body>

</html>