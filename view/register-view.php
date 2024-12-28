<!DOCTYPE html>
<html lang="ja">

<?php
$pageTitle = 'ユーザー登録';
include_once __DIR__ . '../../components/head.php'; ?>

<body>
    <h1>ユーザー登録</h1>
    <form method="post">
        <label>ユーザー名: <input type="text" name="username" required></label><br>
        <label>パスワード: <input type="password" name="password" required></label><br>
        <label>メールアドレス: <input type="email" name="email" required></label><br>
        <input type="submit" value="登録">
    </form>
    <p><a href="login.php">ログイン</a></p>
</body>

</html>