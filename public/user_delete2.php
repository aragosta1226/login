<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

//ロジックの処理を取ってくる
$result = UserLogic::deleteUser();
  
header('Location:user_delete3.php');
exit();
