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
<link rel="stylesheet" href="../css/header.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/initial.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../animation/logo.css" media="screen" title="no title" charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300,100' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css//genericons/genericons.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<?php echo header_top(); ?>

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
    echo '<p>カートに追加しました</p>';
	}
 }
}

?>

</body>
</html>
