<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_model extends CI_Model {
	function det_acc($data){
	$this->db->insert('accounts',$data);
	}	
	
	function get_accounts() {
	$query = $this->db->get('accounts');
		return $query->result_array();
	}
	function auth($accounts){
		if(isset($_POST['login'])){ 
			$i = 0;
			foreach($accounts as $item){
			/*	$_POST['password'] = md5($_POST['password']); */
				if($_POST['login'] == $item['login'] && $_POST['password'] == $item['password']) {
					setcookie('login',$_POST['login']);
					setcookie('password',$_POST['password']); 
					$i = 1;
				}
			} 
			if ($i = 0)
				echo 'ВВЕДЕН НЕВЕРНЫЙ ПАРОЛЬ ИЛИ ЛОГИН';
		}
	}
	
}
?>