<?php
session_start();
require_once("../util/dbaccesUtil.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>カートに追加画面</title>
</head>
<body>

<?php

if(!isset($_POST['cart']) && $_POST['cart']!=="CART"){
	echo return_top().'<br>';
	"アクセスルートが不正です。もう一度トップページからやり直してください";
}else {
  if (!isset($_SESSION['userID'])){
  echo 'ログインを行って下さい<br>
        <a href="'.LOGIN.'">ログイン画面に戻る</a>';
  }else {
  if (isset($_SESSION['userID']) && isset($_POST['cart_code'])){

    if (!isset($_SESSION["cart"])) {
      $_SESSION["cart"] = array();
    }
    array_push($_SESSION["cart"],$_POST['cart_code']);
    var_dump($_SESSION["cart"]);
    echo '<p>カートに追加しました</p>
    <a href="'.CART.'">カートの中身を見る</a>&nbsp;<a href="'.MEN_SEARCH.'">検索結果に戻る</a>';
	}
 }
}

?>

</body>
</html>
