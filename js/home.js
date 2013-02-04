//Main document ready
$(document).ready(function()
		{
	put_classes();
	put_rooms();
	$('.level_drop').change(function()
			{
		$.post("http://localhost/alaqsa/Home/" + 'level_classes',
				{'level_name':$('.level_drop').val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.class_drop').empty();
					$('<option/>').val('').html('اختر الصف').appendTo('.class_drop');
					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.class_drop');
					}

				})
				.fail(function(){
					$('.class_drop').empty();


				});

		$.post("http://localhost/alaqsa/Home/" + 'class_rooms',
				{'class_name':$('.class_drop').val(),'level_name':$('.level_drop').val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.room_drop').empty();

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.room_drop');
					}

				})
				.fail(function(data){
					$('.room_drop').empty();

				});

			});    
	$('.class_drop').change(function()
			{

		$.post("http://localhost/alaqsa/Home/" + 'class_rooms',
				{'class_name':$('.class_drop').val(),'level_name':$('.level_drop').val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.room_drop').empty();

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.room_drop');
					}

				})
				.fail(function(data){
					$('.room_drop').empty();

				});

			}); 
	Dialogload('#class_delete_dialog','.delete',400,'delete_input_id');

	Dialogload('#class_delete_dialog','.delete_level_button',400,'delete_input_id');

	form_submit('#level_insert_form','level_insert');
	form_submit('#table_form','del_class');

	form_submit('#class_insert_form','ins_class');

	form_submit('#room_insert_form','ins_room');

	form_submit('#modify_class_form','modify_class');
	form_submit('#modify_level_form','modify_level');
	form_submit('#room_modify_form','modify_room');
	form_submit('#teacher_insert_form','teacher_insert');
	form_submit('#subject_insert_form','subject_insert');
	form_submit('#test_insert_form','test_insert');
	form_submit('#skill_insert_form','skill_insert');
	form_submit('#user_insert_form','user_insert');
	form_submit('#student_insert_form','student_insert');
	form_submit('#report_insert_form','report_insert');
	form_submit('#permission_search_form','permission_search');
	form_submit('#assign_insert_form','assign_insert');
	$('#permission_insert_form').submit(function()
			{
		$.post("http://localhost/alaqsa/Home/" + 'permission_insert',
				$('#permission_insert_form').serialize(),
				function(data){
			alert(data);
		});
		return false;
			})



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



//Open dialog function
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
			window.location.reload(true);
		});
		return false;
			})

}


function put_classes(){
	$.post("http://localhost/alaqsa/Home/" + 'level_classes',
			{'level_name':$('.level_drop').val()})
			.done(function(data){
				obj=JSON.parse(data);
				$('.class_drop').empty();

				for (i=0;i<obj.length;i++){
					$('<option/>').val(obj[i]).html(obj[i]).appendTo('.class_drop');
				}

			})
			.fail(function(){
				$('.class_drop').empty();


			});



}
function put_rooms(){
	$.post("http://localhost/alaqsa/Home/" + 'class_rooms',
			{'class_name':$('.class_drop').val(),'level_name':$('.level_drop').val()})
			.done(function(data){
				obj=JSON.parse(data);

				for (i=0;i<obj.length;i++){
					$('<option/>').val(obj[i]).html(obj[i]).appendTo('.room_drop');
				}

			})
			.fail(function(data){
				$('.room_drop').empty();

			});

}


