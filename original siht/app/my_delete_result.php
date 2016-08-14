<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/dbaccesUtil.php");
require_once("../util/scriptUtil.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザー情報消去結果ページ</title>
</head>
<body>
  <?php
  if(!isset($_POST['mode']) or !$_POST['mode']=="DERESULT"){//アクセスルートチェック
  	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
  }else{

  delete_profile($_SESSION['userID']);
  session_clear();
  ?>
  <h2>消去が完了しました</h2>

<?php }?>

<br><br>
  <?php echo return_top(); ?>
</body>
</html>
