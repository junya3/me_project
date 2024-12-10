<?php
ini_set('display_errors', '1');

// DB接続情報
$dbname = 'mysql:dbname=recipe_share;host=localhost;charset=utf8;';
// データベース接続
$user = 'root';
$password = '';
$dbh = new PDO($dbname, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// セッション開始
session_start();

// DB接続用関数
function connectDb($dbname, $user, $password)
{
    try {
        // PDOでデータベース接続
        $dbh = new PDO($dbname, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラーモードを例外に設定
        return $dbh;
    } catch (PDOException $e) {
        // エラー処理
        die('接続に失敗しました: ' . $e->getMessage());
    }
}

// ログインチェック関数
function loginCheck()
{
    if (isset($_SESSION["user"])) {
        // セッション情報を表示（デバッグ用）
        var_dump($_SESSION["user"]);
        var_dump($_SESSION["mail"]);
        var_dump($_SESSION["password"]);
    } else {
        // ログインしていない場合はホームにリダイレクト
        header('Location: ./index.php');
        exit();
    }
}

// DBからデータを取得する関数
function getData($dbname, $user, $password, $sql)
{
    // DB接続
    $dbh = connectDb($dbname, $user, $password);

    // クエリ実行
    try {
        $stmt = $dbh->query($sql);
        $data = [];

        // データを取得
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        // DB切断
        $dbh = null;

        return $data;
    } catch (PDOException $e) {
        die('SQL実行エラー: ' . $e->getMessage());
    }
}

// データの挿入、更新、削除用関数
function setData($dbname, $user, $password, $sql, $params = [])
{
    // DB接続
    $dbh = connectDb($dbname, $user, $password);

    try {
        // クエリの準備
        $stmt = $dbh->prepare($sql);

        // SQL実行
        $stmt->execute($params);

        // DB切断
        $dbh = null;

        return true;
    } catch (PDOException $e) {
        // エラー処理
        die('SQL実行エラー: ' . $e->getMessage());
    }
}
