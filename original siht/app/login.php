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
<title>ログイン/ログアウト</title>
</head>
<body>
  <?php
    if (isset($_POST['mode']) && $_POST['mode'] == 'logout'){
      logout();
  ?>
        <p>ログアウトしました</p><br>
        <a href="<?php echo ROOT_URL; ?>">トップページへ戻る</a><br>
  <?php
    }else{
      // POST値に名前とパスワードが存在し　かつ　名前とパスワードが一致した場合ログイン
      if(isset($_POST['name']) && isset($_POST['password'])) {
        // 名前とパスワードでヒットした登録者の情報を配列として格納
        $result = search_profiles($_POST ['name'], $_POST['password']);
        $flag = 0;
        if ($_POST['name'] == $result[0]['name'] && $_POST['password'] == $result [0]['password'] &&  $flag == $result[0]['deleteFlg']){
            // 各セッション情報に配列からの値を格納
            $_SESSION['userID'] = $result[0]['userID'];
            $_SESSION["name"] = $result[0]['name'];
            $_SESSION["userstate"] = 'login'; // ログインできる状態にする
            echo 'ログインしました。';
            echo '<a href="'.$_POST['before'].'">前のページへ戻る</a>';
        }else{
          echo "ユーザー名またはパスワードが違います<br>";
        }
      }else{ ?>
        <p>ログイン</p>
        <form action="<?php echo LOGIN; ?>" method="POST">
          <p>ユーザー名:<input type="text" name="name"></p>
          <p>パスワード:<input type="pass" name="password"></p>
          <input type="hidden" name="before" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
          <input class="submit" type="submit" name="btnSubmit" value="ログイン">
        </form>
  <?php
      }
    }
  ?>

  </body>
  </html>
