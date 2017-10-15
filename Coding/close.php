<?php
//Logout
header('Content-Type:text/html;charset=utf8');
require_once('../include/config.inc.php');
$_SESSION['login_user'] = null;
$_SESSION['username'] = null;
session_destroy();

$sql = 'SELECT * FROM userstable WHERE id='.$_GET['id'];
$data = $db->execute_dql($sql);
$data = $data[0];

$sql = 'DELETE FROM userstable WHERE id='.$_GET['id'];
$db->execute_dml($sql);
$sql = 'DELETE FROM generalizationtable WHERE from_account="'.$data['account_number'].'"';
$db->execute_dml($sql);
$sql = 'DELETE FROM generalizationtable WHERE to_account="'.$data['account_number'].'"';
$db->execute_dml($sql);

echo '<script>';
echo 'alert("close account success.");';
echo 'window.location.href="login.php";';
echo '</script>';
die;
?>
