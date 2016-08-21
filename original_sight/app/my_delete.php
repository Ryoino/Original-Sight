<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

$name = $_SESSION['name'];
$mail = $_SESSION['mail'];
$postal = $_SESSION['postal'];
$total = $_SESSION['total'];
$date = $_SESSION['newDate'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザー情報消去確認ページ</title>
</head>
<body>
  <?php
  if(!isset($_POST['mode']) or !$_POST['mode']=="UPRESULT"){//アクセスルートチェック
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
  }else{?>

  ユーザー名:<?php echo $name;?><br>
  メールアドレス:<?php echo $mail;?><br>
  住所:<?php echo $postal;?><br>
  購入金額:<?php echo $total;?><br>
  登録日時:<?php echo $date;?><br>
  このユーザーを削除しますか？<br><br>

	<form action="<?php echo MY_DELETE_RESULT  ?>" method="POST">
    <input type="hidden" name="mode" value="DERESULT" >
    <input type="submit" name="yes" value="はい">
  </form>
    <br>
   	<a href="<?php echo TOP ?>">いいえ</a>
<?php } ?>

<br><br>
  <?php echo return_top(); ?>

</html>
