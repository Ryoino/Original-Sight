<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新規登録</title>
</head>
<body>
  <form action="<?php echo REGISTRATION_CONFIRM; ?>" method="post">
    ユーザー名：
    <input type="text" name="name" value="<?php echo form_value('name');?>"><br><br>
    メールアドレス：
    <input type="text" name="mail" value="<?php echo form_value('mail');?>"><br><br>
    パスワード：
    <input type="password" name="pass" value="<?php echo form_value('pass');?>"><br><br>
    パスワード(確認のためもう一度入力してください):
    <input type="password" name="pass_ch" value="<?php echo form_value('pass_ch');?>"><br><br>
    郵便番号 :
    <input type="text" name="postal" value="<?php echo form_value('postal');?>" style="width:50px;">-<input type="text" name="postal1" value="<?php echo form_value('postal1');?>"><br><br>
    都道府県：
    <select name="address"><option value=""><?php echo form_value('address');?></option>
    <option value="">-- 選択して下さい --</option>
    <option value="北海道">北海道</option>
    <option value="青森県">青森県</option>
    <option value="岩手県">岩手県</option>
    <option value="宮城県">宮城県</option>
    <option value="秋田県">秋田県</option>
    <option value="山形県">山形県</option>
    <option value="福島県">福島県</option>
    <option value="茨城県">茨城県</option>
    <option value="栃木県">栃木県</option>
    <option value="群馬県">群馬県</option>
    <option value="埼玉県">埼玉県</option>
    <option value="千葉県">千葉県</option>
    <option value="東京都">東京都</option>
    <option value="神奈川県">神奈川県</option>
    <option value="新潟県">新潟県</option>
    <option value="富山県">富山県</option>
    <option value="石川県">石川県</option>
    <option value="福井県">福井県</option>
    <option value="山梨県">山梨県</option>
    <option value="長野県">長野県</option>
    <option value="岐阜県">岐阜県</option>
    <option value="静岡県">静岡県</option>
    <option value="愛知県">愛知県</option>
    <option value="三重県">三重県</option>
    <option value="滋賀県">滋賀県</option>
    <option value="京都府">京都府</option>
    <option value="大阪府">大阪府</option>
    <option value="兵庫県">兵庫県</option>
    <option value="奈良県">奈良県</option>
    <option value="和歌山県">和歌山県</option>
    <option value="鳥取県">鳥取県</option>
    <option value="島根県">島根県</option>
    <option value="岡山県">岡山県</option>
    <option value="広島県">広島県</option>
    <option value="山口県">山口県</option>
    <option value="徳島県">徳島県</option>
    <option value="香川県">香川県</option>
    <option value="愛媛県">愛媛県</option>
    <option value="高知県">高知県</option>
    <option value="福岡県">福岡県</option>
    <option value="佐賀県">佐賀県</option>
    <option value="長崎県">長崎県</option>
    <option value="熊本県">熊本県</option>
    <option value="大分県">大分県</option>
    <option value="宮崎県">宮崎県</option>
    <option value="鹿児島県">鹿児島県</option>
    <option value="沖縄県">沖縄県</option>
    </select><br><br>
    市区町村：
    <input type="text" name="address1" value="<?php echo form_value('address1');?>"><br><br>
    番地・ビル名：
    <input type="text" name="address2" value="<?php echo form_value('address2');?>"><br><br>

    <input type="hidden" name="mode" value="CONFIRM">
    <input type="submit" name="btnsubmit" value="登録確認画面へ">
  </form>

</body>
</html>
