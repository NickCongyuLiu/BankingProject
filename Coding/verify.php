<?php
require_once('../include/config.inc.php');
$sql = 'SELECT * FROM userstable WHERE id='.$_GET['userid'];
$user = $db->execute_dql($sql);
$user = $user[0];
$pwd = $_GET['password'];
if($pwd==$user['password_pay'])
{echo 1;}else{echo 0;}
?>