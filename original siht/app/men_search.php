<?php
require_once("../util/scriptUtil.php");
require_once("../util/defineUtil.php");

$category_type = array(
                        'category_type' => storing_value('category_type')
                      );

//全ての商品情報
$xml_all = simplexml_load_file('../xml/items_all.xml');
$all = $xml_all->all;

//商品情報
$xml =  simplexml_load_file('../xml/items.xml');
$top = $xml->top;
$outer = $xml->outer;
$bottom = $xml->bottom ;
$shoes = $xml->shoes;
$cap = $xml->cap;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>検索結果</title>
<link rel="stylesheet" href="../css/initial.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/search.css">
<link rel="stylesheet" href="../animation/logo.css" media="screen" title="no title" charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300,100' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
</head>
<body>
  <header>

  <div class="logo"><a class="hvr-buzz-out" href=" ' . TOP . ' " >OPENET</a></div>

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
  if ($type == 'all'){ ?>
    <?php foreach ($all as $a) {?>
      <div class="item">
      <a href="<?php echo ITEM;?>?code=<?php echo $a->code;?>"><span class="name"><?php echo $a->name;?></span></a>
      <div class="clear"></div>
      <a href="<?php echo ITEM;?>?code=<?php echo $a->code;?>"><span class="img"><img src=<?php echo $a->img;?> width="200px" height="300px"></span></a>
      <div class="clear"></div>
      &yen<span class="price"><?php echo $a->price;?></span>
    <div class="clear"></div>
    <br><br>
    </div>
    <?php }?>
 <?php }
    //トップス
  if ($type == '1') { ?>
      <?php foreach ($top as $t) {?>
        <div class="item">
        <a href="<?php echo ITEM;?>?code=<?php echo $t->code;?>"><span class="name"><?php echo $t->name;?></span></a>
        <div class="clear"></div>
        <a href="<?php echo ITEM;?>?code=<?php echo $t->code;?>"><span class="img"><img src=<?php echo $t->img;?> width="200px" height="300px"></span></a>
        <div class="clear"></div>
        &yen<span class="price"><?php echo $t->price;?></span>
        <div class="clear"></div>
      <br><br>
      </div>
      <?php }?>
<?php }
    //アウター
  if ($type == '2') { ?>
    <?php foreach ($outer as $o) {?>
      <div class="item">
      <a href="<?php echo ITEM;?>?code=<?php echo $o->code;?>"><span class="name"><?php echo $o->name;?></span>
      <div class="clear"></div></a>
      <a href="<?php echo ITEM;?>?code=<?php echo $o->code;?>"><span class="img"><img src=<?php echo $o->img;?> width="200px" height="300px"></span></a>
      <div class="clear"></div>
      &yen<span class="price"><?php echo $o->price;?></span>
      <div class="clear"></div>
        <br><br>
        </div>
        <?php }?>
<?php }
    //ボトム
  if ($type == '3') { ?>
    <?php foreach ($bottom as $b) {?>
      <div class="item">
      <a href="<?php echo ITEM;?>?code=<?php echo $b->code;?>"><span class="name"><?php echo $b->name;?></span></a>
      <div class="clear"></div>
      <a href="<?php echo ITEM;?>?code=<?php echo $b->code;?>"><span class="img"><img src=<?php echo $b->img;?> width="200px" height="300px"></span></a>
      <div class="clear"></div>
      &yen<span class="price"><?php echo $b->price;?></span>
      <div class="clear"></div>
        <br><br>
        </div>
        <?php }?>
<?php }
    //シューズ
  if ($type == '4') { ?>
    <?php foreach ($shoes as $s) {?>
      <div class="item">
      <a href="<?php echo ITEM;?>?code=<?php echo $s->code;?>"><span class="name"><?php echo $s->name;?></span></a>
      <div class="clear"></div>
      <a href="<?php echo ITEM;?>?code=<?php echo $s->code;?>"><span class="img"><img src=<?php echo $s->img;?> width="200px" height="300px"></span></a>
      <div class="clear"></div>
      &yen<span class="price"><?php echo $s->price;?></span>
      <div class="clear"></div>
        <br><br>
        </div>
        <?php }?>
<?php }
    //帽子
  if ($type == '5') { ?>
    <?php foreach ($cap as $c) {?>
      <div class="item">
      <a href="<?php echo ITEM;?>?code=<?php echo $c->code;?>"><span class="name"><?php echo $c->name;?></span></a>
      <div class="clear"></div>
      <a href="<?php echo ITEM;?>?code=<?php echo $c->code;?>"><span class="img"><img src=<?php echo $c->img;?> width="200px" height="300px"></span></a>
      <div class="clear"></div>
      &yen<span class="price"><?php echo $c->price;?></span>
      <div class="clear"></div>
        <br><br>
        </div>
        <?php }?>
<?php }
 }
?>
</div>

</body>
</html>
