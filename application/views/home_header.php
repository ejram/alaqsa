<? $doc = new DomDocument; ?>
<!doctype html>
 
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title>Alaqsa Project!</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>css/home_style.css" type="text/css"/>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src= "<?= base_url();?>js/home.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

</head>
<body>
<div id="navdiv">
<ul id="nav">
<li><a href="<?= base_url(); ?> ">الرئيسية</a></li>
<li><a href="<?= base_url(); ?> home_controller/home/aq_levels" >  المراحل    </a></li>
<li><a href="<?= base_url(); ?> home_controller/home/aq_classes" > الصفوف     </a></li>
<li><a href="<?= base_url(); ?> home_controller/home/aq_rooms" >   الفصول     </a></li>
<li><a href="<?= base_url(); ?> home_controller/home/aq_tests" >   المعايير   </a></li>
<li><a href="<?= base_url(); ?> home_controller/home/aq_skills" >  المهارات   </a></li>
<li><a href="<?= base_url(); ?> home_controller/home/aq_users" >   المستخدمين </a></li>
</ul>
</div>