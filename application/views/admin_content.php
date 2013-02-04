
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
			case 'aq_assign':
				$this->table->set_heading('<input type="checkbox"
						name="assign_check" value="all"/>',
						'اسم المعلم','المرحلة','الصف','الفصل','المادة','تعديل'
								);
								echo form_hidden('hidden_table_name',$table_data);
								echo form_hidden('hidden_item_id','assign_id');
								break;
			case 'aq_students':
				$this->table->set_heading('<input type="checkbox"
						name="students_check" value="all"/>',
						'اسم الطالب','اسم الأب','اسم العائلة','المرحلة','الصف','الفصل','عرض التفاصيل','تعديل'
								);
								echo form_hidden('hidden_table_name',$table_data);
								echo form_hidden('hidden_item_id','st_id');
								break;



			case 'aq_tests':
				$this->table->set_heading('<input type="checkbox"
						name="tests_check" value="all" />',
						'اسم المعيار','المرحلة','الصف','المادة','مجموع المهارات',
						'إضافة مهارة','تعديل المعيار'
								);
								echo form_hidden('hidden_table_name',$table_data);
								echo form_hidden('hidden_item_id','test_id');
								break;

			case 'aq_permissions':
				$this->table->set_heading('<input type="checkbox"
						name="permissions_check" value="all" />',
						'اسم المستخدم','المرحلة','الصف','الفصل','المادة','تعديل'
								);
								echo form_hidden('hidden_table_name',$table_data);
								echo form_hidden('hidden_item_id','permit_id');
								break;
			case 'aq_skills':
				$this->table->set_heading('<input type="checkbox"
						name="skills_check" value="all" />' ,'المرحلة','الصف','المادة','اسم المهارة' ,'المعيار' ,'أقل درجة',
						'أعلى درجة','تعديل المهارة'
								);
								echo form_hidden('hidden_table_name',$table_data);
								echo form_hidden('hidden_item_id','skill_id');
								break;
			case 'aq_users':
				$this->table->set_heading('<input type="checkbox"
						name="users_check" value="all" />','اسم المستخدم','اسم الدخول ','كلمة السر','البريد  الالكتروني'
								,'الهاتف ','مسمى الوظيفة','تعديل المستخدم'
										);
										echo form_hidden('hidden_table_name',$table_data);
										echo form_hidden('hidden_item_id','user_id');
										break;
			case 'aq_reports':
				$this->table->set_heading('<input type="checkbox"
						name="reports_check" value="all" />','اسم التقرير','المرحلة ','الصف','الفصل'
								,'المادة ','المعيار','المهارة','تعديل'
										);
										echo form_hidden('hidden_table_name',$table_data);
										echo form_hidden('hidden_item_id','report_id');
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
					$tests_num=$this->Mhome->get_where('aq_tests',array('test_subject'=>$row->subject_name,
					'test_level'=>$row->subject_level,'test_class'=>$row->subject_class));
					$this->table->add_row('<input type="checkbox"
							name="check_list[]" value=\''. $row->subject_id .'\' />',
							$row->subject_name,$row->subject_level,
							$row->subject_class,$tests_num->num_rows(),
							'تعديل'
					);

					break;
				case 'aq_assign':
					$this->table->add_row('<input type="checkbox"
							name="check_list[]" value=\''. $row->assign_id .'\' />',
							$row->assign_teacher,$row->assign_level,$row->assign_class,$row->assign_room,
							$row->assign_subject,
							'تعديل'
									);
									break;

				case 'aq_students':
					$this->table->add_row('<input type="checkbox"
							name="check_list[]" value=\''. $row->st_id .'\' />',
							$row->st_fna,$row->st_ffna,$row->st_gfna,$row->st_level
							,$row->st_class,$row->st_room,
							'<span id = '.$row->st_id.' class=\'show_details\'>
									عرض التفاصيل</span>',
									'<span id = '.$row->st_id.' class=\'modify_student\'>
											تعديل </span>'
											);
											break;

				case 'aq_tests':
					$skills_num=$this->Mhome->get_where('aq_skills',
					array('skill_test'=>$row->test_name,'skill_level'=>$row->test_level,
					'skill_class'=>$row->test_class,'skill_subject'=>$row->test_subject
					));
					$this->table->add_row('<input type="checkbox"
							name="check_list[]" value=\''. $row->test_id .'\' />',
							$row->test_name,$row->test_level,$row->test_class, $row->test_subject,
							$skills_num->num_rows(),
							anchor('#','+'),anchor('#','تعديل')
					);

					break;

				case 'aq_permissions':
					$this->table->add_row('<input type="checkbox"
							name="check_list[]" value=\''. $row->permit_id .'\' />',
							$row->permit_username,$row->permit_level,$row->permit_class,
							$row->permit_room, $row->permit_subject, anchor('#','تعديل')
					);

					break;

				case 'aq_skills':
					$skill_query=$this->Mhome->get_where('aq_tests',
					'test_name',
					$row->skill_test);
					$this->table->add_row('<input type="checkbox"
							name="check_list[]" value=\''. $row->skill_id .'\' />',$row->skill_level,
							$row->skill_class,$row->skill_subject,
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

				case 'aq_reports':
					$this->table->add_row('<input type="checkbox"
							name="check_list[]" value=\''. $row->report_id . '\'/>',
							$row->report_name,$row->report_level,
							$row->report_class,$row->report_room,
							$row->report_subject,$row->report_test,$row->report_skill,
							'<span id = '.$row->report_id.' class=\'modify_report\'>تعديل</span>'

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
			echo "<div id='insert_level_div'>";
			echo '<p>'.'إضافة مرحلة:'.'</p>';
			$att=array('id'=>'level_insert_form');
			echo form_open('',$att);
			echo '<p>المرحلة:'. form_input('level_insert_name','').'</p>';
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
			echo '<p>المرحلة:'. form_input('test_level','').'</p>';
			echo '<p>الصف:'. form_input('test_class','').'</p>';
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
			echo '<p>المرحلة:'. form_input('skill_level','').'</p>';
			echo '<p>الصف:'. form_input('skill_class','').'</p>';
			echo '<p>المادة:'. form_input('skill_subject','').'</p>';
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
			

		//insert permission form
		if($table_data=='aq_permissions')
		{
			echo "<div id='permission_search_div' style=''>";
			echo '<p>'.'إضافة مستخدم:'.'</p>';
			$att=array('id'=>'permission_search_form');
			echo form_open('',$att);
			echo '<p>اسم الدخول للمستخدم:'. form_input('user_search','').'</p>';

			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";



			//permission form
			echo "<div id='insert_permission_div' style=''>";
			echo '<p>'.'إضافة صلاحيات:'.'</p>';
			$att=array('id'=>'permission_insert_form');
			echo form_open('',$att);
			echo '<p>اسم الدخول للمستخدم:'. form_input('permit_username','').'</p>';
			echo '<p> المرحلة:'. form_input('permit_level','').'</p>';
			echo '<p> الصف:'. form_input('permit_class','').'</p>';
			echo '<p>الفصل:'. form_input('permit_room','').'</p>';
			echo '<p>المادة :'. form_input('permit_subject','').'</p>';
			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";




		}


		//insert user form
		if($table_data=='aq_reports')
		{
			echo "<div id='insert_report_div' style=''>";
			echo '<p>'.'إضافة تقرير:'.'</p>';
			$att=array('id'=>'report_insert_form');
			echo form_open('',$att);
			echo '<p>اسم التقرير:'. form_input('report_name','').'</p>';
			echo '<p>المرحلة:'. form_input('report_level','').'</p>';
			echo '<p>الصف :'. form_input('report_class','').'</p>';
			echo '<p>الفصل:'. form_input('report_room','').'</p>';
			echo '<p>المادة:'. form_input('report_subject','').'</p>';
			echo '<p>المعيار:'. form_input('report_test','').'</p>';
			echo '<p>المهارة  :'. form_input('report_skill','').'</p>';
			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";

		}

		//insert assign form
		if($table_data=='aq_assign')
		{
			echo "<div id='insert_assign_div' style=''>";
			echo '<p>'.'إضافة تقرير:'.'</p>';
			$att=array('id'=>'assign_insert_form');
			echo form_open('',$att);
			echo '<p>اسم المعلم:'. form_input('assign_teacher','').'</p>';
			echo '<p>المرحلة:'. form_input('assign_level','').'</p>';
			echo '<p>الصف:'. form_input('assign_class','').'</p>';
			echo '<p>الفصل:'. form_input('assign_room','').'</p>';
			echo '<p>المادة:'. form_input('assign_subject','').'</p>';
			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";

		}


		//insert student form
		if($table_data=='aq_students')
		{
			echo "<div id='insert_student_div' style=''>";
			echo '<p>'.'إضافة طالب:'.'</p>';
			$att=array('id'=>'student_insert_form');
			echo form_open('',$att);
			echo '<p> الجنسية:'. form_input('st_nationality','').'</p>';
			echo '<p> رقم جواز السفر:'. form_input('st_passnum','').'</p>';
			echo '<p> رقم السجل المدني للطالب/الإقامة:'. form_input('st_urbannum','').'</p>';
			echo '<p> تاريخ الهوية:'. form_input('st_iddate','').'</p>';
			echo '<p> تاريخ انتهاء الإقامة:'. form_input('st_stayvalid','').'</p>';
			echo '<p> الاسم الأول بالعربي:'. form_input('st_fna','').'</p>';
			echo '<p> الاسم الأول بالأنجليزي:'. form_input('st_fne','').'</p>';
			echo '<p> اسم الأب بالعربي:'. form_input('st_ffna','').'</p>';
			echo '<p> اسم الأب بالانجليزي:'. form_input('st_ffne','').'</p>';
			echo '<p> اسم الجد بالعربي:'. form_input('st_gfna','').'</p>';
			echo '<p> اسم الجد بالإنجليزي:'. form_input('st_gfne','').'</p>';
			echo '<p> اسم العائلة بالعربي:'. form_input('st_lna','').'</p>';
			echo '<p> اسم العائلة بالإنجليزي:'. form_input('st_lne','').'</p>';
			echo '<p> تاريخ ميلاد الطالب:'. form_input('st_birthdate','').'</p>';
			echo '<p> مكان الميلاد:'. form_input('st_birthdate','').'</p>';
			echo '<p> اسم ولي أمر الطالب الرباعي:'. form_input('st_guardname','').'</p>';
			echo '<p> تاريخ ميلاد ولي الأمر:'. form_input('st_guardbirth','').'</p>';
			echo '<p> مكان ميلاد ولي الأمر:'. form_input('st_guardplace','').'</p>';
			echo '<p> رقم هوية ولي الأمر:'. form_input('st_guardidnum','').'</p>';
			echo '<p> تاريخ الهوية لولي الأمر:'. form_input('st_guardiddate','').'</p>';
			echo '<p> فئة دم الطالب:'. form_input('st_blood','').'</p>';
			echo '<p> نوع السكن:'. form_input('st_livingplace','').'</p>';
			echo '<p> ملكية السكن:'. form_input('st_livingowning','').'</p>';
			echo '<p> الحالة الإجتماعية لولي أمر الطالب:'. form_input('st_guardmarital','').'</p>';
			echo '<p> المنطقة الإدارية:'. form_input('st_region','').'</p>';
			echo '<p> المدينة:'. form_input('st_city','').'</p>';
			echo '<p> الحي:'. form_input('st_district','').'</p>';
			echo '<p> الشارع الرئيسي:'. form_input('st_mainstr','').'</p>';
			echo '<p> الشارع الفرعي:'. form_input('st_substr','').'</p>';
			echo '<p> رقم المنزل:'. form_input('st_homenum','').'</p>';
			echo '<p> بجوار:'. form_input('st_homebeside','').'</p>';
			echo '<p> الهاتف 1:'. form_input('st_phone1','').'</p>';
			echo '<p> الهاتف 2:'. form_input('st_phone2','').'</p>';
			echo '<p> الجوال (هاتف التواصل):'. form_input('st_mobile','').'</p>';
			echo '<p> البريد الإلكتروني:'. form_input('st_email','').'</p>';
			echo '<p> عمل ولي الأمر:'. form_input('st_guardjob','').'</p>';
			echo '<p> جهة العمل:'. form_input('st_guardcomp','').'</p>';
			echo '<p> العنوان في الإجازة:'. form_input('st_vacaddress','').'</p>';
			echo '<p> الرمز البريدي:'. form_input('st_postal','').'</p>';
			echo '<p> صندوق البريد:'. form_input('st_mailbox','').'</p>';
			echo '<p> الفاكس:'. form_input('st_fax','').'</p>';
			echo '<p> وسيلة النقل:'. form_input('st_vehicle','').'</p>';
			echo '<p> حالة التسجيل:'. form_input('st_joinstate','').'</p>';
			echo '<p> هل يسكن في قرية:'. form_input('st_villageask','').'</p>';
			echo '<p> اسم القرية:'. form_input('st_village','').'</p>';
			echo '<p> اسم قريب الطالب:'. form_input('st_kinname','').'</p>';
			echo '<p> عنوان قريب الطالب:'. form_input('st_kinaddress','').'</p>';
			echo '<p> عدد أفراد الأسرة:'. form_input('st_familynum','').'</p>';
			echo '<p> عدد الأخوة:'. form_input('st_bronum','').'</p>';
			echo '<p> عدد الأخوات:'. form_input('st_sisnum','').'</p>';
			echo '<p> تسلسل الطالب:'. form_input('st_seq','').'</p>';
			echo '<p> هل الأب على قيد الحياة:'. form_input('st_fatheralive','').'</p>';
			echo '<p> هل الأم على قيد الحياة:'. form_input('st_motheralive','').'</p>';
			echo '<p> مستوى تعليم الأب:'. form_input('st_fatheredulevel','').'</p>';
			echo '<p> مستوى تعليم الأم:'. form_input('st_motheredulevel','').'</p>';
			echo '<p> مع من يسكن الطالب:'. form_input('st_livingwith','').'</p>';
			echo '<p> المرحلة:'. form_input('st_level','').'</p>';
			echo '<p> الصف:'. form_input('st_class','').'</p>';
			echo '<p> الفصل:'. form_input('st_room','').'</p>';




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


	if($this->session->userdata('user_role')=='user')
	{

		$user_name=$this->session->userdata('user_username');
		$permit_query = $this->Mhome->get_where('aq_permissions',
				array('permit_username'=>$user_name));
		$att = array('id' => 'table_form');
		echo form_open('', $att);
		$tmpl = array ( 'table_open'  => '<table class = "mytable"
				cellpadding = "5" cellspacing = "3">'
		);
		$this->table->set_template($tmpl);
		switch ($table_data)
		{
			case 'aq_tests':
				$this->table->set_heading(
				'اسم المعيار','المرحلة','الصف','المادة','مجموع المهارات'

						);
						echo form_hidden('hidden_table_name',$table_data);
						echo form_hidden('hidden_item_id','test_id');
						break;
			case 'aq_skills':
				$this->table->set_heading('المرحلة','الصف','المادة','اسم المهارة' ,'المعيار' ,'أقل درجة',
				'أعلى درجة'
						);
						echo form_hidden('hidden_table_name',$table_data);
						echo form_hidden('hidden_item_id','skill_id');
						break;
			default:
				echo"";
					
					
		}
		foreach ($permit_query->result() as $row)
		{
			$permit_tests=$this->Mhome->get_where('aq_tests', array('test_level'=>$row->permit_level,
					'test_class'=>$row->permit_class, 'test_subject'=>$row->permit_subject
			));
			foreach($permit_tests -> result() as $row1)
				$skills_num=$this->Mhome->get_where('aq_skills',
						array('skill_test' => $row1->test_name,'skill_level'=> $row1->test_level,
								'skill_class'=> $row1->test_class ,'skill_subject'=>$row1->test_subject));
			{
				switch($table_data)
				{
					
					case 'aq_tests':
						$this->table->add_row($row1->test_name,$row1->test_level,$row1->test_class, $row1->test_subject,
						$skills_num->num_rows()
						);
						break;
						
					case 'aq_skills':
						foreach($skills_num-> result() as $row2)
						{
						

						
						$this->table->add_row($row2->skill_level,
								$row2->skill_class,$row2->skill_subject,
								$row2->skill_name,$row2->skill_test, $row2->min_grade,
								$row2->max_grade

						);
						}
						break;
					
					case 'aq_marks':
						
					default:
						echo"";
				}
				
				
			}

		}
	}

	echo $this->table->generate();
	echo form_close();


	?>


</div>

