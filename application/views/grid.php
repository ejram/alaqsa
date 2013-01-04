<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Flexigrid Implemented in CodeIgniter</title>
<link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/css/flexigrid.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/flexigrid.js"></script>
</head>
<body>
<h1>Flexi Grid Implementation</h1>
<div class="centerBox"><a href="<?php echo site_url("/flexigrid/");?>">About</a> | <a href="<?php echo site_url("/flexigrid/demo");?>">Grid Demo</a> | <a href="<?php echo site_url("/flexigrid/search");?>">Search Demo</a> | <a href="<?php echo site_url("/flexigrid/example");?>">Documentation</a> | <a href="http://flexigrid.eyeviewdesign.com/<?php echo $download_file;?>">Download</a></div>
<div class="egBox">
<table id="flex1" style="display:none"></table>
</div>
<script type="text/javascript">
<?php echo $js_grid; ?>
function test(com,grid)
{
    if (com=='Select All')
    {
		$('.bDiv tbody tr',grid).addClass('trSelected');
    }
    
    if (com=='DeSelect All')
    {
		$('.bDiv tbody tr',grid).removeClass('trSelected');
    }
    
    if (com=='Delete')
        {
           if($('.trSelected',grid).length>0){
			   if(confirm('Delete ' + $('.trSelected',grid).length + ' items?')){
		            var items = $('.trSelected',grid);
		            var itemlist ='';
		        	for(i=0;i<items.length;i++){
						itemlist+= items[i].id.substr(3)+",";
					}
					$.ajax({
					   type: "POST",
					   url: "<?php echo site_url("/ajax/deletec");?>",
					   data: "items="+itemlist,
					   success: function(data){
					   	$('#flex1').flexReload();
					  	alert(data);
					   }
					});
				}
			} else {
				return false;
			} 
        }          
}
</script>
</body>
</html>