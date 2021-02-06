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
  header('Location:pro_'.$v.'.php');
  exit();
}elseif(isset($_POST['procode'])==true)
{
  $pro_code=$_POST['procode'];
  header('Location:pro_'.$v.'.php?procode='.$pro_code);
  exit();
}else{
  header('Location:pro_ng.php');
  exit();
}


?>



    