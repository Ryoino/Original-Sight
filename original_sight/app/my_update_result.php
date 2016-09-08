<?php
session_start();
require_once("../util/dbaccesUtil.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

$name = isset($_POST['name']) ? $_POST['name'] : null;
$mail = isset($_POST['mail']) ? $_POST['mail'] : null;
$pass = isset($_POST['pass']) ? $_POST['pass'] : null;
$postal = isset($_POST['postal']) ? $_POST['postal'] : null;
$address = isset($_POST['address']) ? $_POST['address'] : null;
$userID = $_SESSION['userID'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザー情報更新結果</title>
</head>
<body>
<?php
if(!isset($_POST['mode']) or !$_POST['mode']=="UPRESULT"){//アクセスルートチェック
  echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}else{

  if(isset($name) && isset($mail) && ($pass) && ($address)){
		update_user($name,$pass,$mail,$postal,$address,$userID);
?>
<h2>更新しました</h2>

ユーザー名：<?php echo $name; ?>
    <br><br>
メールアドレス：<?php echo $mail; ?>
    <br><br>
パスワード：<?php echo $pass;?>
    <br><br>
郵便番号：<?php echo $postal;?>
    <br><br>
住所：<?php echo $address; ?>
    <br><br>
<?php }else{ ?>

		<h2>空のフォームによる更新は出来ません</h2>
        <form action="<?php echo MY_UPDATE ?>" method="POST">
            <input type="hidden" name="mode" value="REINPUT" >
            <input type="submit" name="no" value="登録画面に戻る">
        </form>

<?php }
}?>

<?php echo return_top(); ?>
</body>
</html>
