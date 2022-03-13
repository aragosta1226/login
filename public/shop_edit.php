<?php
session_start();
require_once "../functions.php";
require_once "../classes/UserLogic.php";

//ロジックの処理を取ってくる
$result = UserLogic::editUser2();

//今ログインしてるユーザーのデータを取ってくる
$login_user = $_SESSION["login_user"];


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>ユーザー編集画面</title>
</head>

<body>
  <form action="shop_update.php" method="POST" enctype="multipart/form-data">
      <h2>ユーザー編集画面</h2>
      <p>name: <input class="mado" type="text" name="shopname" value="<?= $login_user["shopname"] ?>"></p>
      <p>email: <input class="mado" type="email" name="email" value="<?= $login_user["email"] ?>"></p>
      <p>genre: <input class="mado" type="text" name="genre" value="<?= $login_user["genre"] ?>"></p>
      <p>profile: <input class="mado" type="text" name="profile" value="<?= $login_user["profile"] ?>"></p>
      <p>PHOTO：<input type="file" accept="image/*" capture="camera" name="img" /></p>
      <p>password: <input class="mado" type="password" name="password" value="<?= $login_user["password"] ?>"></p>
      <div>
        <input type="hidden" name="id" value="<?= $login_user["id"] ?>">
      </div>
      <div>
        <button class="btn">完了</button>
      </div>
  </form>
  <form action="shop_delete.php" method="POST">
        <input type="hidden" name="id" value="<?= $login_user["id"] ?>">
        <input class="btn" type="submit" name="edit" value="削除する">
  </form>
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