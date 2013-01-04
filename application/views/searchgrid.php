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
<h1>Flexi Grid with custom forms</h1>
<div class="centerBox"><a href="<?php echo site_url("/flexigrid/");?>">About</a> | <a href="<?php echo site_url("/flexigrid/demo");?>">Grid Demo</a> | <a href="<?php echo site_url("/flexigrid/search");?>">Search Demo</a> | <a href="<?php echo site_url("/flexigrid/example");?>">Documentation</a> | <a href="http://flexigrid.eyeviewdesign.com/<?php echo $download_file;?>">Download</a></div>

<p>This is a sample implementation attached to a form, to add additional parameters. Used for search</p>
<p>Values passed to the post request to ajax.php controller <br/> That is Value of $_POST array is <br/>array("page"=>"1","rp"=>"15","sortname"=>"id","sortorder"=>"asc","query"=>"","qtype"=>"id","val1"=>"","val2"=>"3","val3"=>"2";}</p>
<p>
<table class="wikitable"><tbody><tr><td style="border: 1px solid #ccc; padding: 5px;"> <strong>Parameter</strong>  </td><td style="border: 1px solid #ccc; padding: 5px;"> <strong>Description</strong> </td></tr> <tr><td style="border: 1px solid #ccc; padding: 5px;"> page </td><td style="border: 1px solid #ccc; padding: 5px;"> Current page number. </td></tr> <tr><td style="border: 1px solid #ccc; padding: 5px;"> sortname </td><td style="border: 1px solid #ccc; padding: 5px;">The name of the column to sort by. </td></tr> <tr><td style="border: 1px solid #ccc; padding: 5px;">sortorder </td><td style="border: 1px solid #ccc; padding: 5px;"> The order to sort by &ndash; 'asc' or 'desc'. </td></tr> <tr><td style="border: 1px solid #ccc; padding: 5px;">qtype </td><td style="border: 1px solid #ccc; padding: 5px;"> The column selected during 'quick search'. </td></tr> <tr><td style="border: 1px solid #ccc; padding: 5px;">query </td><td style="border: 1px solid #ccc; padding: 5px;"> The text used within a search. </td></tr> <tr><td style="border: 1px solid #ccc; padding: 5px;">rp </td><td style="border: 1px solid #ccc; padding: 5px;"> The number of records to be returned. </td></tr> </tbody></table>
</p>
<p>
val1,val2,val3 are the values passed from the attached form when the submit button is pressed. By using this custom form we can pass values to server. By using this we can build custom search forms other than the quick search built in with flexigrid.
</p>
<fieldset>
	<legend>Form Passing Different Values</legend>
<form id="sform">
	<p>
	The values you entered will be place in name column for demo's sake.<br />
	Value 1 : <input type="text" name="val1" value="" autocomplete="off" /><br />
    Value 2 : Is a hidden input with value 3<input type="hidden" name="val2" value="3" /><br />
    Value 3 : 
    <select name="val3">
    	<option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="4">Four</option>
        <option value="5">Five</option>
    </select><br />
    Value 4 : <input type="checkbox" name="val4" id="val4" value="4" /><label for="val4">This will pass a value 4 if checked</label>
    </p>
    <p>
	    <input type="submit" value="Submit" />
    </p>
</form>

</fieldset>
<fieldset>
	<legend>Custom Search Form</legend>
	<form id="nform">
		Search Name : <input type="text" name="nsearch" id="nsearch" value="" autocomplete="off"/><input type="submit" value="Search" />
	</form>
</fieldset>
<table id="flex1" style="display:none"></table>
<p>
- To work with custom queries you need to build additional library functions or additional functions in the controller and model based on the values passed into the controller. For single search just change the value of qtype and query before submit.
</p>
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
					   url: "<?php site_url("/ajax/deletec");?>",
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

//This function adds paramaters to the post of flexigrid. You can add a verification as well by return to false if you don't want flexigrid to submit			
function addFormData(){
	//passing a form object to serializeArray will get the valid data from all the objects, but, if the you pass a non-form object, you have to specify the input elements that the data will come from
	var dt = $('#sform').serializeArray();
	$("#flex1").flexOptions({params: dt});
	//$('#flex1').flexOptions({params:[{name:'param1', value: 'val1'}, {name:'param2', value: 'val2'}]});
	return true;
}
	
$('#sform').submit(function (){
    var dt = $('#sform').serializeArray();
	$("#flex1").flexOptions({params: dt});
	$('#flex1').flexOptions({newp: 1}).flexReload();
	return false;
});
$('#nform').submit(function (){
    var dt = $('#nform').serializeArray();
    var qr = $('#nsearch').val();
	$("#flex1").flexOptions({params: dt});
	$('#flex1').flexOptions({url: "<?php echo base_url(); ?>/index.php/ajax/search"});
	$('#flex1').flexOptions({qtype:"name"});
	$('#flex1').flexOptions({query: qr});
	$('#flex1').flexOptions({newp: 1}).flexReload();
	return false;
});

</script>
</body>
</html>