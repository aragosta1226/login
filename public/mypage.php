<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

//ログインしているか判定し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();

if(!$result) {
    $_SESSION["login_err"] = "ユーザーを登録してログインしてください！";
    header("Location: signup_form.php");
    return;
}

$login_user = $_SESSION["login_user"];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>マイページ</title>
</head>
<body>
    <h2>マイページ</h2>
    <p>ログインユーザー：<?php echo h($login_user["name"]) ?></p>
    <p>メールアドレス：<?php echo h($login_user["email"]) ?></p>
    <form action="logout.php" method="POST">
        <input class="btn" type="submit" name="logout" value="ログアウト">
    </form>
    <!-- <a href="./login.php">ログアウト</a> -->
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