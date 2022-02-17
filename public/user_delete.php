<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

$result = UserLogic::deleteUser();

//今ログインしてるユーザーのデータを取ってくる
$login_user = $_SESSION["login_user"];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <form action="user_delete2.php" method="POST">
      <h2>ユーザー削除確認画面</h2>
      <p>name: <?= $login_user["name"] ?></p>
      <p>email: <?= $login_user["email"] ?></p>
      <input type="hidden" name="id" value="<?= $login_user["id"] ?>">
        <button class="btn">削除</button>
    </form>
    <a href="./signup_form.php">トップページへ</a>
    <!-----------------------------------------------------------------------------
    * フッター
    ------------------------------------------------------------------------------>
    <footer>
        <p><small>2022 G's FUKUOKA DEV10-08</small></p>
    </footer>
</body>
</html>