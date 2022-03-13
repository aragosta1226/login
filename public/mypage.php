<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

//ログインしているか判定し、していなかったら新規登録画面へ返す
//ロジックの処理を取ってくる
$result = UserLogic::checkLogin();

if(!$result) {
    $_SESSION["login_err"] = "ユーザーを登録してログインしてください！";
    header("Location: signup_form.php");
    return;
}

//ログインしているユーザーのデータを取ってくる
$login_user = $_SESSION["login_user"];

// $output = "";
// foreach ($result as $login_user) {
//   $output .= "";
// }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>マイページ</title>
</head>
<body>
    <h2>マイページ</h2>
    <!-- <img src="./images/photo.png" alt="画像"> -->
    <img src='<?php echo h($login_user["img"])?>' height="300px"/>
    <p>NAME：<?php echo h($login_user["name"]) ?></p>
    <p>EMAIL：<?php echo h($login_user["email"]) ?></p>
    <p>GENRE：<?php echo h($login_user["genre"]) ?></p>
    <p>PROFILE：<?php echo h($login_user["profile"]) ?></p>
    <p>SOUNDCLOUD URL：<?php echo h($login_user["URL"]) ?></p>
    <input type="hidden" name="id" value="<?= $login_user["id"] ?>">
    <form action="user_edit.php" method="POST">
        <input class="btn" type="submit" name="edit" value="編集する">
    </form>
    <form action="logout.php" method="POST">
        <input class="btn" type="submit" name="logout" value="ログアウト">
    </form>
    <a href="signup_form.php">TOP</a>
    <a href="shop_list.php">店舗リスト</a><br>
    <!-- <a href="./login.php">ログアウト</a> -->
    <!-----------------------------------------------------------------------------
    * フッター
    ------------------------------------------------------------------------------>
    <footer>
        <p><small>2022 G's FUKUOKA DEV10-10</small></p>
    </footer>
    <!-- <audio loop="loop" autoplay="autoplay" > 
        <source type="audio/mpeg" src="./music/LOOSE YOURSELF.mp3">
    </audio> -->
</body>
</html>