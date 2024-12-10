<?php
include_once dirname(__FILE__) . '/model/functions.php';

// データの取得
$sql = 'SELECT * FROM recipes';
$recipes = getData($dbname, $user, $password, $sql);

// デフォルト値を設定
$recipes = $recipes ?? [];

// Viewの読み込み
include_once dirname(__FILE__) . '/view/index-view.php';
