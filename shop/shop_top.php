<?php
session_start();
session_regenerate_id(true);

?>

<!DOCTYPE html>
<html> 
<head> 
  <meta charset="UTF-8"> 
  <link rel="stylesheet" href="sample.css">
  <title>My Rings</title> 
</head> 
<body> 
    <header>
      <h1 class="headline">
        <a href="shop_top.php">My Rings farm</a>
      </h1>
      <ul class="nav-list">
        <li class="nav-list-item"><a href="shop_about.php">About</a></li>
        <li class="nav-list-item"><a href="shop_list.php">Products</a></li>
        <li class="nav-list-item"><a href="shop_cartlook.php">Cart</a></li>
      </ul>
    </header>

<?php
    
    if(isset($_SESSION['member_login'])==false)
    {
  print'<div style="text-align: right">';
  print'<a href="member_login.html">ログインはこちら</a><br>';
  print'</div>';
  print'ようこそゲスト様<br>';
  }
  else
  {
  print'ようこそ';
  print $_SESSION['member_name'];
  print'様　';
  print '<a href="member_logout.php">ログアウト</a><br>';
  print '<br>';
  }

  print''

    
?>

</body> 
</html>