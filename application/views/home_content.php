
<div id="content">
	<?    
	$att = array('id' => 'table_form');
	echo form_open('', $att);
	$tmpl = array ( 'table_open'  => '<table class = "mytable"
			cellpadding = "5" cellspacing = "3">'
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
		case 'aq_teachers':
			$this->table->set_heading("<input type='checkbox'
					name='teachers_check' value='all'/>",
					'اسم المعلم','اسم المادة','البريد الالكتروني','رقم الجوال','فصل التدريس');
			echo form_hidden('hidden_table_name',$table_data);
			echo form_hidden('hidden_item_id','teacher_id');
			echo "<span id = 'teacher_add_button' class = 'aqsa_button'>إضافة معلم</span>";				
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
	foreach ($Q-> result() as $row){
		switch ($table_data){
			case 'aq_levels':
				$level_query2=$this->Mhome->get_where('aq_classes',
				array('class_level'=>
				$row->level_name));
				$this->table->add_row('<input type="checkbox"
						name="check_list[]" value=\''. $row->level_id .'\'/>',
						$row->level_id,$row->level_name,
						$level_query2->num_rows(),
						'<span class=\'add_class_button\' id='.$row->level_id.'>+</span>',
						'<span class=\'modify_level_button\' id='.$row->level_id.'>تعديل</span>',
						'<span class=\'delete_level_button\' id='.$row->level_id.'>delete</span>'
				);

				break;
			case 'aq_classes':
				$rooms_num_query =
				$this->Mhome->get_where('aq_rooms',
				array('room_class'=>$row->class_name,
				'room_level'=>$row->class_level)
				);

				$this->table->add_row('<input type="checkbox"
						name="check_list[]" value=\''. $row->class_id .'\'/>',
						$row->class_level,$row->class_name,
						$rooms_num_query->num_rows(),
						'<span class=\'insert_room_button\' id='.$row->class_name.'>+</span>',
						'<span id = '.$row->class_id.' class=\'modify_class\'>تعديل</span>',
						'<span class=\'delete\' id='.$row->class_name.
						'>delete</span>'
				);

				break;
			case 'aq_rooms':
				$aqsa_level_query1=$this->Mhome->get_where('aq_classes',
				array('class_name'=>
				$row->room_class,'class_level'=>$row->room_level)
				);
				$Qs=$aqsa_level_query1->row();
				$this->table->add_row('<input type="checkbox"
						name="check_list[]" value=\''. $row->room_id .'\' />',
						$row->room_level,$row->room_class,
						$row->room_name,'<span id = '.$row->room_id.' class=\'modify_room\'>
						تعديل','<span class=\'delete\' id='.$row->room_class.
						'onClick=\' \'>delete</span>'
				);

				break;
			case 'aq_teachers':
				$this->table->add_row("<input type='checkbox' 
						name = 'check_list[]' value = ".
						$row->teacher_id." />",
						$row->teacher_name, $row->teacher_subject,
						$row->teacher_email, $row->teacher_mobile,
						$row->teacher_room
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
	$levels = $this->Mhome->get_levels();
	$classes = $this->Mhome->get_classes();
	
	$attt=array('id'=>'drop_test');
	echo form_dropdown('dropdown_name',$levels,'','id="drop_test"');
	echo form_dropdown('dropdown_name1','id="drop_test1"');
	

	?>


</div>

