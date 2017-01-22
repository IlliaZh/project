<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Библиотека.</title>
	<link rel="stylesheet" type="text/css" href="http://ci.ru/template_style.css">
</head>
<body>
<script type="text/javascript" src="http://ci.ru/jquery-3.1.1.js" ></script>
<script type="text/javascript" src="http://ci.ru/script.js" ></script>

<header>
<div class="head_block" style="margin: 0.7% 1% 0% 2%;">
<?php if(isset($_COOKIE['password'],$_COOKIE['login'])){ ?>
<a href="http://ci.ru/index.php/first/out">Выйти</a>
<a href="http://ci.ru/index.php/first/personal_page">Личный кабинет</a>
<?php } else { ?>
<a href="http://ci.ru/index.php/first/registr">Регистрация</a>
<a href="http://ci.ru/index.php/first/authorisation">Вход</a>
<?php } ?>
</div>
<div class="head_block" style="width:40%;">
<?php $letters = array ('А','Б','В','Г','Д','Е','Ж','З','И','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Э','Ю','Я');?>
<table >
<tr>
	<td>Живопись:  </td>
<?php foreach ($letters as $letter){ ?>
	<td style="margin-left:0.3%; letter-spacing: 0.15em; z-index:9;"><a href="http://ci.ru/index.php/first/gallery/<?=$letter?>"><?=$letter?></a></td>
<?php } ?>

</tr>
	<td>Литература:  </td>
<?php foreach ($letters as $letter){ ?>
	<td style="margin-left:0.3%; letter-spacing: 0.15em;"><a href="/"><?=$letter?></a></td>
<?php } ?>
<tr>
</tr>
</table>
<img src="http://ci.ru/imgimage004.jpg" >
</div>
<div class="head_block" style="text-align:right; margin-top: 1%; width:20%;"">
<?php if(isset($_COOKIE['login'])){
	echo '<p>'.$_COOKIE['login'].'</p>';
	} ?>
</div>


<div class="navigation">
<ul class="menu">
<label for="button"></label>
<input type="checkbox" id="button"></input>	
	<?php	foreach($menu_items as $key => $item) {$sections[] = $item['section'];}
			$sections_unique = array_unique($sections); 
			rsort($sections_unique);
			
				
				foreach($sections_unique as $key => $item){ 
					if(!empty($item)){ ?>
								<li class="menu_list"><a href=""><?=$item?></a>
										<ul class="submenu">
											<?php	foreach ($menu_items as $item1){ 
												if ($item1['section'] == $item) { ?>
											<li class="submenu_list" ><a href="http://ci.ru/index.php/first<?=$item1['url'].$item1['id']?>"><?=$item1['item']?></a></li>
											<?php } } ?>
										</ul>	
								</li>
				<?php } } ?>
			
			
			
			
</ul>
</div>
</header>
<div class="sidebar">
<input class="search" type="text" name="search" value="" placeholder="Поиск по сайту">
<input class="click" type="submit" value="Click" >
<?php if(isset($_COOKIE['password'],$_COOKIE['login'])){ ?>
<div class="side">
<ul class="side_menu" >
	<?php foreach($menu_items as $item){
		if ($item['section'] == '') { ?>
			<li class="side_menu_list">
				<a href="<?=$item['url'];?>" title="<?=$item['title'];?>" > <?=$item['item'];?> </a>
			</li>
	<?php } } ?>
			<li class="side_menu_list">
				<a onclick="add_picture()">Добавить картину</a>
			</li>
</ul>
</div>
<script language="JavaScript" type="text/javascript" >
	function add_picture(){
	$("div.pic").html('<div id="add_picture"><div id="close" onclick="close_add_picture()" ></div><p>Добавить картину</p><form method="post" action="http://ci.ru/index.php/first/new_picture" enctype="multipart/form-data" > <input type="text" name="author" placeholder="Автор"><input type="text" name="name" placeholder="Название картины"><input type="text" name="title" placeholder="Описание картины"><input type="hidden" name="MAX_FILE_SIZE" value="10000000"><input type="file" name="image" accept="image/*"><br><input type="submit" value="Добавить"> </form></div>');
	}
	function close_add_picture (){
		$("div.pic").html('');
	}
</script>
<?php } ?>

<div class="widget">
<?php
	$t = getdate();
	echo '<p>'.$t['hours'].':'.$t['minutes'].'</p>';
?>
</div>
<div class="widget">
</div>
<div class="pic">
</div>
</div>
