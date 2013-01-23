<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_controller extends CI_Controller {

	public function index()
	{
		$this->home('aq_classes');
    }
    public function home($table_data)
    {
		$data ['table_data'] = $table_data;
		$this->load->view('home_header');              
		$this->load->view('home_content', $data);
		$this->load->view('home_footer');
		$this->load->view('home_addation');
    }
        
    public function del_query($table, $where, $value)
	{
		echo $this->Mhome->delete_query($table,$where,$value);
		echo 'done';
	}
	public function ins_query($table,$data)
	{
		$this->Mhome->Insert_query($table,$data);
	}
	public function addfun($var1,$var2)
	{
		$this->Mhome->add($var1,$var2);
	}
        
	public function Print_table($table)
	{
		$this->Mhome->Print_query($table);
	}
 
 
 	public function del_class() {
    	$table_name = $_POST ['hidden_table_name'];
    	$item_id    = $_POST ['hidden_item_id'];
		if( ! empty ( $_POST ['check_list'] ) ) 
		{
    		foreach ( $_POST ['check_list'] as $check) 
    		{
				$this->del_query( $table_name , $item_id , $check);
    		}
		}
 	}	 
	public function ins_class() {
    	$aqsa_level1	= $_POST ['aqsa_level2'];
    	$aqsa_class1 	= $_POST ['aqsa_class2'];
    	$att1 = array	(	'class_level' 	  => $aqsa_level1,
    						'class_name'	  => $aqsa_class1    						
						);
    	$this->ins_query('aq_classes',$att1);
    
	}
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
        echo '<p>عدد الفصول'. form_input('class_dep_num2','5').'</p>';
        echo '<p>'.form_submit('submit','إضافة').'</p>';
        echo form_close();
	}
	
	public function modify_class(){
		$level_name= $_POST['class_level_modify_name'];
		$class_name = $_POST['class_modify_input_name'];
		$class_past_name = $_POST['hidden_past_class_id'];
		
		$modify_att = array ('class_name' => $class_name,
					  'class_level' => $level_name
					 );
		$this->db->update('aq_classes', $modify_att,array('class_name' => $class_past_name));
	}
	
	public function modify_level(){
		$level_name= $_POST['level_modify_name'];
		$level_past_name = $_POST['hidden_past_level_name'];
	
		$modify_att = array ('level_name' => $level_name);
		$this->db->where('level_id', $level_past_name);
		$this->db->update('aq_levels', $modify_att);
	}
	

	
}
