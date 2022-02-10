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
    <!-----------------------------------------------------------------------------
    * COURSE
    ------------------------------------------------------------------------------>
    <section class="course" id="course">
        <div class="inner">
            <h3>COURSE</h3>
            <p>未経験からでもスタートができるよう、カリキュラムは多くの専門家や<br>現役DJのアドバイスのもと、作られました。
            </p>
        </div>
    </section>
    <div class="flex-items">
        <div class="flex-item">
            <div class="flex-item__img"><img src="kenshuu.jpeg" alt="実地研修"></div>
            <div class="flex-item__txt">
                <h2>本格的な大型CLUBを使った実地研修</h2>
                <p>DJアカデミーでは、本格的なCLUBを使った実地研修を<br>行うことができます。プロとして活躍するDJも<br>PLAYするような、大型CLUBで機材環境も整ったDJブースを余すところ<br>なく使い、卒業時には本格的なムーブメントを自分の力で作れる<br>実践力の養成を目指します。</p>
            </div>
        </div>
        <div class="flex-item">
            <div class="flex-item__img"><img src="koushuu.jpeg" alt="講習"></div>
            <div class="flex-item__txt">
                <h2>必要な知識もしっかりと取得</h2>
                <p>トラックリスト作りには、しっかりとした音楽に関する知識が<br>欠かせません。DJアカデミーでは、一流講師陣による、<br>トラックリスト作りに必要ないろはを余すところなく学べます。<br>DJそのものでなく、ムーブメントを起こす心理学全般を学ぶことも<br>可能ですので、DJ以外への展開も夢ではないでしょう。</p>
            </div>
        </div>
        <div class="flex-item">
            <div class="flex-item__img"><img src="sotsusei.jpeg" alt="リスニング"></div>
            <div class="flex-item__txt">
                <h2>卒業制作はリスニング審査あり</h2>
                <p>DJアカデミーでは最後の2ヶ月間で卒業制作を実施。<br>卒業制作として、外さないトラックリスト作りを実際に行います。卒業後、<br>一般クラバー参加によるリスニング審査があるため、作り手の<br>目線だけでなく、観客の目線から、卒業制作作品としての<br>DJ PLAYを、しっかりと評価いただくことができます。</p>
            </div>
        </div>
    </div>
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