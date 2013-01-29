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
			'onClick'=>'$(\'#class_delete_dialog\').dialog(\'close\');');

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

	echo '<p>المرحلة: '. form_dropdown('class_level_modify_name',$levels).'</p>';

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
	echo '<p>المرحلة:'. form_dropdown('aqsa_level2',$levels).'</p>';
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
	$classes = $this->Mhome->get_classes();
	echo form_open('',$att);
	echo '<p>المرحلة:'. form_dropdown('room_insert_level_name',$levels).'</p>';
	echo '<p>الصف:'. form_dropdown('room_insert_class_name',$classes).'</p>';
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
		'name'=> 'hidden_past_room_id');
         echo '<p>'.'اسم  الفصل:'.'</p>';
         $att=array('id'=>'room_modify_form');
         $levels = $this->Mhome->get_levels();
         $classes = $this->Mhome->get_classes();
         echo form_open('',$att);
         echo '<p>المرحلة:'. form_dropdown('room_insert_level_name',$levels).'</p>';
         echo '<p>الصف:'. form_dropdown('room_insert_class_name',$classes).'</p>';
         echo '<p>الفصل:'. form_input('room_insert_name','').'</p>';
         echo form_input($room_hidden_past_id);

         echo form_button($room_modify_cancel_att,'تراجع');


         echo '<p>'.form_submit('submit','تعديل').'</p>';
         echo form_close();
         ?>
</div>
<!-- Add teacher form -->
<div id = "teacher_add_dialog" title="إضافة معلم">

<?php 
$room_modify_cancel_att = array('id'      => 'room_modify_cancel_id',
		'onClick' => '$(\'#room_modify_dialog\')
											.dialog(\'close\');');


?>

</div>
</body>
</html>


