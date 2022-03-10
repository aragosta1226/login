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
if(!$name = filter_input(INPUT_POST, 'name')) {
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
if(!$URL = filter_input(INPUT_POST, 'URL')) {
    $err[] = "URLを記入してください。";
}
// if(!$image = filter_input(INPUT_POST, 'image')) {
//     $err[] = "画像を選択してください。";
// }
$password = filter_input(INPUT_POST, 'password');
//正規表現
if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)) {
    $err[] = "パスワードは英数字8文字以上100文字以下にしてください。";
}
$password_conf = filter_input(INPUT_POST, 'password_conf');
if($password !== $password_conf) {
    $err[] = "確認用パスワードと異なっています。";
}

$img = $_FILES['img']['name'];
$img_data = "";
if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
    // 情報の取得
    $uploaded_file_name = $_FILES['img']['name'];
    $temp_path  = $_FILES['img']['tmp_name'];
    $directory_path = 'upload/';
    // ファイル名の準備
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis').md5(session_id()) . '.' . $extension;
    $save_path = $directory_path . $unique_name;
    // var_dump($save_path);
    // exit();
    if (is_uploaded_file($temp_path)) {
    // var_dump($temp_path);
    // exit();
      if (move_uploaded_file($temp_path, $save_path)) {
        chmod($save_path, 0644);
        // $img_data = $save_path;
      } else {
        exit('Error:アップロードできませんでした');
      }
    } else {
      exit('Error:画像がありません');
    }
  } else {
    exit('Error:画像が送信されていません');
  }

// var_dump($temp_path);
// exit();
// var_dump($_POST);
// exit();

if(count($err) === 0) {
    //ユーザーを登録する処理ロジックの処理を取ってくる
    $hasCreated = UserLogic::createUser($_POST, $save_path);
    // var_dump($hasCreated);
    // exit();

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
        <p><small>2022 G's FUKUOKA DEV10-10</small></p>
    </footer>
    <!-- <audio loop="loop" autoplay="autoplay" >
        <source type="audio/mpeg" src="./music/LOOSE YOURSELF.mp3">
    </audio> -->
</body>
</html>