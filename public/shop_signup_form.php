<?php
session_start();
require_once "../functions.php";
require_once "../classes/UserLogic.php";


//ロジックの処理を取ってくる
$result = UserLogic::checkLogin();
if($result) {
    header("Location: shopmypage.php");
    return;
}

$login_err = isset($_SESSION["login_err"]) ? $_SESSION["login_err"] : null;
unset($_SESSION["login_err"]);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>SHOP登録画面</title>
</head>
<body>
    <!---------------------------------------------------------------------------
    * ユーザー登録フォーム
    ------------------------------------------------------------------------------>
    <h2 id="form">SHOP登録フォーム</h2>
    <?php if(isset($login_err)) : ?>
        <p><?php echo $login_err; ?></p>
    <?php endif; ?>
    <form action="register2.php" method="POST" enctype="multipart/form-data">
        <p>
            <label for="shopname">SHOP名：</label>
            <input class="mado" type="text" name="shopname">
        </p>
        <p>
            <label for="email">メールアドレス：</label>
            <input class="mado" type="email" name="email">
        </p>
        <p>
        <label for="genre">ジャンル：</label>
        <select class="genre" name="genre">
            <option value="hiphopr&b">HIPHOP/R&B</option>
            <option value="reggae">REGGAE</option>
            <option value="EDM">EDM</option>
            <option value="anison">ANISON</option>
            <option value="kpop">KPOP</option>
        </select>
        </p>
        <p>
            <label for="profile">プロフィール：</label>
            <textarea name="profile"></textarea>
        </p>
        <p>
            <label for="img">PHOTO：</label>
            <input type="file" accept="image/*" capture="camera" name="img" />
        </p>
        <p>
            <label for="password">パスワード：</label>
            <input class="mado" type="password" name="password">
        </p>
        <p>
            <label for="password_conf">パスワード確認：</label>
            <input class="mado" type="password" name="password_conf">
        </p>
        <!-- <input type="hiddin" name="csrf_token" value="<?php echo h(setToken()); ?>"> -->
        <p>
            <input class="btn" type="submit" value="新規登録">
        </p>
    </form>
    <a href="login_form2.php">ログイン</a><br>
    <a href="shop_list.php">店舗リスト</a><br>
    <a href="user_list.php">DJリスト</a><br>
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