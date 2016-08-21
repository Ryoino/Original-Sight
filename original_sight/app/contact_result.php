<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccesUtil.php");

$name = $_SESSION["name"];
$furigana = $_SESSION["furigana"];
$email = $_SESSION["email"];
$tel = $_SESSION["tel"];
$gender = $_SESSION["gender"];
$item = $_SESSION["item"];
$content = $_SESSION["content"];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>お問い合わせ結果</title>
<link rel="stylesheet" href="../css/contact.css">
</head>
<body>
<?php
if(!isset($_POST['mode']) or !$_POST['mode']=="RESULT"){//アクセスルートチェック
  echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}else{
  insert_contact($name,$furigana,$email,$tel,$gender,$item,$content);
?>
<?php
  if(!isset($result)){?>
    <div><h1><a href="<?php echo TOP;?>">OPENET</a></h1></div>
    <div><h2>お問い合わせ</h2> </div>
    <div>
            <div>
    		<h1>お問い合わせ 送信完了</h1>
    		<p>
    		お問い合わせありがとうございました。<br>
    		内容を確認のうえ、回答させて頂きます。<br>
    		しばらくお待ちください。
    		</p>
    		<a href="<?php echo CONTACT;?>">
    			<button type="button">お問い合わせに戻る</button>
    		</a>
    	</div>
    </div>

	<?php }else{
		echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
	}
}?>

</body>
</html>
