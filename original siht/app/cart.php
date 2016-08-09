<?php
session_start();
require_once("../util/dbaccesUtil.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

//カートの商品を消去する
if (isset($_GET['delete'])){
$no = (int)$_GET['delete'];
  array_splice($_SESSION["cart"],$no,1);
  }

//カートの中身を空にする
 if (isset($_GET['empty'])) {
   unset($_SESSION["cart"]);
 }

$cart = !empty($_SESSION["cart"]) ? $_SESSION["cart"] : null;
$item_code = array();
if (isset($cart)) {
  foreach ($cart as $a){
      $xml_detail = simplexml_load_file('../xml/items_detail.xml');
      $item_code[] = $xml_detail->$a;
    }
}else {
  echo '<h2>カートの中は空です！</h2>';
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>カート</title>
</head>
<body>
  <?php foreach ($item_code as $key => $detail) {
$code = $detail->code;
    ?>
    <span class="name"><?php echo $detail->name;?></span>
    <div class="clear"></div>
    <span class="img"><img src=<?php echo $detail->img;?> width="200px" height="300px"></span><br>
    <form action="<?php echo CART; ?>" method="get">
    <input type="hidden" name="delete" value="<?php echo $key;?>">
    <input type="submit" name="name" value="消去">
    </form>
<?php }?>

<form action="<?php echo BUY_CONFIRM ?>" method="POST">
<input type="hidden" name="mode" value="BUYC">
<input type="submit" name="btnSubmit" value="購入確認画面へ進む">
</form>

<form action="<?php echo CART; ?>" method="get">
<input type="hidden" name="empty" value="EMPTY">
<input type="submit"  value="カートを空にする">
</form>

<br><br>
  <?php echo return_top();?>
</body>
</html>
