<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

//ロジックの処理を取ってくる
$result = UserLogic::userList2();
// print_r($result);

$user_id = $_SESSION['user_id'];
// $shop_id = $_SESSION['shop_id'];

$output = "";
foreach ($result as $record) {
    $output .= "
    <tr>
    <td><img src='{$record["img"]}' height='150px'></td>
    <td>{$record["shopname"]}</td>
    <td>{$record["genre"]}</td>
    <td>{$record["profile"]}</td>
    <td><a href='like_create2.php?shop_id={$record["id"]}&user_id={$user_id}'>LIKE</a></td>
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
    <title>店舗LIST</title>
</head>
<body>
    <img src="./images/sotsusei.jpeg" alt="クラブ">
    <h2>店舗LIST</h2>
    <table>
        <thead>
            <tr>
                <th>SHOP NAME</th>
                <th>GENRE</th>
                <th>PROFILE</th>
            </tr>
        </thead>
        <tbody>
            <?= $output ?>
        </tbody>
    </table>
    <a href="shop_signup_form.php">店舗新規登録！</a><br>
    <a href="signup_form.php">DJ新規登録！</a><br>
    <a class="link" href="user_list.php">DJリスト</a><br>
    <a href="top.php">TOP</a>
    <!-----------------------------------------------------------------------------
    * フッター
    ------------------------------------------------------------------------------>
    <footer>
        <p><small>2022 G's FUKUOKA DEV10-10</small></p>
    </footer>
    <!-- <audio loop="loop" autoplay="autoplay" >
        <source type="audio/mpeg" src="./music/Justin Bieber - Peaches - DJ Serg Sniper Return Of The Mack Edit (Clean).mp3">
    </audio> -->
</body>
</html>