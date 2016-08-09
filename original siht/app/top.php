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
<link rel="stylesheet" href="../css/initial.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/style.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../animation/logo.css" media="screen" title="no title" charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300,100' rel='stylesheet' type='text/css'>
<body>

  <header>
    <div class="logo"><a class="hvr-buzz-out" href="#">OPENET</a></div>

  <nav><?php echo login(); ?></nav>

<div id="jender_women">
      <img src="../images/top_images/gender_women.jpeg" alt="" width="200px" height="300px"/>
    </div>
    <div class="clear"><div>
    <div id="jender_men">
      <img src="../images/top_images/gender_men.jpeg" alt="" width="200px" height="300px"/>
    </div>
<div class="clear"><div>

  <div id="button">
    <span id="women"><a href="<?php echo WOMEN_SEARCH; ?>">SHOP&nbsp;WOMEN</a></span>
    <span id="men"><a href="<?php echo MEN_SEARCH; ?>">SHOP&nbsp;MEN</a></>
  </div>

  </header>

</body>
</html>
