<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

$result = UserLogic::userLike();

header('Location:shop_list.php');
exit();