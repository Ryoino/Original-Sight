<?php
require_once("../util/defineUtil.php");

function return_top(){
    return "<a href='http://localhost:8888/develop/original%20siht/app/top.php'>トップへ戻る</a>";
}

function storing_value($name){
    if(isset($_GET[$name])){
        $_SESSION[$name] = $_GET[$name];
        return $_GET[$name];
    }else{
        $_SESSION[$name] = null;
        return null;
    }
}

function bind_p2s($name){
    if(!empty($_POST[$name])){
        $_SESSION[$name] = $_POST[$name];
        return $_POST[$name];
    }else{
        $_SESSION[$name] = null;
        return null;
    }
}

function form_value($name){
  if(!empty($_SESSION[$name])){
    return $_SESSION[$name];
  }
}

function header_top(){
  return '
  <header>
  <div class="logo"><a href=" '. TOP .'">OPENET</a></div>
  <nav>' . login() . '</nav>
  </header>
  ';
}

function login(){
  if(isset($_SESSION['userstate']) && $_SESSION['userstate'] =='login'){ // セッションが'login'状態ならリンクつき名前とログアウトボタンを表示
    return '
    <div class="itembox">
      <ul>
      <li id="username"><a href="' . MY_DATA . '">' . $_SESSION['name'] . '様</a>
      <form action="'.LOGIN.'" method="POST">
        <input id="outbuttn" type="submit" name="logout" value="ログアウト"><br></li>
        <input type="hidden" name="mode" value="logout">
      </form>
       <li id="closet"><a id="closet" href=" '. CLOSET .' "><span class="hvr-float-shadow"> Closet</span></a></li>
       <li id="cart"><a class="hvr-buzz-out" href=" '. CART .' "><span class="genericon genericon-cart"></span></a>カートを見る</li>
     </ul>
    <div>
      ';
  } else { // セッションが'login'状態でないならログインと会員登録のリンクを設置
    return '
    <div class="login"><a href="' . LOGIN . '">ログイン</a></div>
            ';
  }
}

// ログアウト時のセッション内の情報のリセット
function logout(){
  session_unset();
  if (isset($_COOKIE['PHPSESSID'])) {
    // セッションの情報を初期化する
    setcookie('PHPSESSID', '', time() - 1800, '/');
  }
  // セッションに登録されたデータを全て破棄
  session_destroy();
}

//支払い方法
function ex_typenum($type){
    switch ($type){
        case 1;
            return "クレジットカード";
        case 2;
            return "代金引換";
        case 3;
            return "コンビニ払い";
        case 4;
            return "その他";

    }
}

/**
 * セッションを初期化する
 */
function session_clear(){
    // セッション変数を全て解除する
    $_SESSION = array();

    // セッションを切断するにはセッションクッキーも削除する。
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
    }

    // 最終的に、セッションを破壊する
    session_destroy();
}

function code_type($code){
  if(isset($_GET[$code])){
      return $_GET[$code];
  }else{
      $_GET[$code] = null;
      return null;
  }
}
