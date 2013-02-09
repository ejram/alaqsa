                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
                          <div class="art-post">
                              <div class="art-post-tl"></div>
                              <div class="art-post-tr"></div>
                              <div class="art-post-bl"></div>
                              <div class="art-post-br"></div>
                              <div class="art-post-tc"></div>
                              <div class="art-post-bc"></div>
                              <div class="art-post-cl"></div>
                              <div class="art-post-cr"></div>
                              <div class="art-post-cc"></div>
                              <div class="art-post-body">
                          <div class="art-post-inner art-article">
                                          <h2 class="art-postheader"><? ?></h2>
                                          <div class="art-postcontent">
	<?  
	if($table_data!='aq_reports')
	if($this->session->userdata('user_role')=='admin')
	{
		
		$att = array('id' => 'table_form');
		echo form_open('', $att);
		$tmpl = array ( 'table_open'  => '<table class = "mytable"
				cellpadding = "8" cellspacing = "3" align="center">'
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
							'<span id = '.$row->subject_id.' class=\'modify_subject\'>
							تعديل</span>'
					);

					break;
				case 'aq_assign':
					$this->table->add_row('<input type="checkbox"
							name="check_list[]" value=\''. $row->assign_id .'\' />',
							$row->assign_teacher,$row->assign_level,$row->assign_class,$row->assign_room,
							$row->assign_subject,
							'<span id = '.$row->assign_id.' class=\'modify_assign\'>
									تعديل</span>'
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
							'<span id = '.$row->test_id.' class=\'add_skill\'>
							+ </span>', '<span id = '.$row->test_id.' class=\'modify_test\'>
							تعديل </span>'
					);

					break;

				case 'aq_permissions':
					$this->table->add_row('<input type="checkbox"
							name="check_list[]" value=\''. $row->permit_id .'\' />',
							$row->permit_username,$row->permit_level,$row->permit_class,
							$row->permit_room, $row->permit_subject, '<span id = '
									.$row->permit_id.' class=\'modify_permission\'> تعديل </span>'
											);

					break;

				case 'aq_skills':

					$this->table->add_row('<input type="checkbox"
							name="check_list[]" value=\''. $row->skill_id .'\' />',$row->skill_level,
							$row->skill_class,$row->skill_subject,
							$row->skill_name,$row->skill_test, $row->min_grade,
							$row->max_grade,
							 '<span id = '.$row->skill_id.' class=\'modify_skill\'>	تعديل </span>'

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
					$this->table->add_row(	);
									break;



				default:
					echo "";
			}
		}
		
		echo $this->table->generate();
		echo form_submit('submit','حذف');
		echo form_close();
		
		//insert level form
		if($table_data=='aq_levels')
		{
			echo "<button class='add_level add'>إضافة مرحلة</button>";
		}

		//insert class form
		if($table_data=='aq_classes add' )
		{
			echo "<button class='add_class'>إضافة صف</button>";
		}
		
		//insert room form
		if($table_data=='aq_rooms')
		{
			echo "<button class='add_room add'>إضافة فصل</button>";
				
		}
		
		
		
		//insert teacher form
		if($table_data=='aq_teachers')
		{
			echo "<button class='add_teacher add'>إضافة معلم</button>";
				

		}

		//insert subject form
		if($table_data=='aq_subjects')
		{
			echo "<button class='add_subject add'>إضافة مادة</button>";
				

		}

		//insert test form
		if($table_data=='aq_tests')
		{
			echo "<button class='add_test add'>إضافة معيار</button>";
				

		}

		//insert skill form
		if($table_data=='aq_skills')
		{
			echo "<button class='add_skill1 add'>إضافة مهارة</button>";
				

		}

		//insert user form
		if($table_data=='aq_users')
		{
			echo "<button class='add_user add'>إضافة مستخدم</button>";
				

		}
			

		//insert permission form
		if($table_data=='aq_permissions')
		{




			//permission form
			echo "<button class='add_permission add'>إضافة سماحية</button>";
				




		}
		//insert assign form
		if($table_data=='aq_assign')
		{
			echo "<button class='add_assign add'>اسناد</button>";
		
		
		}
		
		
		
		
		//insert student form
		if($table_data=='aq_students')
		{
			echo "<button class='add_student add'>إضافة طالب</button>";
		
		}
	}


		//insert report form
		if($table_data=='aq_reports')
		{
			$att11=array('id'=>'report_form', 'target'=>'_blank');
				
			$levels = $this->Mhome->get_levels();
			$users = $this->Mhome->get_users();

			$begin_para = array('all'=>'الكل');
			echo "<div class='form_div'>";
				
			echo form_open(base_url().'Report/',$att11);
			echo '<p><label>المرحلة:</label>'. form_dropdown('report_level',$levels ,'','class="r_level_drop required"').'</p>';
			echo '<p><label>الصف:</label>'. form_dropdown('report_class',$begin_para ,'','class="r_class_drop required"').'</p>';
			echo '<p><label>الفصل:</label>'. form_dropdown('report_room',$begin_para ,'','class="r_room_drop required"').'</p>';
			echo '<p><label>المادة:</label>'. form_dropdown('report_subject',$begin_para,'','class="r_subject_drop required"').'</p>';
			echo '<p><label>المعيار:</label>'. form_dropdown('report_test',$begin_para ,'','class="r_test_drop required"').'</p>';
			echo '<p><label>المهارة:</label>'. form_dropdown('report_skill',$begin_para ,'','class="r_skill_drop required"').'</p>';
			echo '<p><label>اسم الطالب:</label>'. form_dropdown('report_student',$begin_para ,'','class="r_student_drop required"').'</p>';
			echo form_submit('submit','إظهار');
			echo form_close();
			echo "</div>";

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


			case 'aq_marks':
				$this->table->set_heading('المرحلة', 'الصف', 'الفصل', 'المادة', 'المعيار', 'المهارة', 'الطالب','العلامة'
						);


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
						$permit_marks=$this->Mhome->get_where('aq_marks', array('mark_level'=>$row->permit_level,
						'mark_class'=>$row->permit_class, 'mark_subject'=>$row->permit_subject,
						'mark_room' => $row->permit_room
						));

						foreach($permit_marks -> result() as $row3)
						{
							$mark_st=$this->Mhome->get_where('aq_students', array('st_id'=>$row3->mark_student
							));
							foreach($mark_st->result() as $student_fn)
								$this->table->add_row($row3->mark_level,
										$row3->mark_class,$row3->mark_room,
										$row3->mark_subject,$row3->mark_test, $row3->mark_skill,
										$student_fn->st_fna . ' ' . $student_fn->st_ffna . ' ' . $student_fn->st_lna,
										$row3->mark_value

								);

						}
						break;
					default:
						echo"";
				}


			}

		}




		echo $this->table->generate();
		echo form_close();


		//insert mark form
		if($table_data=='aq_marks')
		{
			echo "<button class='add_mark'>إضافة علامة</button>";
				

		}

	}




	?>
                                          
                                              		
                                              	</div><!-- end row -->
                                              </div><!-- end table -->
                                                  
                                          </div>
                                          
                                          
                          </div>
                          
                              </div>
                          </div>
                          </div>
                