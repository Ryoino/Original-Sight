<?php
session_start();
require_once("../util/scriptUtil.php");
require_once("../util/defineUtil.php");

$gender =isset($_GET['gender']) ? $_GET['gender']:null;
$men = $_SESSION['gender'] = $gender;

$category_type = array(
                        'category_type' => storing_value('category_type')
                      );

    //全ての商品情報
    $xml_all = simplexml_load_file('../xml/items_all.xml');
    $all = $xml_all->men->all;

    //商品情報
    $xml =  simplexml_load_file('../xml/items.xml');
    $top = $xml->men->top;
    $outer = $xml->men->outer;
    $bottom = $xml->men->bottom ;
    $shoes = $xml->men->shoes;
    $cap = $xml->men->cap;

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>検索結果</title>
<link rel="stylesheet" href="../css/header.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/initial.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/search.css">
<link rel="stylesheet" href="../animation/logo.css" media="screen" title="no title" charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300,100' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css//genericons/genericons.css" media="screen" title="no title" charset="utf-8">
<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
</head>
<body>
    <div id="wrapper">

  <header>

  <?php echo header_top(); ?>

<div class="jender">MEN/<span class="jender_search"><a href="<?php echo WOMEN_SEARCH;?>">WOMEN</a></span></div>

  <nav class="category">
    <ul>
    	<li><a id="type_a" href="<?php echo MEN_SEARCH.'?category_type=all';?>">ALL</a></li>
    	<li><a id="type_t" href="<?php echo MEN_SEARCH.'?category_type=1';?>">TOP</a></li>
    	<li><a id="type_o" href="<?php echo MEN_SEARCH.'?category_type=2';?>">OUTER</a></li>
    	<li><a id="type_b" href="<?php echo MEN_SEARCH.'?category_type=3';?>">BOTTOM</a></li>
      <li><a id="type_s" href="<?php echo MEN_SEARCH.'?category_type=4';?>">SHOES</a></li>
    	<li><a id="type_c" href="<?php echo MEN_SEARCH.'?category_type=5';?>">CAP</a></li>
    </ul>
  </nav>
  <div class="clear"></div>
</header>

<div id="item_result">

<?php foreach ($category_type as $type) {?>

<?php
    //全てのアイテム
  if ($type == 'initial'){ ?>
    <?php foreach ($all as $a) {?>
      <div class="item">
      <span class="name"><a href="<?php echo ITEM;?>?code=<?php echo $a->code;?>"><?php echo $a->name;?></a></span>
      <div class="clear"></div>
      <span class="img"><a href="<?php echo ITEM;?>?code=<?php echo $a->code;?>"><img src=<?php echo $a->img;?> width="200px" height="300px"></a></span>
      <div class="clear"></div>
      <span class="price">&yen<?php echo $a->price;?></span>
    <div class="clear"></div>
    <br><br>
    </div>
    <?php }?>
 <?php }?>


<?php
    //全てのアイテム
  if ($type == 'all'){ ?>
    <?php foreach ($all as $a) {?>
      <div class="item">
      <span class="name"><a href="<?php echo ITEM;?>?code=<?php echo $a->code;?>"><?php echo $a->name;?></a></span>
      <div class="clear"></div>
      <span class="img"><a href="<?php echo ITEM;?>?code=<?php echo $a->code;?>"><img src=<?php echo $a->img;?> width="200px" height="300px"></a></span>
      <div class="clear"></div>
      <span class="price">&yen<?php echo $a->price;?></span>
    <div class="clear"></div>
    <br><br>
    </div>
    <?php }?>
 <?php }?>

<?php  //トップス
  if ($type == '1') { ?>
      <?php foreach ($top as $t) {?>
        <div class="item">
        <span class="name"><a href="<?php echo ITEM;?>?code=<?php echo $t->code;?>"><?php echo $t->name;?></a></span>
        <div class="clear"></div>
        <span class="img"><a href="<?php echo ITEM;?>?code=<?php echo $t->code;?>"><img src=<?php echo $t->img;?> width="200px" height="300px"></a></span>
        <div class="clear"></div>
        <span class="price">&yen<?php echo $t->price;?></span>
        <div class="clear"></div>
      <br><br>
      </div>
      <?php }?>
<?php }?>

<?php //アウター
  if ($type == '2') { ?>
    <?php foreach ($outer as $o) {?>
      <div class="item">
      <span class="name"><a href="<?php echo ITEM;?>?code=<?php echo $o->code;?>"><?php echo $o->name;?></a></span>
      <div class="clear"></div></a>
      <span class="img"><a href="<?php echo ITEM;?>?code=<?php echo $o->code;?>"><img src=<?php echo $o->img;?> width="200px" height="300px"></a></span>
      <div class="clear"></div>
      <span class="price">&yen<?php echo $o->price;?></span>
      <div class="clear"></div>
        <br><br>
        </div>
        <?php }?>
<?php }?>

<?php //ボトム
  if ($type == '3') { ?>
    <?php foreach ($bottom as $b) {?>
      <div class="item">
      <span class="name"><a href="<?php echo ITEM;?>?code=<?php echo $b->code;?>"><?php echo $b->name;?></a></span>
      <div class="clear"></div>
      <span class="img"><a href="<?php echo ITEM;?>?code=<?php echo $b->code;?>"><img src=<?php echo $b->img;?> width="200px" height="300px"></span></a>
      <div class="clear"></div>
      <span class="price">&yen<?php echo $b->price;?></span>
      <div class="clear"></div>
        <br><br>
        </div>
        <?php }?>
<?php }
    //シューズ
  if ($type == '4') { ?>
    <?php foreach ($shoes as $s) {?>
      <div class="item">
      <span class="name"><a href="<?php echo ITEM;?>?code=<?php echo $s->code;?>"><?php echo $s->name;?></a></span>
      <div class="clear"></div>
      <span class="img"><a href="<?php echo ITEM;?>?code=<?php echo $s->code;?>"><img src=<?php echo $s->img;?> width="200px" height="300px"></a></span>
      <div class="clear"></div>
      <span class="price">&yen<?php echo $s->price;?></span>
      <div class="clear"></div>
        <br><br>
        </div>
        <?php }?>
<?php }?>

<?php //帽子
  if ($type == '5') { ?>
    <?php foreach ($cap as $c) {?>
      <div class="item">
      <span class="name"><a href="<?php echo ITEM;?>?code=<?php echo $c->code;?>"><?php echo $c->name;?></a></span>
      <div class="clear"></div>
      <a href="<?php echo ITEM;?>?code=<?php echo $c->code;?>"><span class="img"><img src=<?php echo $c->img;?> width="200px" height="300px"></span></a>
      <div class="clear"></div>
      <span class="price">&yen<?php echo $c->price;?></span>
      <div class="clear"></div>
        <br><br>
        </div>
        <?php }?>
<?php }
 }
?>
</div>

</div>

</body>
</html>
