<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();

	}
	//////////////////////
	public function index()
	{

		$user_role = $this->session->userdata('user_role');

		switch ($user_role)
		{
			case 'admin':
				$this->c_panel('aq_levels');
				break;

			case 'user':
				$this->c_panel('aq_tests');
				break;

		}
	}
	////////////////////
	public function c_panel($table_data)
	{
		$data ['table_data'] = $table_data;
		$this->load->view('admin_header');
		$this->load->view('admin_content', $data);
		$this->load->view('admin_footer');
		$this->load->view('admin_addation');
	}
	//////////////////
	private function check_isvalidated(){
		if(! $this->session->userdata('validated')){
			redirect('login');
		}
	}
	///////////////////
	public function do_logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	////////////////////
	public function del_query($table, $where, $value)
	{
		echo $this->Mhome->delete_query($table, $where, $value);
	}
	///////////////////
	public function ins_query($table, $data)
	{
		$this->Mhome->Insert_query($table, $data);
	}


	////////////////
	public function del_class() {
		$table_name = $_POST ['hidden_table_name'];
		$item_id    = $_POST ['hidden_item_id'];
		if( ! empty ( $_POST ['check_list'] ) )
		{
			foreach ( $_POST ['check_list'] as $check)
			{
				$this->del_query( $table_name, $item_id, $check);
			}
		}
	}
	//////////////////
	public function ins_class() {
		$aqsa_level1	= $_POST['aqsa_level2'];
		$aqsa_class1 	= $_POST['aqsa_class2'];
		$att1 = array('class_level'	=> $aqsa_level1,
				'class_name'	=> $aqsa_class1
		);
		$this->ins_query('aq_classes', $att1);

	}
	//////////////////
	public function level_insert() {
		$level_name	= $_POST['level_insert_name'];
		$att1 = array	('level_name' => $level_name);
		$this->ins_query('aq_levels', $att1);

	}
	//////////////////
	public function teacher_insert() {
		$att1 = array(
				'teacher_name' 			=> $_POST ['teacher_name'],
				'teacher_idnumber'		=> $_POST ['teacher_idnumber'],
				'teacher_birthplace'	=> $_POST ['teacher_birthplace'],
				'teacher_birthdate'		=> $_POST ['teacher_birthdate'],
				'teacher_specialist'	=> $_POST ['teacher_specialist'],
				'teacher_gradedate'		=> $_POST ['teacher_gradedate'],
				'teacher_qual'			=> $_POST ['teacher_qual'],
				'teacher_university'	=> $_POST ['teacher_university'],
				'teacher_nationality'	=> $_POST ['teacher_nationality'],
				'teacher_email'			=> $_POST ['teacher_email'],
				'teacher_mobile'		=> $_POST ['teacher_mobile']
		);
		$this->ins_query('aq_teachers', $att1);

	}
	
	//////////////////
	public function mark_insert() {
		$att1 = array(
				'mark_level' 	=> $_POST ['mark_level'],
				'mark_class'	=> $_POST ['mark_class'],
				'mark_room'		=> $_POST ['mark_room'],
				'mark_subject'	=> $_POST ['mark_subject'],
				'mark_test'		=> $_POST ['mark_test'],
				'mark_skill'	=> $_POST ['mark_skill'],
				'mark_student'	=> $_POST ['mark_student'],
				'mark_value'	=> $_POST ['mark_value']
		);
		$this->ins_query('aq_marks', $att1);
	
	}


	//////////////////
	public function permission_insert() {
		$att1 = array(
				'permit_username' 	=> $_POST ['permit_username'],
				'permit_level'		=> $_POST ['permit_level'],
				'permit_class'		=> $_POST ['permit_class'],
				'permit_room'		=> $_POST ['permit_room'],
				'permit_subject'	=> $_POST ['permit_subject']
		);
		$this->ins_query('aq_permissions',$att1);
	}

	//////////////////
	public function report_insert() {
		$att1 = array(
				'report_name' 		=> $_POST ['report_name'],
				'report_level'		=> $_POST ['report_level'],
				'report_class'		=> $_POST ['report_class'],
				'report_room'		=> $_POST ['report_room'],
				'report_subject'	=> $_POST ['report_subject'],
				'report_test'		=> $_POST ['report_test'],
				'report_skill'		=> $_POST ['report_skill']
		);
		$this->ins_query('aq_reports',$att1);

	}



	//////////////////
	public function student_insert() {
		$att1 = array(
				'st_nationality' 	=> $_POST ['st_nationality'],
				'st_passnum'		=> $_POST ['st_passnum'],
				'st_urbannum'		=> $_POST ['st_urbannum'],
				'st_iddate'			=> $_POST ['st_iddate'],
				'st_stayvalid'		=> $_POST ['st_stayvalid'],
				'st_fna'			=> $_POST ['st_fna'],
				'st_fne'			=> $_POST ['st_fne'],
				'st_ffna'			=> $_POST ['st_ffna'],
				'st_ffne'			=> $_POST ['st_ffne'],
				'st_gfna'			=> $_POST ['st_gfna'],
				'st_gfne'			=> $_POST ['st_gfne'],
				'st_lna' 			=> $_POST ['st_lna'],
				'st_lne'			=> $_POST ['st_lne'],
				'st_birthdate'		=> $_POST ['st_birthdate'],
				'st_birthdate'		=> $_POST ['st_birthdate'],
				'st_guardname'		=> $_POST ['st_guardname'],
				'st_guardbirth'		=> $_POST ['st_guardbirth'],
				'st_guardplace'		=> $_POST ['st_guardplace'],
				'st_guardidnum'		=> $_POST ['st_guardidnum'],
				'st_guardiddate'	=> $_POST ['st_guardiddate'],
				'st_blood'			=> $_POST ['st_blood'],
				'st_livingplace'	=> $_POST ['st_livingplace'],
				'st_livingowning' 	=> $_POST ['st_livingowning'],
				'st_guardmarital'	=> $_POST ['st_guardmarital'],
				'st_region'			=> $_POST ['st_region'],
				'st_city'			=> $_POST ['st_city'],
				'st_district'		=> $_POST ['st_district'],
				'st_mainstr'		=> $_POST ['st_mainstr'],
				'st_substr'			=> $_POST ['st_substr'],
				'st_homenum'		=> $_POST ['st_homenum'],
				'st_homebeside'		=> $_POST ['st_homebeside'],
				'st_phone1'			=> $_POST ['st_phone1'],
				'st_phone2'			=> $_POST ['st_phone2'],
				'st_mobile'			=> $_POST ['st_mobile'],
				'st_email'			=> $_POST ['st_email'],
				'st_guardjob'		=> $_POST ['st_guardjob'],
				'st_guardcomp'		=> $_POST ['st_guardcomp'],
				'st_vacaddress'		=> $_POST ['st_vacaddress'],
				'st_postal'			=> $_POST ['st_postal'],
				'st_mailbox'		=> $_POST ['st_mailbox'],
				'st_fax'			=> $_POST ['st_fax'],
				'st_vehicle'		=> $_POST ['st_vehicle'],
				'st_joinstate'		=> $_POST ['st_joinstate'],
				'st_villageask'		=> $_POST ['st_villageask'],
				'st_village'		=> $_POST ['st_village'],
				'st_kinname'		=> $_POST ['st_kinname'],
				'st_kinaddress'		=> $_POST ['st_kinaddress'],
				'st_familynum'		=> $_POST ['st_familynum'],
				'st_bronum'			=> $_POST ['st_bronum'],
				'st_sisnum'			=> $_POST ['st_sisnum'],
				'st_seq'			=> $_POST ['st_seq'],
				'st_fatheralive'	=> $_POST ['st_fatheralive'],
				'st_motheralive'	=> $_POST ['st_motheralive'],
				'st_fatheredulevel'	=> $_POST ['st_fatheredulevel'],
				'st_motheredulevel'	=> $_POST ['st_motheredulevel'],
				'st_livingwith'		=> $_POST ['st_livingwith'],
				'st_level' 			=> $_POST ['st_level'],
				'st_class'			=> $_POST ['st_class'],
				'st_room'			=> $_POST ['st_room']
					
		);
		$this->ins_query('aq_students',$att1);

	}


	//////////////////
	public function subject_insert() {
		$att1 = array(
				'subject_name' 			=> $_POST ['subject_name'],
				'subject_level'			=> $_POST ['subject_level'],
				'subject_class'			=> $_POST ['subject_class']

		);
		$this->ins_query('aq_subjects',$att1);

	}

	//////////////////
	public function test_insert() {
		$att1 = array(
				'test_name' 			=> $_POST ['test_name'],
				'test_subject'			=> $_POST ['test_subject'],
				'test_level'			=> $_POST ['test_level'],
				'test_class'			=> $_POST ['test_class']
		);
		$this->ins_query('aq_tests',$att1);

	}


	//////////////////
	public function skill_insert() {
		$att1 = array(
				'skill_name' 		=> $_POST ['skill_name'],
				'skill_test'		=> $_POST ['skill_test'],
				'skill_level'		=> $_POST ['skill_level'],
				'skill_class'		=> $_POST ['skill_class'],
				'skill_subject'		=> $_POST ['skill_subject'],
				'min_grade'			=> $_POST ['min_grade'],
				'max_grade'			=> $_POST ['max_grade']


		);
		$this->ins_query('aq_skills',$att1);

	}

	//////////////////
	public function user_insert() {
		$att1 = array(
				'user_name' 		=> $_POST ['user_name'],
				'user_username'		=> $_POST ['user_username'],
				'user_password'		=> $_POST ['user_password'],
				'user_email'		=> $_POST ['user_email'],
				'user_mobile'		=> $_POST ['user_mobile'],
				'user_role'			=> $_POST ['user_role']


		);
		$this->ins_query('aq_users',$att1);

	}
	////////////////////
	public function ins_room() {
		$room_level = $_POST['room_insert_level_name'];
		$room_class = $_POST['room_insert_class_name'];
		$room_name =  $_POST['room_insert_name'];
		$att = array (	'room_class' => $room_class,
				'room_level' => $room_level,
				'room_name'  => $room_name
		);
		$this->ins_query('aq_rooms', $att);
	}
	//////////////////////
	public function insert_class_form() {
		// Insert Class form
		echo ' <p> ' . ' إضافة صف: ' . ' </p> ' ;
		$att = array ( 'id' => 'class_insert_form' );
		$this->db->select('level_name')->from('aq_levels');
		$levels1=$this->db->get();
		foreach ($levels1->result() as $row){
			$levels[$row->level_name]=$row->level_name;

		}
		echo form_open('',$att);
		echo '<p>المرحلة:'. form_dropdown('aqsa_level2',$levels).'</p>';
		echo '<p>الصف:'. form_input('aqsa_class2','الأول').'</p>';
		echo '<p>'.form_submit('submit','إضافة').'</p>';
		echo form_close();
	}
	/////////////////////
	public function modify_class(){
		$level_name= $_POST['class_level_modify_name'];
		$class_name = $_POST['class_modify_input_name'];
		$class_past_name = $_POST['hidden_past_class_id'];

		$modify_att = array ('class_name' => $class_name,
				'class_level' => $level_name
		);
		$this->db->where('class_id',$class_past_name);
		$this->db->update('aq_classes', $modify_att);
	}
	/////////////////
	public function modify_level(){
		$level_name= $_POST['level_modify_name'];
		$level_past_name = $_POST['hidden_past_level_name'];

		$modify_att = array ('level_name' => $level_name);
		$this->db->where('level_id', $level_past_name);
		$this->db->update('aq_levels', $modify_att);
	}
	/////////////////
	public function modify_room(){
		$level_name= $_POST['room_insert_level_name'];
		$class_name= $_POST['room_insert_class_name'];
		$room_name= $_POST['room_insert_name'];
		$room_past_name = $_POST['hidden_past_room_name'];

		$modify_att = array ('room_name' => $room_name, 'room_class' => $class_name, 'room_level' => $level_name);
		$this->db->where('room_id', $room_past_name);
		$this->db->update('aq_rooms', $modify_att);
	}


	//////////////
	public function permission_search(){
		$user_search = $_POST['user_search'];
		$user = $this->Mhome->get_where('aq_permissions',array('permit_username'=>$user_search));
		$i=0;
		$json_data="";
		if(!$user->result())
		{
			echo "false";
			exit;
		}

			
		echo $user;



	}
	
	
	//////////////
	public function assign_insert(){

		$att1 = array(
				'assign_teacher' 	=> $_POST['assign_teacher'],
				'assign_room' 		=> $_POST['assign_room'],
				'assign_class' 	=> $_POST['assign_class'],
				'assign_level' 	=> $_POST['assign_level'],
				'assign_subject' 	=> $_POST['assign_subject']
				
		);
		$this->ins_query('aq_assign',$att1);
	
	}

	//////////////
	public function level_classes(){
		$level_name1 = $_POST['level_name'];
		$this->db->select('class_name');
		$classes1 = $this->Mhome->get_where('aq_classes',array('class_level'=>$level_name1));
		$i=0;
		$json_data="";
		if(!$classes1->result())
		{
			echo "false";
			exit;
		}
		foreach($classes1->result() as $row){
			$classes[$i]=$row->class_name;
			$i++;
		}
			
		echo json_encode($classes, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);



	}
	//////////////////////////
	public function class_rooms(){
		$level_name = $_POST['level_name'];
		$class_name = $_POST['class_name'];
		$this->db->select('room_name');
		$rooms_query = $this->Mhome->get_where('aq_rooms',array('room_class'=>$class_name,'room_level'=>$level_name));
		$i=0;
		$json_data="";
		if(!$rooms_query->result())
		{
			echo "false";
			exit;
		}
		foreach($rooms_query->result() as $row){
			$rooms[$i]=$row->room_name;
			$i++;
		}

		echo json_encode($rooms, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}

	
	//////////////////////////
	public function get_teacher(){
		$teacher_id = $_POST['teacher_id'];
		$teacher_query = $this->Mhome->get_where('aq_teachers',array('teacher_id'=>$teacher_id));	
		echo json_encode($teacher_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

	}


}
