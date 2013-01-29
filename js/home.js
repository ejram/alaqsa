//Main document ready
$(document).ready(function()
{

    Dialogload('#class_delete_dialog','.delete',400,'delete_input_id');
    
    Dialogload('#class_delete_dialog','.delete_level_button',400,'delete_input_id');
    
    
    form_submit('#table_form','del_class');
    
    form_submit('#class_insert_form','ins_class');
    
    form_submit('#room_insert_form','ins_room');
    
    form_submit('#modify_class_form','modify_class');
    form_submit('#modify_level_form','modify_level');
    form_submit('#modify_room_form','modify_room');
    
    
    
    //open dialog for adding class.
    $( '#add_class_dialog' ).dialog( {autoOpen: false, draggable: false,
        							  modal: true, resizable: false,
        							  show: { effect: 'drop', direction: "up" } ,
        							  width: 400 
    });

    $('.add_class_button').click(function(){ 
    		$('#add_class_dialog').dialog('open');
    		return false;
    });
    
    //open dialog for adding room.
    $( '#room_insert_dialog' ).dialog( {autoOpen: false, draggable: false,
        							  modal: true, resizable: false,
        							  show: { effect: 'drop', direction: "up" } ,
        							  width: 600 
    });

    $('.insert_room_button').click(function(){ 
    		$('#room_insert_dialog').dialog('open');
    		return false;
    });
    
    
    
    //open dialog to modify a class.
    $('#class_modify_dialog').dialog( { autoOpen: false, draggable: false,
        								modal: true, resizable: false,
        								show: { effect: 'drop', direction: "up" } ,
        								width: 400 } );
    $('.modify_class').click(function(){    	

    	document.getElementById('hidden_past_class_id').value=this.id;
  	
    	$('#class_modify_dialog').dialog('open');
    	return false;
    }); 
    

    //open dialog to modify a class.
    $('#room_modify_dialog').dialog( { autoOpen: false, draggable: false,
        								modal: true, resizable: false,
        								show: { effect: 'drop', direction: "up" } ,
        								width: 400 } );
    $('.modify_room').click(function(){    	

    	document.getElementById('hidden_past_room_id').value=this.id;
  	
    	$('#room_modify_dialog').dialog('open');
    	return false;
    }); 
    
    //open dialog to modify a level.
    $('#level_modify_dialog').dialog( { autoOpen: false, draggable: false,
        								modal: true, resizable: false,
        								show: { effect: 'drop', direction: "up" } ,
        								width: 400 } );
    $('.modify_level_button').click(function(){    	

    	document.getElementById('hidden_past_level_id').value=this.id;
  	
    	$('#level_modify_dialog').dialog('open');
    	return false;
    });
    
    
    //open dialog to insert a new room.
    $('#room_insert_dialog').dialog({autoOpen: false, draggable: false,
									 modal: true, resizable: false,
									 show: { effect: 'drop', direction: "up" } ,
									 width: 400 } );
    $('.insert_room').click(function(){    	
    	document.getElementById('hidden_past_class_id').value=this.id;
    	$('#class_modify_dialog').dialog('open');
    	return false;
    });    
    
});



// Open dialog function
	function Dialogload(dest,butt,Dwidth,hidden_element)
{
		$( dest ).dialog( { autoOpen: false, draggable: false,
                        	modal: true, resizable: false,
                        	show: { effect: 'drop', direction: "up" } ,
                        	width: Dwidth } );

		$(butt).click(function(){
			var element=document.getElementById(hidden_element);
			element.value=this.id;   
			$(dest).dialog('open');
			return false;
		});
}
	function form_submit(submit_form,submit_dest)
{
    
		$(submit_form).submit(function()
				{
			$.post("http://localhost/alaqsa/Home/" + submit_dest,
					$(submit_form).serialize(),
					function(data){
				document.location.replace("http://localhost/alaqsa");
			});
			return false;
				})
    
}
	function drop_change(dest_ctrl,drop_button)
	{
		
		$(drop_button).change(function()
				{
			$.post("http://localhost/alaqsa/Home/" + dest_ctrl,
			this.value	
			);
			
				});
		
		
	}
	