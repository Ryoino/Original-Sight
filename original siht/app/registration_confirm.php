<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登録結果画面</title>
</head>
<body>
  <?php
  if(!isset($_POST['mode']) or !$_POST['mode']=="CONFIRM"){//アクセスルートチェック
  	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
  }else{
  	//ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
  	$confirm_values = array(
  			'name' => bind_p2s('name'),
  			'mail' => bind_p2s('mail'),
  			'pass' => bind_p2s('pass'),
  			'pass_ch' => bind_p2s('pass_ch'),
        'postal' => bind_p2s('postal'),
        'postal1' => bind_p2s('postal1'),
  			'address' => bind_p2s('address'),
        'address1' => bind_p2s('address1'),
        'address2' => bind_p2s('address2')
  	);
  }
 if ($confirm_values['pass'] != $confirm_values['pass_ch']){?>
   <h1>確認用のパスワードに誤りがあります!</h1><br>
       再度入力を行ってください
      <input type="hidden" name="mode" value="REINPUT" >
 			<input type="submit" name="no" value="登録画面に戻る">
<?php }?>

<?php //1つでも未入力項目があったら表示しない
 if(!in_array(null,$confirm_values, true)){ ?>

   ユーザー名:<?php echo $confirm_values['name'];?><br>
   メールアドレス:<?php echo $confirm_values['mail'];?><br>
   パスワード:<?php echo mb_strlen($confirm_values['pass']).'文字のパスワード';?><br>
   郵便番号:<?php echo $confirm_values['postal'].'-'.$confirm_values['postal1'];?><br>
   住所:<?php echo $confirm_values['address'].$confirm_values['address1'].$confirm_values['address2'];?><br>

   上記の内容で登録します。よろしいですか？

    <form action="<?php echo REGISTRATION_COMPLETE ?>" method="POST">
        <input type="hidden" name="mode" value="RESULT" >
        <input type="submit" name="yes" value="はい">
    </form>
    <?php
}else{
    ?>
    <h1>入力項目が不完全です</h1><br>
    再度入力を行ってください<br>
    <h3>不完全な項目</h3>
    <?php
    $arr = array(
    '名前' => $confirm_values['name'],
    'メールアドレス' => $confirm_values['mail'],
    'パスワード' => $confirm_values['pass'],
    '郵便番号' => $confirm_values['postal'],
    '郵便番号1' => $confirm_values['postal1'],
    '住所' => $confirm_values['address'],
    '市区町村' => $confirm_values['address1'],
    '番地・ビル名' => $confirm_values['address2']
    );
    foreach ($arr as $key => $value){
        if($value == null){
            echo $key.'が未入力です<br>';
        }
    }
}
?>
<br><br>
<form action="<?php echo REGISTRATION ?>" method="POST">
    <input type="hidden" name="mode" value="REINPUT" >
    <input type="submit" name="no" value="登録画面に戻る">
</form>
</div>

<br><br>
<?php echo return_top(); ?>

</body>
</html>
