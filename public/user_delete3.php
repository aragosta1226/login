<?php
session_start();
require_once '../classes/UserLogic.php';

//ログアウトするロジックの処理を取ってくる
UserLogic::logout();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>削除完了</title>
</head>
<body>
    <h2>削除完了</h2>
    <p>アカウントを削除しました！</p>
    <a href="./signup_form.php">TOP</a>
    <!-----------------------------------------------------------------------------
    * フッター
    ------------------------------------------------------------------------------>
    <footer>
        <p><small>2022 G's FUKUOKA DEV10-08</small></p>
    </footer>
    <!-- <audio loop="loop" autoplay="autoplay" > 
        <source type="audio/mpeg" src="./music/Joel Corry x MNEK - Head & Heart.mp3">
    </audio> -->
</body>
</html>

