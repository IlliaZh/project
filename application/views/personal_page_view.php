<?php 
	require('template_view.php');?>
	<h3><b>Личный кабинет</b></h3>
<div id="container">
<?php if(isset($_COOKIE['login'])){
	echo '<h2>Здравствуй, '.$_COOKIE['login'].'</h2>';
	} ?>
</div>
<?php require('footer.php');?>
