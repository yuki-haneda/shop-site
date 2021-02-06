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
        <a>Roku's cigarettes farm</a>
      </h1>
      <ul class="nav-list">
        <li class="nav-list-item"><a href="shop_about.php">About</a></li>
        <li class="nav-list-item"><a href="shop_list.php">Products</a></li>
        <li class="nav-list-item"><a href="shop_cartlook.php">Cart</a></li>
      </ul>
    </header>
    
    <br>
    <div id="about">
      <h1>About Roku's cigarettes farm...</h><br>
    </div>
    <div class="main">
      <p>このサイトはテストで作っています。<br>
        喫煙者も暮らしやすい国でありますように・・・</p><br>
    </div>

      <?php
      print '<a href=shop_list.php>商品一覧に戻る</a>';
      ?>
</body> 
</html>