<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

//ロジックの処理を取ってくる
$result = UserLogic::userList2();
// print_r($result);

$output = "";
foreach ($result as $record) {
    $output .= "
    <tr>
    <td>{$record["shopname"]}</td>
    <td>{$record["genre"]}</td>
    <td>{$record["profile"]}</td>
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
    <title>店舗リスト</title>
</head>
<body>
    <img src="./images/sotsusei.jpeg" alt="クラブ">
    <h2>店舗リスト</h2>
    <table>
        <thead>
            <tr>
                <th>SHOP NAME</th>
                <th>ジャンル</th>
                <th>プロフィール</th>
            </tr>
        </thead>
        <tbody>
            <?= $output ?>
        </tbody>
    </table>
    <a href="shop_signup_form.php">店舗新規登録！</a><br>
    <a href="signup_form.php">DJ新規登録！</a><br>
    <a class="link" href="user_list.php">DJリスト</a><br>
    <a href="signup_form.php">TOP</a>
    <!-----------------------------------------------------------------------------
    * フッター
    ------------------------------------------------------------------------------>
    <footer>
        <p><small>2022 G's FUKUOKA DEV10-08</small></p>
    </footer>
    <audio loop="loop" autoplay="autoplay" >
        <source type="audio/mpeg" src="./music/Justin Bieber - Peaches - DJ Serg Sniper Return Of The Mack Edit (Clean).mp3">
    </audio>
</body>
</html>