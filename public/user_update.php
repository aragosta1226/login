<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

//ロジックの処理を取ってくる
$result = UserLogic::updateUser();


if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
    // 情報の取得
    $uploaded_file_name = $_FILES['upfile']['name'];
    $temp_path  = $_FILES['upfile']['tmp_name'];
    $directory_path = 'upload/';
    // ファイル名の準備
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis').md5(session_id()) . '.' . $extension;
    $save_path = $directory_path . $unique_name;
    // var_dump($save_path);
    // exit();
    if (is_uploaded_file($temp_path)) {
      if (move_uploaded_file($temp_path, $save_path)) {
        chmod($save_path, 0644);
      } else {
        exit('Error:アップロードできませんでした');
      }
    } else {
      exit('Error:画像がありません');
    }
  } else {
    exit('Error:画像が送信されていません');
  }


header('Location:user_update2.php');
exit();


