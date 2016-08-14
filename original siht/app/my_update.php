<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

$name = $_SESSION['name'];
$mail = $_SESSION['mail'];
$password = $_SESSION['password'];
$postal = $_SESSION['postal'];
$address = $_SESSION['address'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザー情報更新ページ</title>
</head>
<body>
<?php
  if(!isset($_POST['mode']) or !$_POST['mode']=="UPDATE"){//アクセスルートチェック
  	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
  }else{?>

<form action="<?php echo MY_UPDATE_RESULT ?>" method="POST">
  ユーザー名：<input type="text" name="name" value="<?php echo $name; ?>">
      <br><br>
  メールアドレス：<input type="text" name="mail" value="<?php echo $mail; ?>">
      <br><br>
  パスワード：<input type="text" name="pass" value="<?php echo $password;?>">
      <br><br>
  郵便番号：<input type="text" name="postal" value="<?php echo $postal;?>">
      <br><br>
  住所：<input type="text" name="address" value="<?php echo $address; ?>">
      <br><br>

      <input type="hidden" name="mode"  value="UPRESULT">
      <input type="submit" name="btnSubmit" value="更新する">
  </form>
<?php }?>
</body>
</html>
