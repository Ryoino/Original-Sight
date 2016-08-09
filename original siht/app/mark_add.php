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
<title>お気に入り追加画面</title>
</head>
<body>

<?php

if(!isset($_POST['mark']) && $_POST['mark']!=="MARK"){
	echo return_top().'<br>';
	"アクセスルートが不正です。もう一度トップページからやり直してください";
}else {
  if (!isset($_SESSION['userID'])){
  echo 'ログインを行って下さい<br>
        <a href="'.LOGIN.'">ログイン画面に戻る</a>';
  }
  if (isset($_SESSION['userID']) && $_POST['mark_code']){
  $book_mark = insert_mark($_SESSION['userID'],$_POST['mark_code']);
  echo '<p>お気に入りに登録しました</p>';
  }
}

?>
</body>
</html>
