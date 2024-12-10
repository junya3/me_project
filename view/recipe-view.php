<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>ユーザー登録</h1>

    <form action="register.php" method="POST">
        <label for="username">ユーザー名:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">登録</button>
    </form>

    <p><a href="login.php">ログイン画面へ戻る</a></p>
</body>

</html>