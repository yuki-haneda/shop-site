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
        <a href="shop_top.php">My Rings</a>
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
    try
    {
      
      $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
      $user='root';
      $password='root';
      $dbh=new PDO($dsn,$user,$password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $sql='SELECT code,name,price,gazou FROM mst_product WHERE 1 ORDER BY name';
      $stmt=$dbh->prepare($sql);
      $stmt->execute();
      
      $dbh=null;
      
      print'<h3>商品一覧</h3><br><br>';
      
      while(true)
      {
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false)
        {
          break;
        }
        print'<a href="shop_product.php?procode='.$rec['code'].'">';
        print'<img src="../product/gazou/'.$rec['gazou'].'"><br>';
        print $rec['name'].'<br>';
        print $rec['price'].'円'.'<br>';
        print'</a>';
        print'<br>';
      }
      print'<br>';
      print'<a href="shop_cartlook.php">カートを見る</a><br>';
      print'<br>';
      
    }
    
    catch(Exeption $e)
    {
      print'ただいま障害により大変ご迷惑お掛けいたします。';
      exit();
    }
    ?>
    
    
</body> 
</html>