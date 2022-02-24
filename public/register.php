<?php
session_start();
require_once '../classes/UserLogic.php';
// ini_set("display_errors", 'On');
// error_reporting(E_ALL);
//エラーメッセージ
$err = [];

// var_dump($_POST);
// exit();

//二重アクセスの対策
$token = filter_input(INPUT_POST, "csrf_token");
// トークンがない、もしくは一致しない場合、処理を中止
// if(!isset($_SESSION["csrf_token"])|| $token !== $_SESSION["csrf_token"])
if(!isset($_SESSION["csrf_token"])){
    exit("不正なリクエスト");//再読み込みしても出る
}

unset($_SESSION["csrf_token"]);

//バリデーション
if(!$username = filter_input(INPUT_POST, 'username')) {
    $err[] = "ユーザー名を記入してください。";
}
if(!$email = filter_input(INPUT_POST, 'email')) {
    $err[] = "メールアドレスを記入してください。";
}
if(!$genre = filter_input(INPUT_POST, 'genre')) {
    $err[] = "ジャンルを選択してください。";
}
if(!$profile = filter_input(INPUT_POST, 'profile')) {
    $err[] = "プロフィールを記入してください。";
}
if(!$soundcloud = filter_input(INPUT_POST, 'soundcloud')) {
    $err[] = "URLを記入してください。";
}
$password = filter_input(INPUT_POST, 'password');
//正規表現
if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)) {
    $err[] = "パスワードは英数字8文字以上100文字以下にしてください。";
}
$password_conf = filter_input(INPUT_POST, 'password_conf');
if($password !== $password_conf) {
    $err[] = "確認用パスワードと異なっています。";
}

if(count($err) === 0) {
    //ユーザーを登録する処理ロジックの処理を取ってくる
    $hasCreated = UserLogic::createUser($_POST);

    if(!$hasCreated) {
        $err[] = "登録に失敗しました";
        // header("Location: signup_form.php");
        // return;
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>ユーザー登録完了画面</title>
</head>
<body>
    <?php if(count($err) > 0) : ?>
    <?php foreach($err as $e) : ?>
        <p><?php echo $e ?></p>
    <?php endforeach ?>
    <?php else : ?>
     <p>ユーザー登録が完了しました。</p>
    <?php endif ?>
    <a href="./login_form.php">ログイン</a>
    <!-----------------------------------------------------------------------------
    * フッター
    ------------------------------------------------------------------------------>
    <footer>
        <p><small>2022 G's FUKUOKA DEV10-08</small></p>
    </footer>
    <!-- <audio loop="loop" autoplay="autoplay" >
        <source type="audio/mpeg" src="./music/LOOSE YOURSELF.mp3">
    </audio> -->
</body>
</html>