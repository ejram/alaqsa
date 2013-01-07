 <?php
 class Mhome extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        

    }
   
       public function Print_query($table) {
  
        
        $tmpl = array ( 'table_open'  => '<table border="1"
										  cellpadding="2" 
                                          cellspacing="1"
        								  class="mytable" 
        								  dir="rtl">' 
                      );
        $this -> table -> set_template($tmpl); 
        $this -> table -> set_heading('المرحلة', 'الصف',
                                  'مجموع الفصول', 'إضافة فصل',
                                  'تعديل فصل','مسح الصف'
                                 );
        
        $Q = $this -> Get_query_all($table);
        foreach ($Q -> result() as $row)
    {
        $form_att = array('id' => 'table_form');
        echo form_open('/most',$form_att); 
        $this -> table -> add_row($row->aqsa_level,
        						  $row->aqsa_class,
        						  $row->class_dep_num,
         						  anchor('#', '+'), 'تعديل',
        						  '<span id=\'delete\' 
        						  onClick=\' \'>delete</span>');

    }            
    
        echo $this->table->generate(); 
        echo "Number of rows = ". $Q->num_rows();
        }
         public function get_where($class_where,$col_where,$value_where) {
             $this->db->from($class_where)->where($col_where,$value_where);
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

    }
    