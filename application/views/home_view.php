<!doctype html>
 
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title>Alaqsa Project!</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src= "js/home.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
</head>
<body>
<div id="nav">
<ul>
<li><a href="#">الصفوف</a></li>
<li><a href="#">الفصول</a></li>
<li><a href="#">المعايير</a></li>
<li><a href="#">المهارات</a></li>
</ul>
</div>
<div id="content">
 <? $this->home_controller->Print_table('aq_classes'); ?>


</div>
<div id="footer">
Footer
</div>

<div id="dialog" title= "" >
<?
$att=array('id'=>'conf_dialog');
echo form_open('home_controller/del_query',$att );
echo form_input('name');
echo form_close();
?>
</div>
</body>
</html>

