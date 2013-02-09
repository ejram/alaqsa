
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
	
	public function get_levels_permit(){
		$username=$this->session->userdata('user_username');
		$this->db->select('permit_level');
		$permit_marks=$this->Mhome->get_where('aq_permissions', array('permit_username'=>$username));
		foreach ($permit_marks->result() as $row){
			$levels[$row->permit_level]=$row->permit_level;
	
		}
		return $levels;
	}
	
	
	
	 
	public function get_users(){
		$query=$this->db->get('aq_users');
		$users['']='اختر مستخدم';
		foreach ($query->result() as $row){
			$users[$row->user_username]=$row->user_username;
	
		}
		return $users;
	}
	public function get_classes(){
		$query=$this->db->get('aq_classes');
		foreach ($query->result() as $row){
			$classes[$row->class_name]=$row->class_name;

		}
		return $classes;
		 
	}
	
	public function get_teachers(){
		$query=$this->db->get('aq_teachers');
		foreach ($query->result() as $row){
			$teachers[$row->teacher_name]=$row->teacher_name;
	
		}
		return $teachers;
			
	}	
	
	public function get_tests(){
		$query=$this->db->get('aq_tests');
		foreach ($query->result() as $row){
			$tests[$row->test_name]=$row->test_name;
	
		}
		return $tests;
			
	}
	
	public function get_skills(){
		$query=$this->db->get('aq_skills');
		foreach ($query->result() as $row){
			$skills[$row->skill_name]=$row->skill_name;
	
		}
		return $skills;
			
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
