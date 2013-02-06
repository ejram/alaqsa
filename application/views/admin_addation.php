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
			$begin_para = array(''=>'');
			echo form_open('',$att);
			echo '<p>المرحلة:'. form_dropdown('permit_level',$levels ,'','class="level_drop"').'</p>';
			echo '<p>الصف:'. form_dropdown('permit_class',$begin_para ,'','class="class_drop"').'</p>';
			echo '<p>الفصل:'. form_dropdown('permit_room',$begin_para ,'','class="room_drop"').'</p>';
			echo '<p>المادة:'. form_dropdown('permit_subject',$begin_para,'','class="subject_drop"').'</p>';
			echo '<p>اسم المستخدم:'. form_input('permit_username','').'</p>';
			
				
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


</body>
</html>


