
<div id="content">
<?    
$att = array('id' => 'table_form');
echo form_open('', $att);
        $tmpl = array ( 'table_open'  => '<table class = "mytable"
                                           cellpadding = "5" 
                                           cellspacing = "3">' 
                      );
        $this->table->set_template($tmpl); 
        switch ($table_data)
        {
            case 'aq_levels':
            $this->table->set_heading('<input type = "checkbox" name = "classes_check" 
                                      value = "all" />',
                                      'رقم المرحلة', 'اسم المرحلة',
                                      'عدد الصفوف','إضافة صف',
                                      'تعديل المرحلة','حذف المرحلة'
                                     );  
            echo form_hidden('hidden_table_name',$table_data);
            echo form_hidden('hidden_item_id','level_id');  
            break;
            case 'aq_classes':
            $this->table->set_heading('<input type="checkbox" 
                                      name="classes_check" value="all" />',
                                      'المرحلة', 'الصف', 'مجموع الفصول',
                                      'إضافة فصل','تعديل الصف','مسح الصف'
                                      );    
            echo form_hidden('hidden_table_name',$table_data);
            echo form_hidden('hidden_item_id','class_id');
            break;
            case 'aq_rooms':
            $this->table->set_heading('<input type="checkbox"
                                      name="rooms_check" value="all" />',
                                      'المرحلة', 'الصف', 'اسم الفصل',
                                      'تعديل الفصل','مسح الفصل'
                                     ); 
            echo form_hidden('hidden_table_name',$table_data);
            echo form_hidden('hidden_item_id','room_id'); 
            break;
            case 'aq_subjects':
            $this->table->set_heading('<input type="checkbox" 
                                      name="subjects_check" value="all" />',
                                      'اسم المادة','المرحلة','الصف'
                                     );      
            echo form_hidden('hidden_table_name',$table_data);
            echo form_hidden('hidden_item_id','subject_id');
            break;
            case 'aq_tests':
            $this->table->set_heading('<input type="checkbox" 
                                      name="tests_check" value="all" />',
                                      'رقم المعيار','اسم المعيار','مجموع المهارات',
                                      'إضافة مهارة','تعديل المعيار','مسح المعيار'
                                     );
            echo form_hidden('hidden_table_name',$table_data);
            echo form_hidden('hidden_item_id','test_id');
            break;
            case 'aq_skills':
            $this->table->set_heading('<input type="checkbox" 
                                      name="skills_check" value="all" />',
                                      'رقم المهارة','اسم المهارة','أقل درجة',
                                      'أعلى درجة','تعديل المهارة'
                                     );
            echo form_hidden('hidden_table_name',$table_data);
            echo form_hidden('hidden_item_id','skill_id');
            break;
            default:
            echo "";
        } 
        $Q=$this->Mhome->Get_query_all($table_data);
        foreach ($Q-> result() as $row)
    {

        switch ($table_data)
        {
            case 'aq_levels':
            $level_query=$this->Mhome->get_where('aq_classes',
                                                 'class_level',
                                                 $row->level_name);
            $this->table->add_row('<input type="checkbox" 
                                  name="check_list[]" value=\''. $row->level_id .'\'/>',
                                  $row->level_id,$row->level_name,
                                  $level_query->num_rows(),
                                  anchor('#','+'),'تعديل',
                                  '<span class=\'delete\' id='.$row->level_name.
                                  'onClick=\' \'>delete</span>'
                                 );

            break;
            case 'aq_classes':
            $rooms_num_query=$this->Mhome->get_where('aq_rooms',
                                                     'room_class',$row->class_name
                                                    );
            $hidden_class_input_att = array('id' => 'hidden_class_modify_input_id', 'name' => 'hidden_class_input_name','value'=> $row->class_name);
            $hidden_level_input_att = array('id' => 'hidden_class_level_modify_id', 'name' => 'hidden_level_input_name','value'=> $row->class_level);
            echo form_input($hidden_class_input_att);
            echo form_input($hidden_level_input_att);
            $this->table->add_row('<input type="checkbox" 
                                  name="check_list[]" value=\''. $row->class_id .'\'/>',
                                  $row->class_level,$row->class_name,
                                  $rooms_num_query->num_rows(),
                                  '<span class=\'insert_room\' id='.$row->class_name.'>+</span>',
                                  '<span class=\'modify_class\'>تعديل</span>','<span class=\'delete\' id='.$row->class_name.
                                  '>delete</span>'
                                 );

            break;
            case 'aq_rooms':
            $aqsa_level_query1=$this->Mhome->get_where('aq_classes',
                                                       'class_name',
                                                       $row->room_class
                                                      );
            $Qs=$aqsa_level_query1->row();
            $this->table->add_row('<input type="checkbox"
                                  name="check_list[]" value=\''. $row->room_id .'\' />',
                                  $Qs->class_level,$row->room_class,
                                  $row->room_name,
                                  'تعديل','<span class=\'delete\' id='.$row->room_class.
                                  'onClick=\' \'>delete</span>'
                                 ); 
 
            break;
            case 'aq_subjects':
            $subject_query=$this->Mhome->get_where('aq_classes',
            									 'class_name',
            									 $row->subject_class);
            $this->table->add_row('<input type="checkbox" 
                                  name="check_list[]" value=\''. $row->subject_id .'\' />',
                                  $row->subject_name,$subject_query->class_level,
                                  $row->subject_class,
                                  'تعديل','<span class=\'delete\' id='.$row->subject_class.
                                  'onClick=\' \'>delete</span>'
                                 );       

            break;
            case 'aq_tests':
            $this->table->add_row('<input type="checkbox" 
                                   name="check_list[]" value=\''. $row->test_id .'\' />',
                                   $row->test_id,$row->test_name,
                                   $row->test_skill_num,
                                   anchor('#','+'),anchor('#','تعديل'),
                                   '<span class=\'delete\' id='.$row->test_name.
                                   'onClick=\' \'>delete</span>'
                                  );

            break;
            case 'aq_skills':
            $skill_query=$this->Mhome->get_where('aq_tests',
            									   'test_name',
            										$row->skill_test);
            $this->table->add_row('<input type="checkbox"
                                  name="check_list[]" value=\''. $row->skill_id .'\' />',
                                  $row->skill_id,$row->skill_name,
                                  $row->min_grade,
                                  $row->max_grade,
                                  anchor('#','تعديل')
                                 ); 

            break;
            default:
            echo "";
        } 
    }            
    
        echo $this->table->generate(); 
        echo form_submit('submit','حذف');
        echo form_close();
        echo "Number of rows = ". $Q->num_rows();
                    // Insert Class form
        echo '<p>'.'إضافة صف:'.'</p>';
        $att=array('id'=>'class_insert_form');
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

 
 
 ?>
 

</div>

