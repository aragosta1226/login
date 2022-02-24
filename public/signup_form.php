<?php
session_start();
require_once "../functions.php";
require_once "../classes/UserLogic.php";

//ロジックの処理を取ってくる
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
    <link rel="stylesheet" href="./css/style.css">
    <title>ユーザー登録画面</title>
</head>
<body>
    <!---------------------------------------------------------------------------
    * メインビジュアル
    ------------------------------------------------------------------------------>
    <div class="mainvisual">
        <img src="./images/top.png" width="100%" height="100%" alt="DJアカデミーのイメージ">
        <h1 class="main_title">DJ HUB</h1>
        <div class="text1">セカイを変えるDJになろう</div>
    </div>
    <!-----------------------------------------------------------------------------
    * ヘッダー
    ------------------------------------------------------------------------------>
    <header>
        <div class="header_contents">
            <nav class="header_nav">
                <ul class="header_nav_lists">
                    <li><a href="#about">ABOUT</a></li>
                    <li><a href="#course">COURSE</a></li>
                    <li><a href="#form">JOIN</a></li>
                    <li><a href="user_list.php">DJを呼びたい方はこちら</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-----------------------------------------------------------------------------
    * スライドショー
    ------------------------------------------------------------------------------>
    <div class="wrap slide-paused" ontouchstart="">
        <ul class="slideshow">
            <li class="content content-hover"><img src="./images/timmy.jpeg" alt="ティミー"></li>
            <li class="content content-hover"><img src="./images/armin.jpeg" alt="アーミン"></li>
            <li class="content content-hover"><img src="./images/hardwell.jpeg" alt="ハードウェル"></li>
            <li class="content content-hover"><img src="./images/avicii.jpeg" alt="アヴィーチー"></li>
        </ul>
        <ul class="slideshow">
        <li class="content content-hover"><img src="./images/timmy.jpeg" alt="ティミー"></li>
            <li class="content content-hover"><img src="./images/armin.jpeg" alt="アーミン"></li>
            <li class="content content-hover"><img src="./images/hardwell.jpeg" alt="ハードウェル"></li>
            <li class="content content-hover"><img src="./images/avicii.jpeg" alt="アヴィーチー"></li>
        </ul>
        <ul class="slideshow">
        <li class="content content-hover"><img src="./images/timmy.jpeg" alt="ティミー"></li>
            <li class="content content-hover"><img src="./images/armin.jpeg" alt="アーミン"></li>
            <li class="content content-hover"><img src="./images/hardwell.jpeg" alt="ハードウェル"></li>
            <li class="content content-hover"><img src="./images/avicii.jpeg" alt="アヴィーチー"></li>
        </ul>
    </div>
    <!-----------------------------------------------------------------------------
    * ABOUT
    ------------------------------------------------------------------------------>
    <section class="about" id="about">
        <div class="inner">
            <h3>ABOUT</h3>
            <p class="example1">DJ HUBについて</p>
            <p class="example2">DJ HUBは、DJとお店のマッチングサービスです。<p>
            <p class="example3">DJの素晴らしさを、現場を通じて、できるだけ多くの人に知っていただきたい。<br>そして、どの時代にもいつもダンスホールがあった、あの頃の当たり前をこの手で取り戻したい。</p>
            <p class="example4">そんな思いから、DJ HUBは歩みを始めています。</p>
        </div>
    </section>
    <!-----------------------------------------------------------------------------
    * COURSE
    ------------------------------------------------------------------------------>
    <section class="course" id="course">
        <div class="inner">
            <h3>COURSE</h3>
            <p>未経験からでもスタートができるよう、初回に限り５回まで<br>DJを無料にて呼べるサービスあり。
            </p>
        </div>
    </section>
    <div class="flex-items">
        <div class="flex-item">
            <div class="flex-item__img"><img src="./images/kenshuu.jpeg" alt="実地研修"></div>
            <div class="flex-item__txt">
                <h2>しっかりとプロが審査したDJのみエントリー出来る</h2>
                <p>DJ HUBでは、しっかりとプロがmixをヒアリングし、<br>現場に出れるレベルなのかどうかを<br>安心してオファー頂く為に審査いたします。</p>
            </div>
        </div>
        <div class="flex-item">
            <div class="flex-item__img"><img src="./images/livestreaming.png" alt="講習"></div>
            <div class="flex-item__txt">
                <h2>ライブ配信にも</h2>
                <p>最近ではライブ配信でDJ同士で繋がる事も増えてきました。<br>一緒に配信して欲しい等々<br>活用方法は無限大です。</p>
            </div>
        </div>
        <div class="flex-item">
            <div class="flex-item__img"><img src="./images/ranking.jpg" alt="リスニング"></div>
            <div class="flex-item__txt">
                <h2>ランキングにてホットなDJを紹介</h2>
                <p>DJ HUBでは週に一回ランキング更新を実施。<br>今一番売れてるDJが分かります。<br>推しのDJを見つけていただくことができます。</p>
            </div>
        </div>
    </div>
    <!---------------------------------------------------------------------------
    * ユーザー登録フォーム
    ------------------------------------------------------------------------------>
    <h2 id="form">ユーザー登録フォーム</h2>
    <?php if(isset($login_err)) : ?>
        <p><?php echo $login_err; ?></p>
    <?php endif; ?>
    <form action="register.php" method="POST">
        <div class="file-up">
            <label for="image">アーティスト写真：</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            <input type="file" name="image" accept="image/*">
        </div>
        <p>
            <label for="username">ユーザー名：</label>
            <input class="mado" type="text" name="username">
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
            <label for="soundcloud">SOUNDCLOUD URL：</label>
            <input class="mado" type="text" name="soundcloud">
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
    <a class="link" href="login_form.php">ログインする</a>
    <a class="link" href="user_list.php">DJ一覧</a>
    <a class="link" href="shop_list.php">店舗一覧</a>
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