<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

$xml_detail =  simplexml_load_file('../xml/items_detail_full.xml');

//ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
$code = array(
          'code' => code_type('code')
             );

foreach ($code as $key => $value) {
  $item_code = $xml_detail->$value;
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>商品詳細</title>
<link rel="stylesheet" href="../css/header.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/initial.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../animation/logo.css" media="screen" title="no title" charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300,100' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/genericons/genericons.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/item.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<?php echo header_top(); ?>

<?php if (isset($code)){?>

  <?php foreach ($item_code as $detail) {?>
    <?php $code = $detail->code;?>
      <span class="name"><a href="#"><?php echo $detail->name;?></a></span>
      <div class="clear"></div>
      <span class="img"><a href="#"><img src=<?php echo $detail->img;?> width="200px" height="300px"></a></span>
      <span class="price">&yen<?php echo $detail->price;?></span>
      <div class="clear"></div>
      商品説明：<span class="detail"><?php echo $detail->detail;?></sapn>


  <div class="clear"></div>
  <br><br>

  <?php }
  }
  ?>

<form action="<?php echo MARK_ADD; ?>" method="post">
<input type="hidden" name="mark" value="MARK">

<input type="hidden" name="mark_code"  value="<?php echo $code;?>">

<input type="submit" name="btnSubmit" value="お気に入り">
</form>

<form action="<?php echo CART_ADD; ?>" method="post">
  <input type="hidden" name="cart" value="CART">
  <input type="hidden" name="cart_code" value="<?php echo $code;?>">
  <input type="submit" name="btnSubmit" value="カートに追加">
</form>



</body>
</html>
