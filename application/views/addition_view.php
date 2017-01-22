<?php require('template_view.php');?>
	<h1><b>Здесь Вы можете добавить книгу </b></h1>

<div id="container">
	<form method="post" action="http://ci.ru/index.php/first/thanks">
	<input class="to_add" type="text" name="section" placeholder="Тематика" >
	<input class="to_add" type="text" name="title" placeholder="Название книги" >
	<input class="to_add" type="text" name="pages" placeholder="Количество страниц" >
	
	<label for="rad1">Стих</label>
	<input id="rad1" type="radio" name="type" value="стих">
	<label for="rad2">Глава книги</label>
	<input id="rad2" type="radio" name="type" value="глава книги">
	<label for="rad3">Рассказ</label>
	<input id="rad3" type="radio" name="type" value="глава книги">


	<textarea cols="100" wrap="hard"  rows="100" name="text" placeholder="Содержание книги"></textarea><br>
	<input class="click" type="submit" value="Добавить">

	</form>
</div>
<?php require('footer.php');?>
