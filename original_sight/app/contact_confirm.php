<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

	// フォームのボタンが押されたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// フォームから送信されたデータを各変数に格納
		$name = $_SESSION["name"] = $_POST["name"];
		$furigana = $_SESSION["furigana"] = $_POST["furigana"];
		$email = $_SESSION["email"] = $_POST["email"];
		$tel = $_SESSION["tel"] = $_POST["tel"];
		$gender = $_SESSION["gender"] = $_POST["gender"];
		$item = $_SESSION["item"] = $_POST["item"];
		$content = $_SESSION["content"] = $_POST["content"];
	}

	// 送信ボタンが押されたら
	if (isset($_POST["submit"])) {
		// 送信ボタンが押された時に動作する処理をここに記述する

		// 日本語をメールで送る場合のおまじない
        	mb_language("ja");
		mb_internal_encoding("UTF-8");

		//mb_send_mail("kanda.it.school.trial@gmail.com", "メール送信テスト", "メール本文");

        	// 件名を変数subjectに格納
        	$subject = "［自動送信］お問い合わせ内容の確認";

        	// メール本文を変数bodyに格納
		$body = <<< EOM
{$name}　様

お問い合わせありがとうございます。
以下のお問い合わせ内容を、メールにて確認させていただきました。

===================================================
【 お名前 】
{$name}

【 ふりがな 】
{$furigana}

【 メール 】
{$email}

【 電話番号 】
{$tel}

【 性別 】
{$gender}

【 項目 】
{$item}

【 内容 】
{$content}
===================================================

内容を確認のうえ、回答させて頂きます。
しばらくお待ちください。
EOM;

		// 送信元のメールアドレスを変数fromEmailに格納
		$fromEmail = "contact@dream-php-seminar.com";

		// 送信元の名前を変数fromNameに格納
		$fromName = "お問い合わせテスト";

		// ヘッダ情報を変数headerに格納する
		$header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";

		// メール送信を行う
		mb_send_mail($email, $subject, $body, $header);

 		// サンクスページに画面遷移させる
		header("Location: http://localhost:8888/develop/original%20siht/app/contact_result.php");
		exit;
	}

?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>お問い合わせフォーム</title>
<link rel="stylesheet" href="../css/contact.css">
<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300,100' rel='stylesheet'
</head>
<body>
<div><h1><a href="<?php echo TOP;?>">OPENET</a></h1></div>
<div><h2>お問い合わせ</h2></div>
<div>
	<form action="<?php echo CONTACT_RESULT;?>" method="post">
            <h1 class="contact-title">お問い合わせ 内容確認</h1>
            <p>お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
            <div>
                <div>
                    <label>お名前</label>
                    <p><?php echo $name; ?></p>
                </div>
                <div>
                    <label>ふりがな</label>
                    <p><?php echo $furigana; ?></p>
                </div>
                <div>
                    <label>メールアドレス</label>
                    <p><?php echo $email; ?></p>
                </div>
                <div>
                    <label>電話番号</label>
                    <p><?php echo $tel; ?></p>
                </div>
                <div>
                    <label>性別</label>
                    <p><?php echo $gender;?></p>
                </div>
                <div>
                    <label>お問い合わせ項目</label>
                    <p><?php echo $item; ?></p>
                </div>
                <div>
                    <label>お問い合わせ内容</label>
                    <p><?php echo nl2br($content); ?></p>
                </div>
            </div>
		<input type="button" value="内容を修正する" onclick="history.back(-1)">
		<button type="submit" name="submit">送信する</button>
		<input type="hidden" name="mode" value="RESULT" >
	</form>
</div>
</body>
</html>
