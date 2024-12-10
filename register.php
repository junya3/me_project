<?php
include_once dirname(__FILE__) . '/model/functions.php';

// DB接続情報
$dbname = 'mysql:dbname=recipe_share;host=localhost;charset=utf8;';
$user = 'root';
$password = '';

// DB接続
$pdo = connectDb($dbname, $user, $password);

// ユーザーがフォームを送信した場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    // ユーザー名の重複チェック
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $userCount = $stmt->fetchColumn();

    if ($userCount > 0) {
        // ユーザー名がすでに存在する場合
        echo "そのユーザー名はすでに使用されています。別のユーザー名を選んでください。";
    } else {
        // メールアドレスの重複チェック
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $emailCount = $stmt->fetchColumn();

        if ($emailCount > 0) {
            // メールアドレスがすでに存在する場合
            echo "そのメールアドレスはすでに使用されています。別のメールアドレスを選んでください。";
        } else {
            // ユーザー名もメールアドレスも重複していなければ、新規登録処理
            $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
            if ($stmt->execute([$username, $password, $email])) {
                // 登録後、ログイン画面にリダイレクト
                header("Location: login.php");
                exit();
            } else {
                echo "登録に失敗しました！";
            }
        }
    }
}

// Viewの読み込み
include_once dirname(__FILE__) . '/view/register-view.php';
