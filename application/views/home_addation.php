 <!-- class_delete_dialog to delete class in the classes page -->
 <div id="class_delete_dialog" title= "حذف صف" >
 <? $att=array('id'=>'delete_class_form');
echo form_open('',$att);
echo '<p>' .'هل أنت متأكد من حذف الصف:'.'<span id = \'class_span\'</span></p>';
$delete_att=array('id'=>'delete_input_id',
                  'name'=>'delete_input');
echo form_input($delete_att);
echo form_submit('submit','موافق');
$cancel_att=array('id'=>'cancel_id','name'=>'cancel_button','onClick'=>'$(\'#class_delete_dialog\').dialog(\'close\');');
echo form_button($cancel_att,'تراجع');
echo form_close(); 
?>
</div>

<!-- room_insert_dialog to insert room in the classes page -->

 <div id="room_insert_dialog" title= "إضافة فصل" >
<? 
$att=array('id'=>'room_insert_form');
echo form_open('',$att);
$room_input_att=array('id'=>'room_insert_id','name'=>'room_insert_name');
$room_hidden_att=array('id'=>'room_hidden_input_id','name'=>'room_hidden_input_name');
echo form_input($room_hidden_att);
echo "اسم الفصل: ";
echo form_input($room_input_att);
echo form_submit('submit','إضافة');
$cancel_att=array('id'=>'cancel_id','name'=>'cancel_button','onClick'=>'$(\'#room_insert_dialog\').dialog(\'close\');');
echo form_button($cancel_att,'تراجع');
echo form_close(); 
?>
</div>

<!-- modify_class_dialog to modify a class in the classes page -->
<div id="class_modify_dialog" title="تعديل الصف">
<?
$att=array('id'=>'modify_class_form');
echo form_open('',$att);
$class_modify_input_att=array('id'=>'class_modify_input_id','name'=>'class_modify_input_name');
$class_level_modify_input_att=array('id'=>'class_level_modify_id','name'=>'class_level_modify_name');
echo ' :اسم الصف'. form_input($class_modify_input_att);
echo ' :اسم المرحلة'.form_input($class_level_modify_input_att);
echo form_submit('submit','تعديل');
$class_modify_cancel_att=array('id'=>'class_modify_cancel_id','onClick'=>'$(\'#class_modify_dialog\').dialog(\'close\');');
echo form_button($class_modify_cancel_att,'تراجع');
echo form_close(); 
?>
</div>

</body>
</html>


