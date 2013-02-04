<?php $doc = new DomDocument; ?>
<!doctype html>

<html lang="en" dir="rtl">
<head>
<meta charset="UTF-8" />
<title>Alaqsa Project!</title>
<link rel="stylesheet"
	href="<?= base_url(); ?>css/jquery-ui/css/theme/jquery-ui-1.10.0.custom.min.css"
	type="text/css" />
<link rel="stylesheet" href="<?= base_url(); ?>css/home_style.css"
	type="text/css" />
<script src="<?= base_url();?>js/jquery.js"></script>
<script src="<?= base_url();?>js/home.js"></script>
<script src="<?= base_url();?>css/jquery-ui/js/jquery-ui-1.10.0.custom.min.js"></script>

</head>
<body>
	<div id="navdiv">
		<ul id="nav">
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
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_levels"> المراحل </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_permissions"> إدارة السماحيات </a>
			</li>			
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_classes"> الصفوف </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_rooms"> الفصول </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_teachers"> المعلمين </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_subjects"> المواد </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_assign"> الإسناد </a>
			</li>			
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_students"> الطلاب </a>
			</li>				
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_tests"> المعايير </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_skills"> المهارات </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_users"> المستخدمين </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_reports"> التقارير </a>
			</li>
			<?php 
			break;
					case 'user':	?>
			
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_tests"> المعايير </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_skills"> المهارات </a>
			</li>
			<li><a href="<?= base_url(); ?>Home/c_panel/aq_marks"> الدرجات </a>
			</li>
				<?php
				break;
					
			} ?>
		
		</ul>
	</div>