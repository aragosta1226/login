<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

//ロジックの処理を取ってくる
$result = UserLogic::updateUser2();


header('Location:shop_update2.php');
exit();


