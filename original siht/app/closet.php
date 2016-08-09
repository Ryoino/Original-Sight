<?php
session_start();
require_once("../util/dbaccesUtil.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

$delete = isset($_POST['delete']) ? $_POST['delete'] :null;
if ($delete == "DELETE") {
  $userID = isset($_POST['userID']) ? $_POST['userID']:null;
  $code = isset($_POST['code']) ? $_POST['code']:null;
  $delete = delete_mark($userID,$code);
}

$userID = $_SESSION['userID'];

$xml_detail =  simplexml_load_file('../xml/items_detail.xml');

//お気に入り
$book_code = null; //初期値 null を設定
$book_mark = search_mark($userID);
foreach ($book_mark as $value){
  foreach ($value as $mark){
    $book_code[] = $xml_detail->$mark;
  }
}

//購入履歴
$buy_code = null; //初期値 null を設定
$buy_history = search_buy($userID);
foreach ($buy_history as $value){
  foreach ($value as $buy){
    //文字列を分解
    $buy = explode(',',$buy);
    foreach ($buy as $b_code) {
      $buy_code[] = $xml_detail->$b_code;
    }
   }
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>クローゼット画面</title>
<link rel="stylesheet" href="../css/initial.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/header.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../animation/logo.css" media="screen" title="no title" charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300,100' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/closet.css">
<link rel="stylesheet" href="../css/genericons/genericons/genericons.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<?php echo header_top(); ?>

  <h1><span class="title">Book Mark</span></h1>

    <?php
    if (!is_array($book_code)) {
      $book_code = array(); //値がなければ配列を入れる
      echo 'お気に入りはありません';
    }else {
    foreach ($book_code as $book_detail) {
      $code =  $book_detail->code ?>
  <div id="book_mark">
      <span class="name"><a href="<?php echo ITEM;?>?code=<?php echo $code;?>"><?php echo $book_detail->name;?></a></span>
        <div class="clear"></div>
      <span class="img"><a href="<?php echo ITEM;?>?code=<?php echo $code;?>"><img src="<?php echo $book_detail->img;?>"
      width="200px" height="300px"></a></span><br>
        <div class="clear"></div>
      &yen<span class="price"><?php echo $book_detail->price;?></span>
        <div class="clear"></div>
      <form action="<?php echo CART_ADD; ?>" method="post">
        <input type="hidden" name="cart_code" value="<?php echo $code;?>">
        <input type="hidden" name="cart" value="CART">
        <input  class="cart" type="submit" name="name" value="Cart">
      </form>
      <form action="<?php echo CLOSET;?>" method="post">
        <input type="hidden" name="delete" value="DELETE">
        <input type="hidden" name="userID" value="<?php echo $userID;?>">
        <input type="hidden" name="code" value="<?php echo $code;?>">
        <input class="buttonDE" type="submit" name="delbtn" value="Delete">
      </form>
  </div>
    <?php }
  }?>
<div class="clear"><div>

</div>
<h1><span class="title">Buy History</span></h1>
    <?php
      if (!is_array($buy_code)) {
        $buy_code = array();
    echo '購入履歴はありません';
    }else {
      foreach ($buy_code as $buy_detail) {?>
       <div id="buy_history">
      <span class="name"><?php echo $buy_detail->name;?></span>
      <div class="clear"></div>
      <span class="img"><img src="<?php echo $buy_detail->img;?>" width="200" height="300"></span><br>
      <div class="clear"></div>
      &yen<span class="price"><?php echo $buy_detail->price;?></span>
      <div class="clear"></div>
      </div>
    <?php }
  }?>
</body>
</html>
