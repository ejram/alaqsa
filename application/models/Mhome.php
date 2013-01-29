
<?php
class Mhome extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	 
	public function get_where($table_where,$array_where)
	{
		$this->db->from($table_where)->where($array_where);
		return $this->db->get();
	}
	 
	public function Get_query_all($table)
	{
		$Q = $this->db->get($table);
		return $Q;
	}

	public function Get_query_row($table)
	{
		$Q=$this->db->get($table);
		return $Q;
	}

	public function Update_query($table,$data,$where)
	{
		$this->db->update($table, $data, $where);
	}

	public function delete_query($table,$where,$value)

	{
		$this->db->where($where, $value);
		$this->db->delete($table);
		 

	}

	public function Insert_query($table,$data)
	{
		$this->db->insert($table, $data);
	}

	public function add($var1,$var2)
	{
		echo $var1+$var2;
	}

	public function get_levels(){
		$query=$this->db->get('aq_levels');
		foreach ($query->result() as $row){
			$levels[$row->level_name]=$row->level_name;

		}
		return $levels;
	}
	 
	public function get_classes(){
		$query=$this->db->get('aq_classes');
		foreach ($query->result() as $row){
			$classes[$row->class_name]=$row->class_name;

		}
		return $classes;
		 
	}
	public function get_rooms(){
		$query=$this->db->get('aq_rooms');
		foreach ($query->result() as $row){
			$rooms[$row->room_name]=$row->room_name;
	
		}
		return $rooms;
			
	}
	

}
