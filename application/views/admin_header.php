<!doctype html>
<html lang="ar" dir="rtl">
<head>

<meta charset="UTF-8" />
<title>Alaqsa</title>
<script language="javascript" type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript"
	src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<script>
$(function() {
   $( "#room_add_form" ).validate();
});
</script>
<link rel="stylesheet" href="<?= base_url(); ?>css/style.css"
	type="text/css" />
<!--[if IE 6]><link rel="stylesheet" href="<?= base_url(); ?>css/style.ie6.css" type="text/css"  /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?= base_url(); ?>css/style.ie7.css" type="text/css"  /><![endif]-->
<script type="text/javascript" src="<?= base_url(); ?>css/script.js"></script>
<script
	src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<link rel="stylesheet"
	href="<?= base_url(); ?>css/jquery-ui/css/theme/jquery-ui-1.10.0.custom.min.css"
	type="text/css" />
<link rel="stylesheet" href="<?= base_url(); ?>css/home_style.css"
	type="text/css" />

<script src="<?= base_url();?>js/jquery.js"></script>
<script language="javascript" type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script src="<?= base_url();?>js/home.js"></script>
<script src="<?= base_url();?>js/report.js"></script>
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
							echo ' السيد:'.$this->session->userdata('user_name');
							echo '<br /><a href='.base_url().'home/do_logout>تسجيل الخروج</a>';
							echo '</div>';

							$user_role=$this->session->userdata('user_role');

							switch($user_role)
							{
								case 'admin':
									?>
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_users"><span
									class="l"></span><span class="r"></span><span class="t">
										المستخدمين </span> </a>
							</li>
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_permissions"> <span
									class="l"></span><span class="r"></span><span class="t">إدارة
										السماحيات</span>
							</a>
							</li>							
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_levels"> <span
									class="l"></span><span class="r"></span><span class="t">المراحل</span>
							</a>
							</li>

							<li><a href="<?= base_url(); ?>Home/c_panel/aq_classes"><span
									class="l"></span><span class="r"></span><span class="t"> الصفوف</span>
							</a>
							</li>
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_rooms"><span
									class="l"></span><span class="r"></span><span class="t"> الفصول</span>
							</a>
							</li>
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_teachers"><span
									class="l"></span><span class="r"></span><span class="t">
										المعلمين </span> </a>
							</li>

							<li><a href="<?= base_url(); ?>Home/c_panel/aq_assign"><span
									class="l"></span><span class="r"></span><span class="t">
										الإسناد </span> </a>
							</li>
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_students"><span
									class="l"></span><span class="r"></span><span class="t"> الطلاب
								</span> </a>
							</li>
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_subjects"><span
									class="l"></span><span class="r"></span><span class="t"> المواد
								</span> </a>
							</li>							
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_tests"><span
									class="l"></span><span class="r"></span><span class="t">
										المعايير </span> </a>
							</li>
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_skills"><span
									class="l"></span><span class="r"></span><span class="t">
										المهارات </span> </a>
							</li>

							<li><a href="<?= base_url(); ?>Home/c_panel/aq_reports"><span
									class="l"></span><span class="r"></span><span class="t">
										التقارير</span> </a>
							</li>
							<?php 
							break;
					case 'user':	?>

							<li><a href="<?= base_url(); ?>Home/c_panel/aq_tests"><span
									class="l"></span><span class="r"></span><span class="t">
										المعايير </span> </a>
							</li>
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_skills"><span
									class="l"></span><span class="r"></span><span class="t">
										المهارات </span> </a>
							</li>
							<li><a href="<?= base_url(); ?>Home/c_panel/aq_marks"><span
									class="l"></span><span class="r"></span><span class="t">
										الدرجات </span> </a>
							</li>
							<?php
				break;
					
			} ?>

						</ul>
					</div>