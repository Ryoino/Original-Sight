<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>openetオンラインストア</title>
<link rel="stylesheet" href="../css/header.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/initial.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../animation/logo.css" media="screen" title="no title" charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300,100' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css//genericons/genericons.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/style.css" media="screen" title="no title" charset="utf-8">
<body>

<div id="wrapper">

  <header>

  <?php echo header_top(); ?>

<div id="jender_women">
      <img src="../images/top_images/gender_women1.jpeg" alt="" width="750px" height="500"/>
    </div>
    <div class="clear"></div>
    <div id="jender_men">
      <img src="../images/top_images/gender_men1.jpeg" alt="" width="750px" height="500"/>
    </div>
<div class="clear"></div>

  <div id="button">
    <span id="women"><a href="<?php echo WOMEN_SEARCH; ?>">SHOP&nbsp;WOMEN</a></span>
    <span id="men"><a href="<?php echo MEN_SEARCH; ?>">SHOP&nbsp;MEN</a></>
  </div>
</header>

<footer>

<ul class="detail">
  <li class="list">
   <h3>Contact</h3>
     <ul>
       <li><a href="#">〒194-xxxx</a></li>
       <li><a href="#">東京都渋谷区x-x-x</a></li>
       <li><a href="#">TEL:03-5005-xxxx</a></li>
     </ul>
   </li>

  <li class="list">
  <h3>Company</h3>
    <ul>
      <li class><a href="#">店舗情報</a></li>
      <li><a href="#">会社概要</a></li>
      <li><a href="<?php echo CONTACT;?>">お問い合わせ</a></li>
    </ul>
  </li>

  <li class="list">
   <h3>Connect</h3>
    <ul>
      <li id="facebook">Facebook<a href="#"><span class="genericon genericon-facebook"></span></a></li>
      <li id="twitter">Twitter<a href="#"><span class="genericon genericon-twitter"></span></a></li>
      <li id="instgram">Instagram<a href="#"><span class="genericon genericon-instagram"></span></a></li>
    </ul>
  </li>
</ul>

</footer>

</div>

</body>
</html>
