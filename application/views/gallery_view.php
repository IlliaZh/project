<?php require('template_view.php');
foreach($menu_items as $item){
	if ($item['id'] == $id){
	$author = $item['item'];	
	 echo '<h1><b>'.$item['item'].'</b></h1>';
}}?>

<div id="container">
<?php foreach ($pictures as $item){
	if($item['author'] == $author) { ?>
			
			<div class="image" onclick="emerging<?=$item['id']?>()" >
				<img id="<?=$item['id']?>" src="<?=base_url().'img/'.$item['src']?>" title="<?=$item['title']?>">
				<label><?=$item['name']?></label>
			</div>
		
	<?php }} ?>
	<div id="emerging">
	<div id="close" onclick="closing()" ></div>
		<img src="" title="">
		<a target="_blank">Открыть в полном размере</a>
	</div>
</div>
<div id="comments">
<h4>Комментарии:</h4>
<form method="post">
<input type="text" name="name" placeholder="Ваше имя">
<textarea rows="4" cols="40" name="comment" placeholder="Ваш Комментарий"></textarea>
</form>
</div>
<?php  foreach($pictures as $item){ ?>
	<script language="JavaScript" type="text/javascript" >
	function emerging<?=$item['id']?>(){
$("#emerging").css("top","5%");
$("#emerging img").attr('src','<?=base_url().'img/'.$item['src']?>');
$("#emerging img").attr('title','<?=$item['title']?>');
$("#emerging a").attr('href','<?=base_url().'img/'.$item['src']?>');

}
</script>
<?php } ?>
<script language="JavaScript" type="text/javascript" >
function closing(){
	$("#emerging").css("top","-150%");
}
</script>
<?php require('footer.php');?>
