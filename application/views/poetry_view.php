<?php require('template_view.php');?>
	<h1><b>Лермонтов</b></h1>
<div id="container">

<ul class="verses">

<?php
	foreach($poetry as $item) {
		if($item['author'] == 'lermontov') {
?>
	
	<li class="verse_area">
	<label for="slide<?=$item['id']?>"><?=$item['title']?></label>
	<input type="checkbox" id="slide<?=$item['id']?>"/>
	<p class="verse">
		<?=$item['text']?>
	</p>
	</li>
	
		<?php } } ?>
</ul>
</div>
<?php require('footer.php');?>
