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
      print'ログインされていません。<br>';
      print'<a href="shop_list.php">商品一覧へ</a>';
      exit();
    }
    try
    {
    
    require_once ('../common/common.php');
    
    $post=sanitize($_POST);
    
    $onamae=$post['onamae'];
    $email=$post['email'];
    $postal1=$post['postal1'];
    $postal2=$post['postal2'];
    $address=$post['address'];
    $tel=$post['tel'];
    
    print $onamae.'様<br>';
    print 'ご注文ありがとうございました。<br>';
    print $email.'にメールをお送りしましたのでご確認ください。<br>';
    print '商品は以下の住所に郵送いたします。<br>';
    print $postal1.'-'.$postal2.'<br>';
    print $address.'<br>';
    print $tel.'<br>';
      
      $honbun='';
      $honbun.=$onamae."様\n\nこの度はご注文ありがとうございました。\n";
      $honbun.="\n";
      $honbun.="ご注文商品\n";
      $honbun.="---------------\n";
      
      $cart=$_SESSION['cart'];
      $kazu=$_SESSION['kazu'];
      $max=count($cart);
      
      $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
      $user='root';
      $password='root';
      $dbh=new PDO($dsn,$user,$password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      for($i=0;$i<$max;$i++)
      {
        $sql='SELECT name,price FROM mst_product WHERE code=?';
        $stmt=$dbh->prepare($sql);
        $data[0]=$cart[$i];
        $stmt->execute($data);
        
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        
        $name=$rec['name'];
        $price=$rec['price'];
        $kakaku[]=$price;
        $suryo=$kazu[$i];
        $shokei=$price*$suryo;
        
        $honbun.=$name.'';
        $honbun.=$price.'円 x ';
        $honbun.=$suryo.'個 = ';
        $honbun.=$shokei."円\n";
      }
      
      $sql='LOCK TABLES dat_sales WRITE, dat_sales_product WRITE,dat_member WRITE';
      $stmt=$dbh->prepare($sql);
      $stmt->execute();
      
      $lastmembercode=$_SESSION['member_code'];

    
    catch (Exception $e)
    {
      print'ただいま障害により大変ご迷惑をお掛けしております。';
      exit();
    }
    ?>
    
    <br>
    <a href="clear_cart.php">商品画面へ</a>
    
</body> 
</html>