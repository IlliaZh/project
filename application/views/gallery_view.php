<?php require('template_view.php');
if($id > 0){
	foreach($menu_items as $item){
	if ($item['id'] == $id){
		$id = $item['id'];
		$l = $item['item'];	
}}}
?>
	<h1><b><?=$l?></b></h1>

<div id="container">
<?php if (is_array($pictures)){
		foreach ($pictures as $item){ ?>
			
			<div class="image" onclick="emerging<?=$item['id']?>()" >
				<img id="<?=$item['id']?>" src="<?=base_url().'img/'.$item['src']?>" title="<?=$item['title']?>">
				<label><?=$item['author']?> | <?=$item['name']?></label>
			</div>
		
<?php }} else echo '<h2>'.$pictures.'<h2>'; ?>
	<div id="emerging">
	<div id="close" onclick="closing()" ></div>
		<img src="" title="">
		<a target="_blank">Открыть в полном размере</a>
	</div>
</div>
<div class="comments">
	<h4>Ваш комментарий:</h4>
	<form method="post" action="/<?='index.php/first/gallery/'.$id?>">
		<input type="hidden"  name="artist" value="<?=$l?>">
		<textarea rows="4" cols="40" name="text" placeholder="Ваш Комментарий"></textarea>
		<input type="submit" value="Добавить комментарий">
	</form>
</div>
<h4>Комментарии:</h4>
<?php /* foreach ($comments as $comment){ ?>
<div class="comments">
	<p><b><?=$comment['name']?> </b> <?=$comment['date']?></p>
	<p><?=$comment['text']?></p>
</div>
<?php } */ print_r($comments); ?>


<?php  if (is_array($pictures)){
		foreach($pictures as $item){ ?>
	<script language="JavaScript" type="text/javascript" >
	function emerging<?=$item['id']?>(){
$("#emerging").css("top","5%");
$("#emerging img").attr('src','<?=base_url().'img/'.$item['src']?>');
$("#emerging img").attr('title','<?=$item['title']?>');
$("#emerging a").attr('href','<?=base_url().'img/'.$item['src']?>');

}
</script>
<?php }} ?>
<script language="JavaScript" type="text/javascript" >
function closing(){
	$("#emerging").css("top","-150%");
}
</script>
<?php require('footer.php');?>