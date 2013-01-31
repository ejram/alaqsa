
<div id="content">
	<?  
	if($this->session->userdata('user_role')=='admin')
	{  
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
					'اسم المرحلة',
					'عدد الصفوف','إضافة صف',
					'تعديل المرحلة'
							);
							echo form_hidden('hidden_table_name',$table_data);
							echo form_hidden('hidden_item_id','level_id');
							break;
		case 'aq_classes':
			$this->table->set_heading('<input type="checkbox"
					name="classes_check" value="all" />',
					'المرحلة', 'الصف', 'مجموع الفصول',
					'إضافة فصل','تعديل الصف'
							);
							echo form_hidden('hidden_table_name',$table_data);
							echo form_hidden('hidden_item_id','class_id');
							break;
		case 'aq_rooms':
			$this->table->set_heading('<input type="checkbox"
					name="rooms_check" value="all" />',
					'المرحلة', 'الصف', 'اسم الفصل',
					'تعديل الفصل'
							);
							echo form_hidden('hidden_table_name',$table_data);
							echo form_hidden('hidden_item_id','room_id');
							break;
		case 'aq_teachers':
			$this->table->set_heading("<input type='checkbox'
					name='teachers_check' value='all'/>",
					'اسم المعلم','رقم الهوية','مكان الميلاد','تاريخ الميلاد','التخصص','تاريخ التخرج','المؤهل الدراسي','اسم الجامعة','الجنسية','إيميل المعلم','جوال المعلم','تعديل');
			echo form_hidden('hidden_table_name',$table_data);
			echo form_hidden('hidden_item_id','teacher_id');
			echo "<span id = 'teacher_add_button' class = 'aqsa_button'>إضافة معلم</span>";				
			break;
		case 'aq_subjects':
			$this->table->set_heading('<input type="checkbox"
					name="subjects_check" value="all" />',
					'اسم المادة','المرحلة','الصف','عدد المعايير','تعديل المادة'
							);
							echo form_hidden('hidden_table_name',$table_data);
							echo form_hidden('hidden_item_id','subject_id');
							break;
		case 'aq_tests':
			$this->table->set_heading('<input type="checkbox"
					name="tests_check" value="all" />',
					'اسم المعيار','المادة','مجموع المهارات',
					'إضافة مهارة','تعديل المعيار'
							);
							echo form_hidden('hidden_table_name',$table_data);
							echo form_hidden('hidden_item_id','test_id');
							break;
		case 'aq_skills':
			$this->table->set_heading('<input type="checkbox"
					name="skills_check" value="all" />' ,'اسم المهارة' ,'المعيار' ,'أقل درجة',
					'أعلى درجة','تعديل المهارة'
							);
							echo form_hidden('hidden_table_name',$table_data);
							echo form_hidden('hidden_item_id','skill_id');
							break;
		case 'aq_users':
			$this->table->set_heading('<input type="checkbox"
					name="users_check" value="all" />','اسم المستخدم','اسم الدخول ','كلمة السر','البريد  الالكتروني','الهاتف ','مسمى الوظيفة','تعديل المستخدم'
							);
							echo form_hidden('hidden_table_name',$table_data);
							echo form_hidden('hidden_item_id','user_id');
								
							break;

	}
	$Q=$this->Mhome->Get_query_all($table_data);
	foreach ($Q-> result() as $row){
		switch ($table_data){
			case 'aq_levels':
				$level_query2=$this->Mhome->get_where('aq_classes',
				array('class_level'=>
				$row->level_name));
				$this->table->add_row('<input type="checkbox"
						name="check_list[]" value=\''. $row->level_id .'\'/>'
						,$row->level_name,
						$level_query2->num_rows(),
						'<span class=\'add_class_button\' id='.$row->level_id.'>+</span>',
						'<span class=\'modify_level_button\' id='.$row->level_id.'>تعديل</span>'
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
						'<span id = '.$row->class_id.' class=\'modify_class\'>تعديل</span>'
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
						تعديل</span>'
				);

				break;
			case 'aq_teachers':
				$this->table->add_row("<input type='checkbox' 
						name = 'check_list[]' value = ".
						$row->teacher_id." />",
						$row->teacher_name, $row->teacher_idnumber,
						$row->teacher_birthplace, $row->teacher_birthdate,
						$row->teacher_specialist,$row->teacher_gradedate,
						$row->teacher_qual,$row->teacher_university,
						$row->teacher_nationality,
						$row->teacher_email,$row->teacher_mobile,
						'<span id = '.$row->teacher_id.' class=\'modify_teacher\'>
						تعديل</span>'
						
				);
				break;
			case 'aq_subjects':
				$tests_num=$this->Mhome->get_where('aq_tests','test_subject',$row->subject_name);
				$this->table->add_row('<input type="checkbox"
						name="check_list[]" value=\''. $row->subject_id .'\' />',
						$row->subject_name,$row->subject_level,
						$row->subject_class,$tests_num->num_rows(),
						'تعديل'
				);

				break;
			case 'aq_tests':
				$skills_num=$this->Mhome->get_where('aq_skills',
						'skill_test',
						$row->test_name);
				$this->table->add_row('<input type="checkbox"
						name="check_list[]" value=\''. $row->test_id .'\' />',
						$row->test_name, $row->test_subject,
						$skills_num->num_rows(),
						anchor('#','+'),anchor('#','تعديل')
								);

				break;
			case 'aq_skills':
				$skill_query=$this->Mhome->get_where('aq_tests',
				'test_name',
				$row->skill_test);
				$this->table->add_row('<input type="checkbox"
						name="check_list[]" value=\''. $row->skill_id .'\' />',
						$row->skill_name,$row->skill_test, $row->min_grade,
						$row->max_grade, anchor('#','تعديل')
						
				);

				break;
			case 'aq_users':
				$this->table->add_row('<input type="checkbox"
						name="check_list[]" value=\''. $row->user_id . '\'/>',
						$row->user_name,$row->user_username,
						$row->user_password,$row->user_email,
						$row->user_mobile,$row->user_role,
						'<span id = '.$row->user_id.' class=\'modify_user\'>تعديل</span>'

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
	if($table_data=='aq_levels')
	{
	//insert level form
	echo "<div id='insert_level_form'>";
	echo '<p>'.'إضافة مرحلة:'.'</p>';
	$att=array('id'=>'level_insert_div');
	echo form_open('',$att);
	echo '<p>الفصل:'. form_input('level_insert_name','').'</p>';
	echo '<p>'.form_submit('submit','إضافة').'</p>';
	echo form_close();
	echo "</div>";
	}
	
	//insert teacher form
	if($table_data=='aq_teachers')
	{
		echo "<div id='insert_teacher_div' style=''>";
		echo '<p>'.'إضافة معلم:'.'</p>';
		$att=array('id'=>'teacher_insert_form');
		echo form_open('',$att);
		echo '<p>اسم المعلم:'. form_input('teacher_name','').'</p>';
		echo '<p>رقم الهوية:'. form_input('teacher_idnumber','').'</p>';
		echo '<p>مكان الولادة:'. form_input('teacher_birthplace','').'</p>';
		echo '<p>تاريخ الميلاد:'. form_input('teacher_birthdate','').' يوم-شهر-سنة </p>';
		echo '<p>التخصص:'. form_input('teacher_specialist','').'</p>';
		echo '<p>تاريخ التخرج:'. form_input('teacher_gradedate','').' يوم-شهر-سنة </p>';
		echo '<p>المؤهل الدراسي:'. form_input('teacher_qual','').'</p>';
		echo '<p>اسم الجامعة:'. form_input('teacher_university','').'</p>';
		echo '<p>الجنسية:'. form_input('teacher_nationality','').'</p>';
		echo '<p>إيميل المعلم:'. form_input('teacher_email','').'</p>';
		echo '<p>جوال المعلم:'. form_input('teacher_mobile','').'</p>';
		
		echo '<p>'.form_submit('submit','إضافة').'</p>';
		echo form_close();
		echo "</div>";
	
	}
	
	//insert subject form
	if($table_data=='aq_subjects')
	{
		echo "<div id='insert_subject_div' style=''>";
		echo '<p>'.'إضافة مادة:'.'</p>';
		$att=array('id'=>'subject_insert_form');
		echo form_open('',$att);
		echo '<p>اسم المادة:'. form_input('subject_name','').'</p>';
		echo '<p>المرحلة:'. form_input('subject_level','').'</p>';
		echo '<p>الصف:'. form_input('subject_class','').'</p>';
		echo '<p>'.form_submit('submit','إضافة').'</p>';
		echo form_close();
		echo "</div>";
	
	}
	
	//insert test form
	if($table_data=='aq_tests')
	{
		echo "<div id='insert_test_div' style=''>";
		echo '<p>'.'إضافة معيار:'.'</p>';
		$att=array('id'=>'test_insert_form');
		echo form_open('',$att);
		echo '<p>اسم المعيار:'. form_input('test_name','').'</p>';
		echo '<p>المادة:'. form_input('test_subject','').'</p>';
		echo '<p>'.form_submit('submit','إضافة').'</p>';
		echo form_close();
		echo "</div>";
	
	}

	//insert skill form
	if($table_data=='aq_skills')
	{
		echo "<div id='insert_skill_div' style=''>";
		echo '<p>'.'إضافة مهارة:'.'</p>';
		$att=array('id'=>'skill_insert_form');
		echo form_open('',$att);
		echo '<p>اسم المهارة:'. form_input('skill_name','').'</p>';
		echo '<p>المعيار:'. form_input('skill_test','').'</p>';
		echo '<p>أقل درجة:'. form_input('min_grade','').'</p>';
		echo '<p>أعلى درجة:'. form_input('max_grade','').'</p>';
		
		echo '<p>'.form_submit('submit','إضافة').'</p>';
		echo form_close();
		echo "</div>";
	
	}
	
	//insert user form
	if($table_data=='aq_users')
	{
		echo "<div id='insert_user_div' style=''>";
		echo '<p>'.'إضافة مستخدم:'.'</p>';
		$att=array('id'=>'user_insert_form');
		echo form_open('',$att);
		echo '<p>اسم المستخدم:'. form_input('user_name','').'</p>';
		echo '<p>اسم الدخول:'. form_input('user_username','').'</p>';
		echo '<p>كلمة السر:'. form_input('user_password','').'</p>';
		echo '<p>إعادة كلمة السر:'. form_input('user_repassword','').'</p>';
		echo '<p>البريد الإلكتروني:'. form_input('user_email','').'</p>';
		echo '<p>الهاتف:'. form_input('user_mobile','').'</p>';
		echo '<p>المسمى الوظيفي :'. form_input('user_role','').'</p>';	
		echo '<p>'.form_submit('submit','إضافة').'</p>';
		echo form_close();
		echo "</div>";
	
	}
	
	$levels = $this->Mhome->get_levels();
	
	$classes = array(''=>'');
	$rooms = array(''=>'');
	
	echo form_dropdown('dropdown_name',$levels,'','class="level_drop"');
	echo form_dropdown('dropdown_name1',$classes,'','class="class_drop"');
	echo form_dropdown('dropdown_name2',$rooms,'','class="room_drop"');
	}

	?>


</div>

