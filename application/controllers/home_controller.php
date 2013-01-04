<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_controller extends CI_Controller {

	public function index()
	{
		$this->home('aq_classes');
    }
    public function home($table_data)
    {
		$data [ ' table_data ' ] = $table_data;
		$this->load->view( ' home_header ' );              
		$this->load->view( ' home_content ' , $data );
		$this->load->view( ' home_footer ' );
		$this->load->view( ' home_addation ' );
    }
        
    public function del_query($table,$where,$value)
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
    	$table_name = $_POST [ ' hidden_table_name ' ];
    	$item_id    = $_POST [ ' hidden_item_id ' ];
		if( ! empty ( $_POST [ ' check_list ' ] ) ) 
		{
    		foreach ( $_POST [ ' check_list ' ] as $check) 
    		{
				$this->del_query( $table_name , $item_id , $check);
    		}
		}
 	}	 
	public function ins_class() {
    	$aqsa_level1	= $_POST [ ' aqsa_level2 ' ];
    	$aqsa_class1 	= $_POST [ ' aqsa_class2 ' ];
    	$class_dep_num1 = $_POST [ ' class_dep_num2 ' ];
    	$att1 = array	(	' aqsa_level ' 	  => $aqsa_level1 ,
    						' aqsa_class '	  => $aqsa_class1 ,
    						' class_dep_num ' => $class_dep_num1
						);
    	$this->ins_query('aq_classes',$att1);
    
	}
	public function ins_room() {
    	$aqsa_class = $_POST[ ' room_hidden_input_name ' ];
    	$room_name = $_POST [ ' room_insert_name ' ];
   		$att = array (	' aqsa_class ' => $aqsa_class ,
						' room_name '  => $room_name
   					 );
    	$this->ins_query(' aq_rooms ' , $att);   
	}
	public function insert_class_form() {
            // Insert Class form
        echo ' <p> ' . ' إضافة صف: ' . ' </p> ' ;
        $att = array ( ' id ' => ' class_insert_form ' );
        $this->db->select('aqsa_level')->from('aq_levels');
        $levels1=$this->db->get();
        foreach ($levels1->result() as $row){
        $levels[$row->aqsa_level]=$row->aqsa_level;
        
        }
        echo form_open('',$att);
        echo '<p>المرحلة:'. form_dropdown('aqsa_level2',$levels).'</p>';
        echo '<p>الصف:'. form_input('aqsa_class2','الأول').'</p>';
        echo '<p>عدد الفصول'. form_input('class_dep_num2','5').'</p>';
        echo '<p>'.form_submit('submit','إضافة').'</p>';
        echo form_close();
}

}
