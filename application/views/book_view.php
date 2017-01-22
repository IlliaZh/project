	
<?php include('template_view.php');?>

	<h1><b>Симулякры и Симуляция</b></h1>
<div id="container">
		<?php foreach($literature as $item){ ?>
				<h2><?=$item['title'];?></h2>
				<p><?=$item['text'];?></p>
			<?php }?>
</div>
		<p class="pagination"><?php echo $this->pagination->create_links(); ?></p>
<?php require('footer.php');?>

</body>
</html>