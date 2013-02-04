
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
		$levels['']='اختر المرحلة';
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
	public function validate(){
		// grab user input
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
	
		// Prep the query
		$this->db->where('user_username', $username);
		$this->db->where('user_password', $password);
	
		// Run the query
		$query = $this->db->get('aq_users');
		// Let's check if there are any results
		if($query->num_rows == 1)
		{
			// If there is a user, then create session data
			$row = $query->row();
			$data = array(
					'user_id' => $row->user_id,
					'user_name' => $row->user_name,
					'user_username' => $row->user_username,
					'user_role' => $row->user_role,
					'validated' => true
			);
			$this->session->set_userdata($data);
			return true;
		}
		// If the previous process did not validate
		// then return false.
		return false;
	}
	

}
