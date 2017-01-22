<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pictures_model extends CI_Model {
	


	function get_pictures_by_name($id, $data) {
			foreach($data['menu_items'] as $item){
			if ($item['id'] == $id){
			$author = $item['item'];
		}}
		$query = $this->db->get('pictures');
		$pictures =  $query->result_array();	
		foreach($pictures as $key => $picture){
			if($picture['author'] == $author)
				$links[] = $picture;
		}
		if(isset($links))
			return $links;
	}
	
	function add_picture($data,$_FILES) {
		
		if(!$_FILES['image']['error']){
				move_uploaded_file($_FILES['image']['tmp_name'], 'D:\home\ci.ru\www\img\\'.$_FILES['image']['name']);
				$this->db->insert('pictures',$data);
				header("Location:http://ci.ru/index.php/first/personal_page");
				return TRUE;
		}else{
			switch($_FILES['image']['error']){
				case 1:$message = 'Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini.';
					break;
				case 2:	$message = 'Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме.';
					break;
				case 3:$message = 'Загружаемый файл был получен только частично.';
					break;
				case 4:	$message = 'Файл не был загружен.';
					break;
				case 6:	$message = 'Отсутствует временная папка.';
					break;
				case 7:	$message = 'Не удалось записать файл на диск.';
					break;
				case 8:$message = '';
					break;
				case 8:$message = '8';
					break;
				echo '<h1>ОШИБКА:</h1><h1>'.$message.'</h1>';
					
			}
			return FALSE;
		}
		
	}
	
	function get_pictures_by_letter($letter){	
		function engtranslit($string) {
			$convert = array(
				'А' => 'A',   'Б' => 'B',   'В' => 'V',	'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
				'Ё' => 'E',   'Ж' => 'J',   'З' => 'Z',	'И' => 'I',   'К' => 'K',	'Л' => 'L', 
				'М' => 'M',   'Н' => 'N',	'О' => 'O', 'П' => 'P',   'Р' => 'R',   'С' => 'S',   
				'Т' => 'T',   'У' => 'U',   'Я' => '7', 'Ф' => 'F',   'Х' => 'H',   'Ц' => '1',
				'Ч' => '2',   'Ш' => '3',   'Щ' => '4', 'Э' => '5',   'Ю' => '6',  	);
			return strtr($string, $convert);}
		$query = $this->db->get('pictures');
		$data['pictures'] = $query->result_array();
		
		foreach($data['pictures'] as $k => $v){
			foreach($v as $key => $value){
				switch($key){
				case 'author':		$authors[] = $value;break;
				case 'name':		$names[] = $value;break;
				case 'src':			$srcs[] = $value;break;
				case 'id':			$id[] = $value;break;
				case 'title':		$title[] = $value;break;
		}	}	}
		foreach($authors as $k => $v ){
			if(substr(engtranslit($v),0,1) == engtranslit($letter)){
				$auth[] = $v;	$pic[] = $names[$k];	$uris[] = $srcs[$k];	$titles[] = $title[$k];		$ids[] = $id[$k];
		}	}
		if(isset($auth)){
			for($i = 0; $i < count($auth);$i++){
				$links[$i] = array('author' =>$auth[$i],'name' =>$pic[$i],'src' =>$uris[$i],'title' =>$titles[$i],'id' =>$ids[$i]);
			}
				sort($links);
				return $links;
		}else{
			$result = 'Не найдено';
			return $result;
		}
		/*$limit = count($data['pictures']);
		for($i = 0; $i < $limit; $i++){	
				if(substr(engtranslit($data['pictures'][$i]['author']),0,1) == engtranslit($letter))
				$is_found = 1;
				else
				unset($data['pictures'][$i]);
		}	
		if(isset($is_found)){
			$links = $data['pictures'];
			return $links;
		}else{
			$result = 'Не найдено';
			return $result;
			
			foreach($menu_items as $item){
			if ($item['id'] == $id){
			$author = $item['item'];	
			echo '<h1><b>'.$item['item'].'</b></h1>';
			}}
			
		}*/
	}
	
		/*function translit ($string) {
		$converter = array(
			'а' => 'a',   'б' => 'b',   'в' => 'v',
			'г' => 'g',   'д' => 'd',   'е' => 'e',
			'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
			'и' => 'i',   'й' => 'y',   'к' => 'k',
			'л' => 'l',   'м' => 'm',   'н' => 'n',
			'о' => 'o',   'п' => 'p',   'р' => 'r',
			'с' => 's',   'т' => 't',   'у' => 'u',
			'ф' => 'f',   'х' => 'h',   'ц' => 'c',
			'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',   
			'ы' => 'y',
			'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
			

			
			'А' => 'A',   'Б' => 'B',   'В' => 'V',
			'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
			'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
			'И' => 'I',   'Й' => 'Y',   'К' => 'K',
			'Л' => 'L',   'М' => 'M',   'Н' => 'N',
			'О' => 'O',   'П' => 'P',   'Р' => 'R',
			'С' => 'S',   'Т' => 'T',   'У' => 'U',
			'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
			'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
			'Ы' => 'Y',	  'Э' => 'E',   'Ю' => 'Yu',  
			'Я' => 'Ya',
		);
		return strtr($string, $converter);
	}*/
	
}

?>