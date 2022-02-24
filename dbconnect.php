<?php
require_once 'env.php';
ini_set('display_errors', true);

function connect() {
    $host = DB_HOST;
    $db   = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;

    $dsn  = "mysql:host=$host; dbname=$db; charset=utf8mb4";

    //エラーを検知するためにtry.catchで囲む
    try {
        $pdo = new PDO($dsn, $user, $pass, [
            //エラーのモードを決める
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            //配列が大きいと必ずバリューで返す
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        // echo "成功です！";
        return $pdo;
    } catch (PDOExeption $e) {
        echo "接続失敗です！". $e -> getMessage();
        exit();
    }
}

// echo connect();