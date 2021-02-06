<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
  print'ログインされていません。<br>';
  print'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
  exit();
}


if(isset($_POST['disp'])==true){
  $v='disp';
}elseif(isset($_POST['add'])==true){
  $v='add';
}elseif(isset($_POST['edit'])==true){
  $v='edit';
}elseif(isset($_POST['delete'])==true){
  $v='delete';
}

if($v=='add')
{
  header('Location:staff_'.$v.'.php');
  exit();
}elseif(isset($_POST['staffcode'])==true)
{
  $staff_code=$_POST['staffcode'];
  header('Location:staff_'.$v.'.php?staffcode='.$staff_code);
  exit();
}else{
  header('Location:staff_ng.php');
  exit();
}


?>

