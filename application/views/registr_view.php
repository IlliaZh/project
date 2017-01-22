
<?php require('template_view.php');?>
	<h3><b>Регистрация</b></h3>
<div id="container">
	<form method="post" action="http://ci.ru/index.php/first/account_added">
		<input type="text" name="login" placeholder="login">
		<input type="password" name="password" placeholder="password">
		<input type="text" name="post" placeholder="post">
		<input type="submit" value="Создать аккаунт">
	</form>

</div>
<?php require('footer.php');?>
