<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

//ロジックの処理を取ってくる
$result = UserLogic::userList();
// print_r($result);

// $user_id = $_SESSION['user_id'];
// $user_id = 777777;
$shop_id = $_SESSION['shop_id'];
// var_dump($user_id);
// exit();

$output = "";
foreach ($result as $record) {
    $output .= "
    <tr>
    <td>{$record["name"]}</td>
    <td>{$record["genre"]}</td>
    <td>{$record["profile"]}</td>
    <td>{$record["URL"]}</td>
    <td><a href='like_create.php?user_id={$record["id"]}&shop_id={$shop_id}'>LIKE</a></td>
    </tr>
    ";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>ユーザーリスト</title>
</head>
<body>
    <img src="./images/dj.png" alt="猫のdj">
    <h2>ユーザーリスト</h2>
    <table>
        <thead>
            <tr>
                <th>NAME</th>
                <th>ジャンル</th>
                <th>プロフィール</th>
                <th>SOUNDCLOUD</th>
            </tr>
        </thead>
        <tbody>
            <?= $output ?>
        </tbody>
    </table>
    <a href="shop_signup_form.php">店舗新規登録</a><br>
    <a href="shop_list.php">店舗リスト</a><br>
    <a href="top.php">TOP</a>
    <!-----------------------------------------------------------------------------
    * フッター
    ------------------------------------------------------------------------------>
    <footer>
        <p><small>2022 G's FUKUOKA DEV10-08</small></p>
    </footer>
    <!-- <audio loop="loop" autoplay="autoplay" >
        <source type="audio/mpeg" src="./music/Justin Bieber - Peaches - DJ Serg Sniper Return Of The Mack Edit (Clean).mp3">
    </audio> -->
</body>
</html>