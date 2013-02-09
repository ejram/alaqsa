<!doctype html>
<html lang='ar' dir='rtl'>
<head>
    
<meta charset='UTF-8' />
    <title>Alaqsa </title>

<link rel="stylesheet"
	href="<?= base_url(); ?>css/home_style.css" type="text/css" />

  
</head>
<body dir='rtl'>

<?php 
if($report_data['mark_room']=='all')
{
	unset($report_data['mark_room']);	
}
if($report_data['mark_subject']=='all')
{
	unset($report_data['mark_subject']);
}
if($report_data['mark_test']=='all')
{
	unset($report_data['mark_test']);
}
if($report_data['mark_skill']=='all')
{
	unset($report_data['mark_skill']);
}
if($report_data['mark_class']=='all')
{
	unset($report_data['mark_class']);
}
if($report_data['mark_student']=='all')
{
	unset($report_data['mark_student']);
}
$marks = $this->Mhome->get_where('aq_marks',$report_data);

$att = array('id' => 'table_form');
$tmpl = array ( 'table_open'  => '<table class = "mytable"
				cellpadding = "8" cellspacing = "3" align="center">'
);
$this->table->set_template($tmpl);
$this->table->set_heading('اسم الطالب','المادة','المعيار','المهارة','العلامة'
);
foreach($marks->result() as $row)
{
	$mark_st=$this->Mhome->get_where('aq_students',
			array('st_id'=>$row->mark_student
			));
	foreach($mark_st->result() as $mark_student)
	{
		$this->table->add_row($mark_student->st_fna . ' ' . $mark_student->st_ffna . ' ' . $mark_student->st_lna,
				$row->mark_subject,$row->mark_test,$row->mark_skill,$row->mark_value

		);
	}
}
echo $this->table->generate();







?>
</body></html>