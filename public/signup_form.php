<?php
session_start();

require_once "../functions.php";
require_once "../classes/UserLogic.php";

$result = UserLogic::checkLogin();
if($result) {
    header("Location: mypage.php");
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
    <link rel="stylesheet" href="style.css">
    <title>ユーザー登録画面</title>
</head>
<body>
    <!---------------------------------------------------------------------------
    * メインビジュアル
    ------------------------------------------------------------------------------>
    <div class="mainvisual">
        <img src="top.png" width="100%" height="100%" alt="DJアカデミーのイメージ">
        <h1 class="main_title">セカイを変えるDJになろう</h1>
        <div class="text1">DJ職人養成学校「DJアカデミーFUKUOKA」</div>
    </div> 
    <!-----------------------------------------------------------------------------
    * スライドショー
    ------------------------------------------------------------------------------>
    <div class="wrap slide-paused" ontouchstart="">
        <ul class="slideshow">
            <li class="content content-hover"><img src="timmy.jpeg" alt="ティミー"></li>
            <li class="content content-hover"><img src="armin.jpeg" alt="アーミン"></li>
            <li class="content content-hover"><img src="hardwell.jpeg" alt="ハードウェル"></li>
            <li class="content content-hover"><img src="avicii.jpeg" alt="アヴィーチー"></li>
        </ul>
        <ul class="slideshow">
            <li class="content content-hover"><img src="timmy.jpeg" alt="ティミー"></li>
            <li class="content content-hover"><img src="armin.jpeg" alt="アーミン"></li>
            <li class="content content-hover"><img src="hardwell.jpeg" alt="ハードウェル"></li>
            <li class="content content-hover"><img src="avicii.jpeg" alt="アヴィーチー"></li>
        </ul>
        <ul class="slideshow">
            <li class="content content-hover"><img src="timmy.jpeg" alt="ティミー"></li>
            <li class="content content-hover"><img src="armin.jpeg" alt="アーミン"></li>
            <li class="content content-hover"><img src="hardwell.jpeg" alt="ハードウェル"></li>
            <li class="content content-hover"><img src="avicii.jpeg" alt="アヴィーチー"></li>
        </ul>   
    </div>
    <!-----------------------------------------------------------------------------
    * ABOUT
    ------------------------------------------------------------------------------>
    <section class="about" id="about">
        <div class="inner">
            <h3>ABOUT</h3>
            <p class="example1">DJアカデミーについて</p>
            <p class="example2">DJアカデミーは、DJ職人養成学校です。<p>
            <p class="example3">DJの素晴らしさを、現場を通じて、できるだけ多くの人に知っていただきたい。<br>そして、どの時代にもいつもダンスホールがあった、あの頃の当たり前をこの手で取り戻したい。</p>
            <p class="example4">そんな思いから、DJ職人養成学校「DJアカデミーFUKUOKA」は歩みを始めています。</p>
            <p class="example5">卒業後、現場獲得のバックアップはもちろんのこと、<br>DJ職人への就職・転職もサポートします。</p>
        </div>
    </section>
    <!---------------------------------------------------------------------------
    * ユーザー登録フォーム
    ------------------------------------------------------------------------------>
    <h2>ユーザー登録フォーム</h2>
    <?php if(isset($login_err)) : ?>
        <p><?php echo $login_err; ?></p>
    <?php endif; ?>
    <form action="register.php" method="POST">
        <p>
            <label for="username">ユーザー名：</label>
            <input class="mado" type="text" name="username">
        </p>
        <p>
            <label for="email">メールアドレス：</label>
            <input class="mado" type="email" name="email">
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
    <a href="login_form.php">ログインする</a>
</body>
</html>