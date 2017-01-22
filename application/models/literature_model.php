<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Literature_model extends CI_Model {
	
	function get_book($num,$offset)
	{
		$query = $this->db->get('literature',$num,$offset);
		return $query->result_array();
	}
	function get_schoolbook($num,$offset)
	{
		$query = $this->db->get('schoolbook',$num,$offset);
		return $query->result_array();
	}
	function get_poetry() {
	$query = $this->db->get('literature');
		return $query->result_array();
	}
	/*
	function add($data)
	{
		$this->db->insert('articles',$data);
	}
	function edit($data)
	{
		$this->db->where('id',7);
		$this->db->update('articles',$data);
	}
	function del($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('articles');
	}
	function add_book($data)
	{
		$this->db->insert('new_works',$data);
		
	}*/
	
		

	
}
