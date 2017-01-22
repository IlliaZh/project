<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_items_model extends CI_Model {

	function get_menu_items() {
		$query = $this->db->get('menu_items');
			return $query->result_array();
	}
	
	function add_menu_item($data) {
		$query = $this->db->get('menu_items');
		$menu['menu_items'] = $query->result_array();
		
		foreach($menu['menu_items'] as $menu_item){
			$o = in_array($data['item'],$menu_item);
			if ($o == 1){
				break;
			}
		}
		if($o != 1){
			$this->db->insert('menu_items',$data);
		}
	}
	
		function rus2translit($string) {
		$converter = array(
        '%D0%90' => 'А',   '%D0%91' => 'Б',   '%D0%92' => 'В',
        '%D0%93' => 'Г',   '%D0%94' => 'Д',   '%D0%95' => 'Е',
		'%D0%96' => 'Ж',  '%D0%97' => 'З',    '%D0%98' => 'И',
		'%D0%9A' => 'К',
        '%D0%9B' => 'Л',   '%D0%9C' => 'М',   '%D0%9D' => 'Н',
        '%D0%9E' => 'О',   '%D0%9F' => 'П',   '%D0%A0' => 'Р',
        '%D0%A1' => 'С',   '%D0%A2' => 'Т',   '%D0%A3' => 'У',
        '%D0%A4' => 'Ф',   '%D0%A5' => 'Х',   '%D0%A6' => 'Ц',
        '%D0%A7' => 'Ч',  '%D0%A8' => 'Ш',  '%D0%A9' => 'Щ',
        '%D0%AD' => 'Э',   '%D0%AE' => 'Ю',  
		'%D0%AF' => 'Я',
		);
		return strtr($string, $converter);
	}
}
?>