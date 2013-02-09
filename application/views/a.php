<!doctype html>
<html lang="ar" dir="rtl">
<head>
    
<meta charset="UTF-8" />
    <title>Alaqsa </title>
<link
	rel="stylesheet" href="<?= base_url(); ?>css/style.css" type="text/css" />
<!--[if IE 6]><link rel="stylesheet" href="<?= base_url(); ?>css/style.ie6.css" type="text/css"  /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?= base_url(); ?>css/style.ie7.css" type="text/css"  /><![endif]-->
	    <script type="text/javascript" src="<?= base_url(); ?>css/script.js"></script>
	
<link rel="stylesheet"
	href="<?= base_url(); ?>css/jquery-ui/css/theme/jquery-ui-1.10.0.custom.min.css"
	type="text/css" />
<link rel="stylesheet"
	href="<?= base_url(); ?>css/home_style.css" type="text/css" />

<script
	src="<?= base_url();?>js/jquery.js"></script>
<script
	src="<?= base_url();?>js/home.js"></script>
<script
	src="<?= base_url();?>css/jquery-ui/js/jquery-ui-1.10.0.custom.min.js"></script>
    
</head>
<body dir="rtl">
<div id="art-page-background-middle-texture">
    <div id="art-main">
        <div class="art-sheet">
            <div class="art-sheet-tl"></div>
            <div class="art-sheet-tr"></div>
            <div class="art-sheet-bl"></div>
            <div class="art-sheet-br"></div>
            <div class="art-sheet-tc"></div>
            <div class="art-sheet-bc"></div>
            <div class="art-sheet-cl"></div>
            <div class="art-sheet-cr"></div>
            <div class="art-sheet-cc"></div>
            <div class="art-sheet-body">
                <div class="art-nav" dir="rtl">
                	<ul class="art-menu" dir="rtl">
                	<?php 
		echo "<div class='logout_div'>";
			echo 'أهلاً سيد:'.$this->session->userdata('user_name');
			echo '<br /><a href='.base_url().'home/do_logout>تسجيل الخروج</a>';
		echo '</div>';	 

			$user_role=$this->session->userdata('user_role');

			switch($user_role)
			{
				case 'admin':
					?>
                		<li>
                			<a href="<?= base_url(); ?>Home/c_panel/aq_levels" >
                			<span class="l"></span><span class="r"></span><span class="t">المراحل</span></a>
                		</li>
                		<li>
                			<a href="<?= base_url(); ?>Home/c_panel/aq_permissions">
                			<span class="l"></span><span class="r"></span><span class="t">إدارة السماحيات</span></a>
                			
                		</li>		
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_classes"><span class="l"></span><span class="r"></span><span class="t"> الصفوف</span> </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_rooms"><span class="l"></span><span class="r"></span><span class="t"> الفصول</span> </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_teachers"><span class="l"></span><span class="r"></span><span class="t"> المعلمين </span></a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_subjects"><span class="l"></span><span class="r"></span><span class="t"> المواد </span></a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_assign"><span class="l"></span><span class="r"></span><span class="t"> الإسناد </span></a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_students"><span class="l"></span><span class="r"></span><span class="t"> الطلاب </span></a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_tests"><span class="l"></span><span class="r"></span><span class="t"> المعايير </span></a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_skills"><span class="l"></span><span class="r"></span><span class="t"> المهارات </span></a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_users"><span class="l"></span><span class="r"></span><span class="t"> المستخدمين </span></a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_reports"><span class="l"></span><span class="r"></span><span class="t"> التقارير</span> </a>
			</li>
			<?php 
			break;
					case 'user':	?>

			<li>
			<a href="<?= base_url(); ?>Home/c_panel/aq_tests"><span class="l"></span><span class="r"></span><span class="t"> المعايير </span></a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_skills"><span class="l"></span><span class="r"></span><span class="t"> المهارات </span></a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_marks"><span class="l"></span><span class="r"></span><span class="t"> الدرجات </span></a>
			</li>
			<?php
				break;
					
			} ?>

                	</ul>
                </div>
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

		//insert level form
		if($table_data=='aq_levels')
		{
			echo "<div id='insert_level_div'>";
			echo '<p>'.'إضافة مرحلة:'.'</p>';
			$att=array('id'=>'level_insert_form');
			echo form_open('',$att);
			echo '<p>المرحلة:'. form_input('level_insert_name','').'</p>';
			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";
		}

		//insert class form
		if($table_data=='aq_classes')
		{
			echo "<div id='insert_class_div'>";
			echo '<p>'.'إضافة صف:'.'</p>';
			$att=array('id'=>'class_insert_form');
			$levels = $this->Mhome->get_levels();
				
			echo form_open('',$att);
			echo '<p>المرحلة:'. form_dropdown('level_name',$levels ,'','class="level_drop"').'</p>';				
			echo '<p>الصف:'. form_input('class_name','').'</p>';
			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";
		}
		
		//insert room form
		if($table_data=='aq_rooms')
		{
			echo "<div id='insert_room_div'>";
			echo '<p>'.'إضافة فصل:'.'</p>';
			$att=array('id'=>'room_insert_form');
			$levels = $this->Mhome->get_levels();
			$begin_para = array(''=>'');
			echo form_open('',$att);
			echo '<p>المرحلة:'. form_dropdown('room_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('room_class',$begin_para ,'','class="class_drop"').'</p>';				
			echo '<p>الفصل:'. form_input('room_name','').'</p>';
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
			echo '<p>تاريخ الميلاد:'. form_input('teacher_birthdate','','class="datep"').' يوم-شهر-سنة </p>';
			echo '<p>التخصص:'. form_input('teacher_specialist','').'</p>';
			echo '<p>تاريخ التخرج:'. form_input('teacher_gradedate','','class="datep"').' يوم-شهر-سنة </p>';
			echo '<p>المؤهل الدراسي:'. form_input('teacher_qual','').'</p>';
			echo '<p>اسم الجامعة:'. form_input('teacher_university','').'</p>';
			echo '<p>الجنسية:'. form_input('teacher_nationality','').'</p>';
			echo '<p>إيميل المعلم:'. form_input('teacher_email','').'</p>';
			echo '<p>جوال المعلم:'. form_input('teacher_mobile','').'</p>';

			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";

		}

		
// 		$levels = $this->Mhome->get_levels();
//		$begin_para = array(''=>'');

// 		echo '<p>المرحلة:'. form_dropdown('assign_level',$levels ,'','class="level_drop"').'</p>';
// 		echo '<p>الصف:'. form_dropdown('assign_class',$begin_para ,'','class="class_drop"').'</p>';
// 		echo '<p>الفصل:'. form_dropdown('assign_room',$begin_para ,'','class="room_drop"').'</p>';
// 		echo '<p>المادة:'. form_dropdown('assign_subject',$begin_para,'','class="subject_drop"').'</p>';
// 		echo '<p>اسم المعلم:'. form_dropdown('assign_teacher',$teachers,'','class=""').'</p>';
		//insert subject form
		if($table_data=='aq_subjects')
		{
			$levels = $this->Mhome->get_levels();
			$begin_para = array(''=>'');
			echo "<div id='insert_subject_div' style=''>";
			echo '<p>'.'إضافة مادة:'.'</p>';
			$att=array('id'=>'subject_insert_form');
			echo form_open('',$att);
			echo '<p>اسم المادة:'. form_input('subject_name','').'</p>';
			echo '<p>المرحلة:'. form_dropdown('subject_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('subject_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";

		}

		//insert test form
		if($table_data=='aq_tests')
		{
			$levels = $this->Mhome->get_levels();
			$begin_para = array(''=>'');
			echo "<div id='insert_test_div' style=''>";
			echo '<p>'.'إضافة معيار:'.'</p>';
			$att=array('id'=>'test_insert_form');
			echo form_open('',$att);
			echo '<p>اسم المعيار:'. form_input('test_name','').'</p>';
			echo '<p>المرحلة:'. form_dropdown('test_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('test_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>المادة:'. form_dropdown('test_subject',$begin_para,'','class="subject_drop"').'</p>';
			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";

		}

		//insert skill form
		if($table_data=='aq_skills')
		{
			$levels = $this->Mhome->get_levels();
			$begin_para = array(''=>'');
			echo "<div id='insert_skill_div' style=''>";
			echo '<p>'.'إضافة مهارة:'.'</p>';
			$att=array('id'=>'skill_insert_form');
			echo form_open('',$att);
			echo '<p>اسم المهارة:'. form_input('skill_name','').'</p>';
			echo '<p>المرحلة:'. form_dropdown('skill_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('skill_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>المادة:'. form_dropdown('skill_subject',$begin_para,'','class="subject_drop"').'</p>';
			echo '<p>المعيار:'. form_dropdown('skill_test',$begin_para ,'','class="test_drop"').'</p>';
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
			$role_array= array('admin'=>'مدير','user'=>'مستخدم');
			echo '<p>المسمى الوظيفي :'. form_dropdown('user_role',$role_array).'</p>';
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
			$levels = $this->Mhome->get_levels();
			$users = $this->Mhome->get_users();
				
			$begin_para = array(''=>'');

			echo "<div id='insert_permission_div' style=''>";
			echo '<p>'.'إضافة صلاحيات:'.'</p>';
			$att=array('id'=>'permission_insert_form');
			echo form_open('',$att);
			echo '<p>اسم الدخول للمستخدم:'. form_dropdown('permit_username',$users).'</p>';
			echo '<p>المرحلة:'. form_dropdown('permit_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('permit_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>الفصل:'. form_dropdown('permit_room',$begin_para ,'','class="room_drop"').'</p>';
			echo '<p>المادة:'. form_dropdown('permit_subject',$begin_para,'','class="subject_drop"').'</p>';
			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";




		}


		//insert user form
		if($table_data=='aq_reports')
		{
			$levels = $this->Mhome->get_levels();
			$users = $this->Mhome->get_users();
			
			$begin_para = array(''=>'');
				
			echo "<div id='insert_report_div' style=''>";
			echo '<p>'.'إضافة تقرير:'.'</p>';
			$att=array('id'=>'report_insert_form');
			echo form_open('',$att);
			?>
						<div id = "levelsdiv">
			<?php 
			foreach($levels as $level_check)
			{
				echo form_checkbox('levels_check', $level_check, FALSE) . $level_check ;
			}
			?>
			</div>
			<div id = "classesdiv"></div>
			<div id = "roomsdiv"></div>
			<div id = "subjectsdiv"></div>
			<div id = "testsdiv"></div>
			<?php 
			echo '<p>المرحلة:'. form_dropdown('report_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('report_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>الفصل:'. form_dropdown('report_room',$begin_para ,'','class="room_drop"').'</p>';
			echo '<p>المادة:'. form_dropdown('report_subject',$begin_para,'','class="subject_drop"').'</p>';
			echo '<p>المعيار:'. form_dropdown('report_test',$begin_para ,'','class="test_drop"').'</p>';
			echo '<p>المهارة:'. form_dropdown('report_skill',$begin_para ,'','class="skill_drop"').'</p>';
				
			echo '<p>اسم التقرير:'. form_input('report_name','').'</p>';
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
			$levels = $this->Mhome->get_levels();
			
			$begin_para = array(''=>'');
			echo form_open('',$att);
			echo '<p>اسم المعلم:'. form_input('assign_teacher','').'</p>';
			echo '<p>المرحلة:'. form_dropdown('assign_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('assign_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>الفصل:'. form_dropdown('assign_room',$begin_para ,'','class="room_drop"').'</p>';
			echo '<p>المادة:'. form_dropdown('assign_subject',$begin_para,'','class="subject_drop"').'</p>';
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
			$levels = $this->Mhome->get_levels();			
			$begin_para = array(''=>'');
			
			echo form_open('',$att);
			echo '<p> الجنسية:'. form_input('st_nationality','').'</p>';
			echo '<p> رقم جواز السفر:'. form_input('st_passnum','').'</p>';
			echo '<p> رقم السجل المدني للطالب/الإقامة:'. form_input('st_urbannum','').'</p>';
			echo '<p> تاريخ الهوية:'. form_input('st_iddate','','class="datep"').'</p>';
			echo '<p> تاريخ انتهاء الإقامة:'. form_input('st_stayvalid','','class="datep"').'</p>';
			echo '<p> الاسم الأول بالعربي:'. form_input('st_fna','').'</p>';
			echo '<p> الاسم الأول بالأنجليزي:'. form_input('st_fne','').'</p>';
			echo '<p> اسم الأب بالعربي:'. form_input('st_ffna','').'</p>';
			echo '<p> اسم الأب بالانجليزي:'. form_input('st_ffne','').'</p>';
			echo '<p> اسم الجد بالعربي:'. form_input('st_gfna','').'</p>';
			echo '<p> اسم الجد بالإنجليزي:'. form_input('st_gfne','').'</p>';
			echo '<p> اسم العائلة بالعربي:'. form_input('st_lna','').'</p>';
			echo '<p> اسم العائلة بالإنجليزي:'. form_input('st_lne','').'</p>';
			echo '<p> تاريخ ميلاد الطالب:'. form_input('st_birthdate','','class="datep"').'</p>';
			echo '<p> مكان الميلاد:'. form_input('st_birthplace','').'</p>';
			echo '<p> اسم ولي أمر الطالب الرباعي:'. form_input('st_guardname','').'</p>';
			echo '<p> تاريخ ميلاد ولي الأمر:'. form_input('st_guardbirth','','class="datep"').'</p>';
			echo '<p> مكان ميلاد ولي الأمر:'. form_input('st_guardplace','').'</p>';
			echo '<p> رقم هوية ولي الأمر:'. form_input('st_guardidnum','').'</p>';
			echo '<p> تاريخ الهوية لولي الأمر:'. form_input('st_guardiddate','','class="datep"').'</p>';
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

			echo '<p>المرحلة:'. form_dropdown('st_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('st_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>الفصل:'. form_dropdown('st_room',$begin_para ,'','class="room_drop"').'</p>';
				



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
			echo "<div id='insert_mark_div' style=''>";
			echo '<p>'.'إضافة درجة:'.'</p>';
			$att=array('id'=>'mark_insert_form');
			$levels = $this->Mhome->get_levels_permit();
			
			$begin_para = array(''=>'');
			echo form_open('',$att);
			echo '<p>المرحلة:'. form_dropdown('mark_level',$levels ,'','class="level_drop_permit"').'</p>';
			echo '<p>الصف:'. form_dropdown('mark_class',$begin_para ,'','class="class_drop_permit"').'</p>';
			echo '<p>الفصل:'. form_dropdown('mark_room',$begin_para ,'','class="room_drop_permit"').'</p>';
			echo '<p>المادة:'. form_dropdown('mark_subject',$begin_para,'','class="subject_drop_permit"').'</p>';
			echo '<p>المعيار:'. form_dropdown('mark_test',$begin_para ,'','class="test_drop_permit"').'</p>';
			echo '<p>المهارة:'. form_dropdown('mark_skill',$begin_para ,'','class="skill_drop_permit"').'</p>';
			echo '<p>اسم الطالب:'. form_dropdown('mark_student',$begin_para ,'','class="student_drop_permit"').'</p>';
			echo '<p>العلامة:'. form_input('mark_value','').'</p>';
			echo '<p>'.form_submit('submit','إضافة').'</p>';
			echo form_close();
			echo "</div>";

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
                    </div>
                </div>
            </div>
        </div>

    
    <!-- class_delete_dialog to delete class in the classes page -->
<div id="class_delete_dialog" title="حذف صف">
	<?php 
	$att=array('id'=>'delete_class_form');

	echo form_open('',$att);

	echo '<p>' .'هل أنت متأكد من حذف الصف:'.'<span id = \'class_span\'></span></p>';

	$delete_att=array('id'=>'delete_input_id',
			'name'=>'delete_input');

	echo form_input($delete_att);

	echo form_submit('submit','موافق');

	$cancel_att=array('id'=>'cancel_id','name'=>'cancel_button',
			'onClick'=>"$('#class_delete_dialog').dialog('close');");

	echo form_button($cancel_att,'تراجع');

	echo form_close();
	?>
</div>

<!-- room_insert_dialog to insert room in the classes page -->

<div id="room_insert_dialog1" title="إضافة فصل">
	<?php 
	/*
	 $att=array('id'=>'room_insert_form');
	echo form_open('',$att);

	$room_input_att=array('id'=>'room_insert_id','name'=>'room_insert_name');

	$room_hidden_att=array('id'=>'room_hidden_input_id',
							 'name'=>'room_hidden_input_name',
			'style' => 'display:none;');
	$room_hidden_level_att=array('id'=>'room_hidden_level_input_id',
		'name'=>'room_hidden_level_input_name',
			'style' => 'display:none;');
	echo form_input($room_hidden_att);
	echo form_input($room_hidden_level_att);

	echo "اسم الفصل: ";

	echo form_input($room_input_att);

	echo form_submit('submit','إضافة');

	$cancel_att=array('id'=>'cancel_id','name'=>'cancel_button',
				  'onClick'=>'$(\'#room_insert_dialog\').dialog(\'close\');');

	echo form_button($cancel_att,'تراجع');

	echo form_close();
	*/
	?>
</div>

<!-- modify_class_dialog to modify a class in the classes page -->
<div id="class_modify_dialog" title="تعديل الصف">
	<?php
	$levels = $this->Mhome->get_levels();

	$class_modify_input_att = array('id'    => 'class_modify_input_id',
									'name'  => 'class_modify_input_name',
									'value' => '');

	$class_hidden_past_name = array('id'  => 'hidden_past_class_id',
									'name'=> 'hidden_past_class_id');

	$class_modify_cancel_att = array('id'      => 'class_modify_cancel_id',
									 'onClick' => '$(\'#class_modify_dialog\')
												   .dialog(\'close\');');

	$att = array('id' => 'modify_class_form');

	echo form_open('', $att);

	echo '<p>المرحلة: '. form_dropdown('class_level_modify_name',$levels,'','class="level_drop"').'</p>';

	echo ' :اسم الصف ' . form_input($class_modify_input_att);

	echo form_input($class_hidden_past_name);

	echo form_submit('submit', 'تعديل');



	echo form_button($class_modify_cancel_att,'تراجع');

	echo form_close();
	?>
</div>
<!-- Insert Class form -->
<div id="add_class_dialog" title="إضافة صف">
	<?php 
	echo '<p>'.'إضافة صف:'.'</p>';
	$att=array('id'=>'class_insert_form');
	$levels = $this->Mhome->get_levels();
	echo form_open('',$att);
	echo '<p>المرحلة:'. form_dropdown('aqsa_level2',$levels,'','class="level_drop"').'</p>';
	echo '<p>الصف:'. form_input('aqsa_class2','الأول').'</p>';
	echo '<p>'.form_submit('submit','إضافة').'</p>';
	echo form_close();
	?>
</div>


<!-- Insert Room form -->
<div id="room_insert_dialog" title="إضافة فصل">
	<?php 
	echo '<p>'.'إضافة فصل:'.'</p>';
	$att=array('id'=>'room_insert_form');
	$levels = $this->Mhome->get_levels();
	$classes = array(''=>'');
	$rooms = array(''=>'');
	echo form_open('',$att);
	echo form_dropdown('room_insert_level_name',$levels,'','class="level_drop"');
	echo form_dropdown('room_insert_class_name',$classes,'','class="class_drop"');
	echo '<p>الفصل:'. form_input('room_insert_name','').'</p>';

	echo '<p>'.form_submit('submit','إضافة').'</p>';
	echo form_close();
	?>
</div>




<!-- modify_level_dialog to modify a level in the levels page -->
<div id="level_modify_dialog" title="تعديل المرحلة">
	<?php
	$level_modify_att = array('id'  => 'level_modify_id',
							  'name'=> 'level_modify_name');

	$level_hidden_past_name = array('id'  => 'hidden_past_level_id',
									'name'=> 'hidden_past_level_name',
									'style' => 'display:none;');

	$level_modify_cancel_att = array('id'      => 'level_modify_cancel_id',
									 'onClick' => '$(\'#level_modify_dialog\')
												   .dialog(\'close\');');

	$att = array('id' => 'modify_level_form');

	echo form_open('', $att);

	echo ' :اسم المرحلة ' . form_input($level_modify_att);

	echo form_input($level_hidden_past_name);

	echo form_submit('submit', 'تعديل');



	echo form_button($level_modify_cancel_att,'تراجع');

	echo form_close();
	?>
</div>

<!-- Modify Room form -->
<div id="room_modify_dialog" title="تعديل الفصل">
	<?php 
	$room_modify_cancel_att = array('id'      => 'room_modify_cancel_id',
 										  'onClick' => '$(\'#room_modify_dialog\')
											.dialog(\'close\');');
		$room_hidden_past_id = array('id'  => 'hidden_past_room_id',
		'name'=> 'hidden_past_room_name', 'style' => 'display:none;');
         echo '<p>'.'اسم  الفصل:'.'</p>';
         $att=array('id'=>'room_modify_form');
         $levels = $this->Mhome->get_levels();
         $classes = array(''=>'');
         $rooms = array(''=>'');
         echo form_open('',$att);
         echo '<p>المرحلة:'. form_dropdown('room_insert_level_name',$levels,'','class="level_drop"').'</p>';
         echo '<p>الصف:'. form_dropdown('room_insert_class_name',$classes,'','class="class_drop"').'</p>';
         echo '<p>الفصل:'. form_input('room_insert_name','').'</p>';
         echo form_input($room_hidden_past_id);

         echo form_button($room_modify_cancel_att,'تراجع');


         echo '<p>'.form_submit('submit','تعديل').'</p>';
         echo form_close();
         ?>
</div>
<!-- modify teacher dialog -->
<div id="teacher_modify_dialog" title="تعديل بيانات معلم">

	<?php 

			$teacher_hidden_past_id = array('id'  => 'hidden_past_teacher_id',
											'name'=> 'hidden_past_teacher_name',
											'style' => 'display:none;'
											);
			echo '<p>'.'تعديل بيانات معلم:'.'</p>';
			$att=array('id'=>'teacher_modify_form');
			echo form_open('',$att);

			echo form_input($teacher_hidden_past_id);
				
			echo '<p>'.form_submit('submit','تعديل').'</p>';
			echo form_close();



			?>

</div>

<!-- modify user dialog -->
<div id="user_modify_dialog" title="تعديل بيانات مستخدم">

	<?php 

			$user_hidden_past_id = array('id'  => 'hidden_past_user_id',
											'name'=> 'hidden_past_user_name',
											'style' => 'display:none;'
											);
			echo '<p>'.'تعديل بيانات مستخدم'.'</p>';
			$att=array('id'=>'user_modify_form');
			echo form_open('',$att);

			echo form_input($user_hidden_past_id);
				
			echo '<p>'.form_submit('submit','تعديل').'</p>';
			echo form_close();



			?>

</div>

<!-- modify student dialog -->
<div id="student_modify_dialog" title="تعديل بيانات طالب">

	<?php 

			$student_hidden_past_id = array('id'  => 'hidden_past_student_id',
											'name'=> 'hidden_past_student_name',
											'style' => 'display:none;'
											);
			echo '<p>'.'تعديل بيانات طالب'.'</p>';
			$att=array('id'=>'student_modify_form');
			echo form_open('',$att);

			echo form_input($student_hidden_past_id);
				
			echo '<p>'.form_submit('submit','تعديل').'</p>';
			echo form_close();



			?>

</div>

<!-- modify permission dialog -->
<div id="permission_modify_dialog" title="تعديل سماحيات مستخدم">

	<?php 

			$permission_hidden_past_id = array('id'  => 'hidden_past_permission_id',
											'name'=> 'hidden_past_permission_name',
											'style' => 'display:none;'
											);
			echo '<p>'.'تعديل سماحيات مستخدم:'.'</p>';
			$att=array('id'=>'permission_modify_form');
			$levels = $this->Mhome->get_levels();
			$users = $this->Mhome->get_users();
			$begin_para = array(''=>'');
			echo form_open('',$att);
			echo '<p>المرحلة:'. form_dropdown('permit_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('permit_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>الفصل:'. form_dropdown('permit_room',$begin_para ,'','class="room_drop"').'</p>';
			echo '<p>المادة:'. form_dropdown('permit_subject',$begin_para,'','class="subject_drop"').'</p>';
			echo '<p>اسم المستخدم:'. form_dropdown('permit_username',$users).'</p>';
			
				
			echo form_input($permission_hidden_past_id);
				
			echo '<p>'.form_submit('submit','تعديل').'</p>';
			echo form_close();



			?>

</div>

<!-- modify subject dialog -->
<div id="subject_modify_dialog" title="تعديل بيانات مادة">

	<?php 

			$subject_hidden_past_id = array('id'  => 'hidden_past_subject_id',
											'name'=> 'hidden_past_subject_name',
											'style' => 'display:none;'
											);
			echo '<p>'.'تعديل بيانات مادة:'.'</p>';
			$att=array('id'=>'subject_modify_form');
			$levels = $this->Mhome->get_levels();
			$begin_para = array(''=>'');
			echo form_open('',$att);
			echo '<p>المرحلة:'. form_dropdown('subject_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('subject_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>المادة:'. form_input('subject_name','').'</p>';
			
				
			echo form_input($subject_hidden_past_id);
				
			echo '<p>'.form_submit('submit','تعديل').'</p>';
			echo form_close();



			?>

</div>

<!-- modify test dialog -->
<div id="test_modify_dialog" title="تعديل بيانات معيار">

	<?php 

			$test_hidden_past_id = array('id'  => 'hidden_past_test_id',
											'name'=> 'hidden_past_test_name',
											'style' => 'display:none;'
											);
			echo '<p>'.'تعديل بيانات معيار:'.'</p>';
			$att=array('id'=>'test_modify_form');
			$levels = $this->Mhome->get_levels();
			$begin_para = array(''=>'');
			echo form_open('',$att);
			echo '<p>المرحلة:'. form_dropdown('test_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('test_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>المادة:'. form_dropdown('test_subject',$begin_para,'','class="subject_drop"').'</p>';
			echo '<p>المعيار:'. form_input('test_name','').'</p>';
			
				
			echo form_input($test_hidden_past_id);
				
			echo '<p>'.form_submit('submit','تعديل').'</p>';
			echo form_close();



			?>

</div>

<!-- modify skill dialog -->
<div id="skill_modify_dialog" title="تعديل بيانات معيار">

	<?php 

			$skill_hidden_past_id = array('id'  => 'hidden_past_skill_id',
											'name'=> 'hidden_past_skill_name',
											'style' => 'display:none;'
											);
			echo '<p>'.'تعديل بيانات معيار:'.'</p>';
			$att=array('id'=>'skill_modify_form');
			$levels = $this->Mhome->get_levels();
			$tests = $this-> Mhome -> get_tests();
			$begin_para = array(''=>'');
			echo form_open('',$att);
			echo form_input($skill_hidden_past_id);
			echo '<p>المرحلة:'. form_dropdown('skill_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('skill_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>المادة:'. form_dropdown('skill_subject',$begin_para,'','class="subject_drop"').'</p>';
			echo '<p>المعيار:'. form_dropdown('skill_test',$begin_para ,'','class="test_drop"').'</p>';
			echo '<p>المهارة:'. form_input('skill_name','').'</p>';
			echo '<p>أقل درجة:'. form_input('min_grade','').'</p>';
			echo '<p>أعلى درجة:'. form_input('max_grade','').'</p>';
			
				
			echo form_input($test_hidden_past_id);
				
			echo '<p>'.form_submit('submit','تعديل').'</p>';
			echo form_close();



			?>

</div>



<!-- modify assign dialog -->
<div id="assign_modify_dialog" title="تعديل إسناد المعلم">

	<?php 

			$assign_hidden_past_id = array('id'  => 'hidden_past_assign_id',
											'name'=> 'hidden_past_assign_name',
											'style' => 'display:none;'
											);
			echo '<p>'.'تعديل إسناد المعلم:'.'</p>';
			$att=array('id'=>'assign_modify_form');
			$levels = $this->Mhome->get_levels();
			$teachers = $this-> Mhome -> get_teachers();
			$begin_para = array(''=>'');
			echo form_open('',$att);
			echo '<p>المرحلة:'. form_dropdown('assign_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('assign_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>الفصل:'. form_dropdown('assign_room',$begin_para ,'','class="room_drop"').'</p>';
			echo '<p>المادة:'. form_dropdown('assign_subject',$begin_para,'','class="subject_drop"').'</p>';
			echo '<p>اسم المعلم:'. form_dropdown('assign_teacher',$teachers,'','class=""').'</p>';
			
				
			echo form_input($assign_hidden_past_id);
				
			echo '<p>'.form_submit('submit','تعديل').'</p>';
			echo form_close();



			?>

</div>

<!-- add skill form dialog-->
<div id="skill_add_dialog" title="إضافة مهارة">
	<?php 
	$test_hidden_id1 = array('id'  => 'hidden_test_id',
			'name'=> 'hidden_test_name'
	);

	echo '<p>'.'إضافة مهارة:'.'</p>';
	$att=array('id'=>'skill_add_form');
	echo form_open('',$att);
	echo form_input($test_hidden_id1);
	echo '<p>اسم المهارة:'. form_input('skill_name','').'</p>';
	echo '<p>أقل درجة:'. form_input('min_grade','').'</p>';
	echo '<p>أعلى درجة:'. form_input('max_grade','').'</p>';
	
	echo '<p>'.form_submit('submit','إضافة').'</p>';
	echo form_close();
	
	?>

</div>



</body>
</html>


    
 