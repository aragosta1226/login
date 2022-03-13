<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

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

//ロジックの処理を取ってくる
$result = UserLogic::updateUser2($save_path);


header('Location:shop_update2.php');
exit();


