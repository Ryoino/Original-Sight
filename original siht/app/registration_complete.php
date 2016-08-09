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
<title>登録結果</title>
</head>
<body>
  <?php
  $name = $_SESSION['name'];
  $mail = $_SESSION['mail'];
  $pass = $_SESSION['pass'];
  $postal = $_SESSION['postal'].'-'.$_SESSION['postal1'];
  $address = $_SESSION['address'].$_SESSION['address1'].$_SESSION['address2'];

  $result = insert_user($name,$mail,$pass,$postal,$address);

	if(!isset($result)){?>
    ユーザー名：<?php echo $name;?><br>
    メールアドレス：<?php echo $mail;?><br>
		パスワード：<?php echo $pass;?><br>
    郵便番号：<?php echo $postal;?><br>
    住所：<?php echo $address;?><br>
	<p>上記の内容で登録しました;</p>
	<?php }else{
		echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
	}?>

</body>
</html>
