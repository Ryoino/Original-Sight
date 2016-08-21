<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/dbaccesUtil.php");
require_once("../util/scriptUtil.php");

$profile = profile_detail($_SESSION['userID']);//ユーザーの全ての情報を参照

$name = $_SESSION['name'] = $profile[0]['name'];
$mail = $_SESSION['mail'] = $profile[0]['mail'];
$password = $_SESSION['password'] = $profile[0]['password'];
$postal = $_SESSION['postal'] = $profile[0]['postal'];
$address = $_SESSION['address'] = $profile[0]['address'];
$total = $_SESSION['total'] = $profile[0]['total'];
$newDate = $_SESSION['newDate'] = $profile[0]['newDate'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザー情報</title>
</head>
<body>
  <h2>ユーザー登録情報</h2>
  ユーザー名：<?php echo $name;?><br>
  メールアドレス：<?php echo $mail; ?><br>
  郵便番号：<?php echo $postal; ?><br>
  住所：<?php echo $address; ?><br>
  これまでの購入金額：<?php echo $total; ?><br>
  登録日時：<?php echo $newDate; ?><br>

	<form action="<?php echo MY_UPDATE ?>" method="POST">
		<input type="submit" name="Submit" value="ユーザー情報を変更する">
		<input type="hidden" name="mode" value="UPDATE">
	</form>
	<form action="<?php echo MY_DELETE ?>" method="POST">
		<input type="submit" name="Submit" value="ユーザー情報を削除する">
		<input type="hidden" name="mode" value="DELETE">
	</form>

<br><br>
  <?php echo return_top(); ?></html>

</body>
</html>
