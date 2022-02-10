<?php
session_start();
require_once '../classes/UserLogic.php';

if(!$logout = filter_input(INPUT_POST, "logout")) {
    exit("不正なリクエストです。");
}

//ログインしているか判定し、セッションが切れていたらログインしてくださいとメッセージを出す。
$result = UserLogic::checkLogin();

if(!$result) {
    exit("セッションが切れましたので、ログインし直してください。");
}

//ログアウトする
UserLogic::logout();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ログアウト</title>
</head>
<body>
    <h2>ログアウト完了</h2>
    <p>ログアウトしました！</p>
    <a href="login_form.php">ログイン画面へ</a>
    <!-----------------------------------------------------------------------------
    * フッター
    ------------------------------------------------------------------------------>
    <footer>
        <p><small>2022 G's FUKUOKA DEV10-06</small></p>
    </footer>
    <audio loop="loop" autoplay="autoplay" > 
        <source type="audio/mpeg" src="Joel Corry x MNEK - Head & Heart.mp3">
    </audio>
</body>
</html>