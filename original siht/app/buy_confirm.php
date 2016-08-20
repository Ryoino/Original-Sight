<?php
session_start();
require_once("../util/dbaccesUtil.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

$cart = !empty($_SESSION["cart"]) ? $_SESSION["cart"] : array();

$item_code = array();
foreach ($cart as $a){
    $xml_detail = simplexml_load_file('../xml/items_detail_full.xml');//xml内の情報をオブジェクトに変換
    $item_code[] = $xml_detail->$a;
  }

$amount = 0; //合計金額の初期値

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/master.css">
<title>購入確認画面</title>
</head>
<body>
  <?php if(!isset($_POST['mode']) or !$_POST['mode']=="CONFIRM"){//アクセスルートチェック
  	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
  }else{
        if(empty($_SESSION["cart"])){ //カートの中身の有無をチェック
      echo  'カートの中は空です';
  }else {
  ?>
  <?php foreach ($item_code as $detail) { ?>
    <span class="name"><?php echo $detail->name;?></span>
    <div class="clear"></div>
    <span class="img"><img src=<?php echo $detail->img;?> width="200px" height="300px"></span><br>
    <span class="name"><?php echo $detail->price;?></span><br>
    <?php
    $code[] = $detail->code;
    $price = $detail->price;
    $amount += $price;
    }
    ?>
    <?php
    echo '合計金額'.'&yen'.$amount;
     ?>
  <form action="<?php echo BUY_COMPLETE ?>" method="POST">
  <h3>お支払い方法</h3>
  <input type="hidden" name="userID" value="<?php if(isset($_SESSION['userID'])){echo $_SESSION['userID']; } ?>">
  <input type="hidden" name="code" value="<?php echo implode(',',$code);?>">
  <?php
  for($i=1; $i<=4; $i++){ ?>
  <input type="radio" name="type" value="<?php echo $i; ?>"><?php echo ex_typenum($i);?><br>
  <?php } ?>
  <input type="hidden" name="amount" value="<?php echo $amount;?>">
  <input type="hidden" name="mode" value="BUY">
  <input type="submit" name="btnSubmit" value="この金額で購入する"><br>
  </form>
<?php }
}?>

<br><br>
<?php echo return_top(); ?>
</body>
</html>
