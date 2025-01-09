<?php
// セッションを開始
session_start();

// セッション変数をすべて削除
session_unset();

// セッション自体を破棄
session_destroy();

// ログインページにリダイレクト
header('Location: index.php');
exit();
