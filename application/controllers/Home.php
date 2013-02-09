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
		if($table_data=='report')
		{
			$this->load->view('report');
				
		}
		$data ['table_data'] = $table_data;
		
		$this->load->view('admin_header');
		$this->load->view('admin_content',$data);
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
	public function class_insert() {
		$class_name	= $_POST['class_name'];
		$level_name 	= $_POST['level_name'];
		$att1 = array('class_level'	=> $level_name,
				'class_name'	=> $class_name
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
	public function report() {

	
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
				'st_birthplace'		=> $_POST ['st_birthplace'],
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
	public function add_skill() {
		$test_name= $_POST['hidden_test_name'];		
		$test = $this->Mhome->get_where('aq_tests',array('test_id'=>'4'));
foreach($test->result() as $row2)
{
	$att1 = array(
				'skill_level' 	=> $row2->test_level,
				'skill_class'	=> $row2->test_class,
				'skill_subject'	=> $row2->test_subject,
				'skill_test'	=> $row2->test_name,
				'skill_name'	=> $_POST ['skill_name'],
				'min_grade'		=> $_POST ['min_grade'],
				'max_grade'		=> $_POST ['max_grade']
				
		
		
		);
}		
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
	
	//////////////
	public function level_classes_permit(){
		$username=$this->session->userdata('user_username');
		$level_name = $_POST['level_name'];
		$this->db->select('permit_class');
		$this->db->distinct();
		$classes1 = $this->Mhome->get_where('aq_permissions',array('permit_level'=>$level_name,
				'permit_username'=>$username
				));
		$i=0;
		$json_data="";
		if(!$classes1->result())
		{
			echo "false";
			exit;
		}
		foreach($classes1->result() as $row){
			$classes[$i]=$row->permit_class;
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
	public function class_rooms_permit(){
		$username=$this->session->userdata('user_username');
		
		$level_name = $_POST['level_name'];
		$class_name = $_POST['class_name'];
		$this->db->select('permit_room');
		$this->db->distinct();
		$rooms_query = $this->Mhome->get_where('aq_permissions',array('permit_level'=>$level_name,
				'permit_username'=>$username,'permit_class'=>$class_name
				));
		$i=0;
		$json_data="";
		if(!$rooms_query->result())
		{
			echo "false";
			exit;
		}
		foreach($rooms_query->result() as $row){
			$rooms[$i]=$row->permit_room;
			$i++;
		}
	
		echo json_encode($rooms, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}
	
	
	//////////////////////////
	public function class_subjects_permit(){
		$username=$this->session->userdata('user_username');
	
		$level_name = $_POST['level_name'];
		$class_name = $_POST['class_name'];
		$this->db->select('permit_subject');
		$this->db->distinct();
		$subs_query = $this->Mhome->get_where('aq_permissions',array('permit_level'=>$level_name,
				'permit_username'=>$username,'permit_class'=>$class_name
		));
		$i=0;
		$json_data="";
		if(!$subs_query->result())
		{
			echo "false";
			exit;
		}
		foreach($subs_query->result() as $row){
			$subs[$i]=$row->permit_subject;
			$i++;
		}
	
		echo json_encode($subs, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}

	//////////////////////////
	public function class_subjects(){
		$level_name = $_POST['level_name'];
		$class_name = $_POST['class_name'];
		$this->db->select('subject_name');
		$subject_query = $this->Mhome->get_where('aq_subjects',array('subject_class'=>$class_name,'subject_level'=>$level_name));
		$i=0;
		$json_data="";
		if(!$subject_query->result())
		{
			echo "false";
			exit;
		}
		foreach($subject_query->result() as $row){
			$subjects[$i]=$row->subject_name;
			$i++;
		}
	
		echo json_encode($subjects, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}
	

	//////////////////////////
	public function class_tests(){
		$level_name = $_POST['level_name'];
		$class_name = $_POST['class_name'];
		$subject_name = $_POST['subject_name'];
		$this->db->select('test_name');
		$test_query = $this->Mhome->get_where('aq_tests',array('test_class'=>$class_name,
				'test_level'=>$level_name, 'test_subject' => $subject_name));
		$i=0;
		$json_data="";
		if(!$test_query->result())
		{
			echo "false";
			exit;
		}
		foreach($test_query->result() as $row){
			$tests[$i]=$row->test_name;
			$i++;
		}
	
		echo json_encode($tests, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}
	
	//////////////////////////
	public function room_sts(){
		$level_name = $_POST['level_name'];
		$class_name = $_POST['class_name'];
		$room_name = $_POST['room_name'];
		$st_query = $this->Mhome->get_where('aq_students',array('st_class' => $class_name,
				'st_level' => $level_name, 'st_room' => $room_name));
		$i=0;
		
		$json_data="";
		if(!$st_query->result())
		{
			echo "false";
			exit;
		}
		$rooms_array=array();
		foreach($st_query->result() as $row){
			$rooms_array[$i]=array(
			'name'=>$row->st_fna.' '. $row->st_ffna.' '.$row->st_lna,
			'id'=>$row->st_id
					

			);
			$i++;
				
		}
	
		echo json_encode($rooms_array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}
	
	
	
	//////////////////////////
	public function room_sts_full(){
		$level_name = $_POST['level_name'];
		$class_name = $_POST['class_name'];
		$room_name = $_POST['room_name'];
		$st_query = $this->Mhome->get_where('aq_students',array('st_class' => $class_name,
				'st_level' => $level_name, 'st_room' => $room_name));
		$i=0;
	
		$json_data="";
		if(!$st_query->result())
		{
			echo "false";
			exit;
		}
		$rooms_array=array();
		foreach($st_query->result() as $row){
			$rooms_array[$i]=array(
					'name'=>$row->st_fna.' '. $row->st_ffna.' '.$row->st_lna,
					'id'=>$row->st_id
						
	
			);
			$i++;
	
		}
	
		echo json_encode($rooms_array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}
	
	//////////////////////////
	public function test_skills(){
		$level_name = $_POST['level_name'];
		$class_name = $_POST['class_name'];
		$subject_name = $_POST['subject_name'];
		$test_name = $_POST['test_name'];
		$this->db->select('skill_name');
		$skill_query = $this->Mhome->get_where('aq_skills',array('skill_test'=>$test_name,
				'skill_level'=>$level_name, 'skill_subject' => $subject_name, 'skill_class'=> $class_name));
		$i=0;
		$json_data="";
		if(!$skill_query->result())
		{
			echo "false";
			exit;
		}
		foreach($skill_query->result() as $row){
			$skills[$i]=$row->skill_name;
			$i++;
		}
	
		echo json_encode($skills, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}
	
	
	
	//////////////////////////
	public function get_teacher(){
		$teacher_id = $_POST['teacher_id'];
		$teacher_query = $this->Mhome->get_where('aq_teachers',array('teacher_id'=>$teacher_id));	
		echo json_encode($teacher_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

	}
	
	//////////////////////////
	public function get_level(){
		$level_name = $_POST['level_name'];
		$level_query = $this->Mhome->get_where('aq_levels',array('level_name'=>$level_name));
		echo json_encode($level_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	
	}
	
	//////////////////////////
	public function get_class(){
		$class_name = $_POST['class_name'];
		$class_query = $this->Mhome->get_where('aq_classes',array('class_name'=>$class_name));
		echo json_encode($class_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	
	}
	
	//////////////////////////
	public function get_room(){
		$room_id = $_POST['room_id'];
		$room_query = $this->Mhome->get_where('aq_rooms',array('room_id'=>$room_id));
		echo json_encode($room_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	
	}
	
	//////////////////////////
	public function get_subject(){
		$subject_id = $_POST['subject_id'];
		$subject_query = $this->Mhome->get_where('aq_subjects',array('subject_id'=>$room_id));
		echo json_encode($subject_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	
	}	

	//////////////////////////
	public function get_test(){
		$test_id = $_POST['test_id'];
		$test_query = $this->Mhome->get_where('aq_tests',array('test_id'=>$test_id));
		echo json_encode($test_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	
	}
	
	//////////////////////////
	public function get_skill(){
		$skill_id = $_POST['skill_id'];
		$skill_query = $this->Mhome->get_where('aq_skills',array('skill_id'=>$skill_id));
		echo json_encode($skill_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	
	}
	
	
	//////////////////////////
	public function get_user(){
		$user_id = $_POST['user_id'];
		$user_query = $this->Mhome->get_where('aq_users',array('user_id'=>$user_id));
		echo json_encode($user_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	
	}
	

	//////////////////////////
	public function get_student(){
		$student_id = $_POST['st_id'];
		$student_query = $this->Mhome->get_where('aq_students',array('st_id'=>$student_id));
		echo json_encode($student_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	
	}
	
	//////////////////////////
	public function get_permission(){
		$permit_id = $_POST['permit_id'];
		$permission_query = $this->Mhome->get_where('aq_permission',array('permit_id'=>$permit_id));
		echo json_encode($permission_query->result(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	
	}

	//////////////////
	public function modify_teacher() {
		$teacher_past_id = $_POST['hidden_past_teacher_name'];
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
		$this->db->where('teacher_id',$teacher_past_id);
		$this->db->update('aq_teachers', $att1);	
	}
	
	
	//////////////////
	public function modify_user() {
		$user_past_id = $_POST['hidden_past_user_name'];
		$att1 = array(
				'user_name' 		=> $_POST ['user_name'],
				'user_username'		=> $_POST ['user_username'],
				'user_password'		=> $_POST ['user_password'],
				'user_email'		=> $_POST ['user_email'],
				'user_mobile'		=> $_POST ['user_mobile'],
				'user_role'			=> $_POST ['user_role']
	
		);
		$this->db->where('user_id',$user_past_id);
		$this->db->update('aq_users', $att1);
	}
	
	//////////////////
	public function modify_student() {
		$student_past_id = $_POST['hidden_past_student_name'];
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
				'st_birthplace'		=> $_POST ['st_birthplace'],
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
		$this->db->where('st_id',$student_past_id);
		$this->db->update('aq_students', $att1);
	}
	
	
	
	//////////////////
	public function modify_permission() {
		$permission_past_id = $_POST['hidden_past_permission_name'];
		$att1 = array(
				'permit_username' 	=> $_POST ['permit_username'],
				'permit_level'		=> $_POST ['permit_level'],
				'permit_class'		=> $_POST ['permit_class'],
				'permit_room'		=> $_POST ['permit_room'],
				'permit_subject'	=> $_POST ['permit_subject']
	
		);
		$this->db->where('permit_id',$permission_past_id);
		$this->db->update('aq_permissions', $att1);
	}
	
	//////////////////
	public function modify_assign() {
		$assign_past_id = $_POST['hidden_past_assign_name'];
		$att1 = array(
				'assign_teacher' 	=> $_POST ['assign_teacher'],
				'assign_level'		=> $_POST ['assign_level'],
				'assign_class'		=> $_POST ['assign_class'],
				'assign_room'		=> $_POST ['assign_room'],
				'assign_subject'	=> $_POST ['assign_subject']
	
		);
		$this->db->where('assign_id',$assign_past_id);
		$this->db->update('aq_assign', $att1);
	}
	
	//////////////////
	public function modify_test() {
		$test_past_id = $_POST['hidden_past_test_name'];
		$att1 = array(
				'test_level'	=> $_POST ['test_level'],
				'test_class'	=> $_POST ['test_class'],
				'test_name'		=> $_POST ['test_name'],
				'test_subject'	=> $_POST ['test_subject']
	
		);
		$this->db->where('test_id',$test_past_id);
		$this->db->update('aq_tests', $att1);
	}
	
	//////////////////
	public function modify_skill() {
		$skill_past_id = $_POST['hidden_past_skill_name'];
		$att1 = array(
				'skill_level'		=> $_POST ['skill_level'],
				'skill_class'		=> $_POST ['skill_class'],
				'skill_name'		=> $_POST ['skill_name'],
				'skill_subject'		=> $_POST ['skill_subject'],
				'skill_test'		=> $_POST ['skill_test'],
				'min_grade'			=> $_POST ['min_grade'],
				'max_grade'			=> $_POST ['max_grade']
	
		);
		$this->db->where('skill_id',$skill_past_id);
		$this->db->update('aq_skills', $att1);
	}
	
	//////////////////
	public function modify_subject() {
		$subject_past_id = $_POST['hidden_past_subject_name'];
		$att1 = array(
				'subject_name' 		=> $_POST ['subject_name'],
				'subject_level'		=> $_POST ['subject_level'],
				'subject_class'		=> $_POST ['subject_class']
	
		);
		$this->db->where('subject_id',$subject_past_id);
		$this->db->update('aq_subjects', $att1);
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
	public function room_insert(){
	
		$att1 = array(
				'room_level' 	=> $_POST['room_level'],
				'room_class' 	=> $_POST['room_class'],
				'room_name' 	=> $_POST['room_name']
		);
		$this->ins_query('aq_rooms',$att1);
	
	}
	
	
	public function get_report(){
		
		$att1 = array(
				'mark_level' 	=> $_POST['report_level'],
				'mark_class' 	=> $_POST['report_class'],
				'mark_room' 	=> $_POST['report_room'],
				'mark_subject' 	=> $_POST['report_subject'],
				'mark_test' 	=> $_POST['report_test'],
				'mark_skill' 	=> $_POST['report_skill'],
				'mark_student' 	=> $_POST['report_student']
	);
		
		$marks = $this->Mhome->get_where('aq_marks',$att1);
		
print_r($marks->result());		
		
		
	}
	
	
}
