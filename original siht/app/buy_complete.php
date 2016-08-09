<?php
session_start();
require_once("../util/dbaccesUtil.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

//ルートチェック
if(!isset($_POST['mode']) && !$_POST['mode']=="BUY"){
	echo return_top().'<br>';
	"アクセスルートが不正です。もう一度トップページからやり直してください";
}else {
	if(isset($_SESSION['userID']) && isset($_POST['code']) && isset($_POST['type']) && isset($_POST['amount'])){
		$result = insert_buy($_SESSION['userID'],$_POST['code'],$_POST['type'],$_POST['amount']);//購入情報テーブルへ追記
		$buy_total = search_amount($_SESSION['userID']);//これまでの総購入金額を参照
		$buy_total[0]['amount'] += $_POST['amount'];
		update_total($_SESSION['userID'],$buy_total[0]['amount']);//今回の購入を含めたtotal値で上書き
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>購入完了画面</title>
</head>
<body>
  <?php
  if(!isset($result)){
    unset($_SESSION['cart']);
    echo "<h2>購入完了しました!</h2>";
  }else{
    echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
  }?>
</div>


<br><br>
  <?php echo return_top();?>

</body>
</html>
