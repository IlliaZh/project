<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class First extends CI_Controller {
	
	
	function book($book_id){
		$data['menu_items'] = $this->menu_items_model->get_menu_items();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/first/book/'.$book_id;
		$config['total_rows'] = $this->db->count_all('literature');
		$config['per_page'] = '1'; 
		$this->pagination->initialize($config); 
		$this->load->model('literature_model');
		$data['literature'] = $this->literature_model->get_book($config['per_page'],$this->uri->segment(4));
		$this->load->view('book_view',$data);		
	}

	function poetry($author) {
		$this->load->model('poetry_model');
		$data['poetry'] = $this->poetry_model->get_poetry();
		$data['menu_items'] = $this->menu_items_model->get_menu_items();
		$this->load->view('poetry_view',$data);
	}
	
	function gallery($id) {
		$data['menu_items'] = $this->menu_items_model->get_menu_items();	
		$this->load->model('pictures_model');
		$this->pictures_model->add_comment($_POST);
		$data['id'] = $id;
			if($id > 0){
				$data['pictures'] = $this->pictures_model->get_pictures_by_name($id,$data);	
			}else{
				$id = $this->menu_items_model->rus2translit($id);
				$data['l'] = $id;
				$data['pictures'] = $this->pictures_model->get_pictures_by_letter($id);
			}
		$this->load->view('gallery_view', $data);
	}
	function addition() { 
		$data['menu_items'] = $this->menu_items_model->get_menu_items();
		$this->load->view('addition_view',$data);
	}
	function thanks() {
		$data['section'] = $_POST['section'];
		$data['title'] = $_POST['title'];
		$data['text'] = $_POST['text'];
		$data['pages'] = $_POST['pages'];
		$this->load->model('articles_model');
		$this->articles_model->add_book($data);	
		$data['menu_items'] = $this->menu_items_model->get_menu_items();
		$this->load->view('thanks_view',$data);
	}
	function new_picture() {
		$data1['item'] = $_POST['author'];
		$data1['section'] = 'Живопись';		
		$data1['url'] = '/gallery/';
		$data1['title'] = $_POST['author'];
		$data['author'] = $_POST['author'];
		$data['name'] = $_POST['name'];
		$data['src'] = $_FILES['image']['name'];
		$data['title'] = $_POST['title'];
		$this->load->model('pictures_model');	
		
		if(!($this->pictures_model->add_picture($data,$_FILES)))
			$this->menu_items_model->add_menu_item($data1);	
		else echo $this->pictures_model->add_picture($data,$_FILES);
	}
	
	
	function registr() {
		
		$data['menu_items'] = $this->menu_items_model->get_menu_items();
		$this->load->view('registr_view',$data);
	}
	
	function account_added() {
	/*	$_POST['password'] = md5($_POST['password']); */
		$this->load->model('account_added_model');
		$this->account_added_model->det_acc($_POST);
		$data['menu_items'] = $this->menu_items_model->get_menu_items();
		$this->load->view('authorisation_view',$data);
	}
	function authorisation() {
		$data['menu_items'] = $this->menu_items_model->get_menu_items();
		$this->load->view('authorisation_view',$data);

	}
	function out() {
		setcookie('login','');
		setcookie('password','');
		header("Location:http://ci.ru/index.php/first/authorisation");
		}
	function in(){
		$this->load->model('accounts_model');
		$data['accounts'] = $this->accounts_model->get_accounts();
		$this->accounts_model->auth($data['accounts']);
	header("Location:http://ci.ru/index.php/first/personal_page");
	} 
	function personal_page(){
		$this->load->model('accounts_model');
		$data['accounts'] = $this->accounts_model->get_accounts();
		$this->accounts_model->auth($data['accounts']);
		$data['menu_items'] = $this->menu_items_model->get_menu_items();
		$this->load->view('personal_page_view',$data,$_POST);	
	}
	/*function add()
	{
		$data['title'] = 'Парадокс Лапьера';
		$data['text'] = "Эксперимент проводился в два этапа";
		$data['date'] = '2016-12-26';
		$this->load->model('articles_model');
		$this->articles_model->add($data);	
	}
	function edit()
	{
		$data['title'] = 'Заголовок';
		$data['text'] = 'Текст';
		$data['date'] = '2016-12-31';
		$this->load->model('articles_model');
		$this->articles_model->edit($data);	
		
	}
	function del($id)
	{
		$this->load->model('articles_model');
		$this->articles_model->del($id);	
	}*/
	
	function time(){
	$data['menu_items'] = $this->menu_items_model->get_menu_items();
	foreach($data['menu_items'] as $i =>$v){
		echo '<br>'.$i.'<br>';
		print_r ($v);
	}
	$t = getdate();
	echo '<p>'.$t['hours'].':'.$t['minutes'].'</p>';
	}
}	