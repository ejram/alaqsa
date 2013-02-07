//Main document ready
$(document).ready(function()
		{
	$('<option/>').val('').html('اختر المرحلة').prependTo('.level_drop');

	put_classes();
	put_rooms();
	$('.subject_drop').empty();
	$('.test_drop').empty();

	$('<option/>').val('').html('اختر المادة').prependTo('.subject_drop');



	$('#levelsdiv input').click(function(){
		if($(this).is(':checked'))
		{
			Level_Name=$(this).val();
			$.post("http://localhost/alaqsa/Home/" + 'level_classes',
					{'level_name':Level_Name})
					.done(function(data){
						obj=JSON.parse(data);
						$("<ul class='"+Level_Name+"'></ul>").appendTo('#classesdiv');

						for (i=0;i<obj.length;i++){
							$("<li class='class_option'><input type='checkbox' value='"+obj[i]+"' >"+ obj[i] +"</input></li>").appendTo('.'+Level_Name);
						}

					})
					.fail(function(){
						$('.'+Level_Name).remove();


					});
		}
		else{
			$('.'+Level_Name).remove();
			$('.'+)
	
		}

	});
	$('#classesdiv input').click(function(){
		if($(this).is(':checked'))
		{
			Level_Name=$(this).val();
			$.post("http://localhost/alaqsa/Home/" + 'level_classes',
					{'level_name':Level_Name})
					.done(function(data){
						obj=JSON.parse(data);
						$("<ul class='"+Level_Name+"'></ul>").appendTo('#classesdiv');

						for (i=0;i<obj.length;i++){
							$("<li class='class_option'><input type='checkbox' value='"+obj[i]+"' >"+ obj[i] +"</input></li>").appendTo('.'+Level_Name);
						}

					})
					.fail(function(){
						$('.'+Level_Name).remove();


					});
		}
		else{
			$('.'+Level_Name).remove();
	
		}

	});


	$('.level_drop').change(function()
			{
		Level_Name=$(this).val();
		$.post("http://localhost/alaqsa/Home/" + 'level_classes',
				{'level_name':Level_Name})
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
		Class_Name = $('.class_drop').val();
		$.post("http://localhost/alaqsa/Home/" + 'class_rooms',
				{'class_name':Class_Name,'level_name':Level_Name})
				.done(function(data){
					obj=JSON.parse(data);
					$('.room_drop').empty();
					$('<option/>').val('').html('اختر الفصل').appendTo('.room_drop');

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
		Class_Name = $(this).val();
		$.post("http://localhost/alaqsa/Home/" + 'class_rooms',
				{'class_name':Class_Name,'level_name':Level_Name})
				.done(function(data){
					obj=JSON.parse(data);
					$('.room_drop').empty();

					$('<option/>').val('').html('اختر الفصل').appendTo('.room_drop');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.room_drop');
					}

				})
				.fail(function(data){
					$('.room_drop').empty();

				});

		$.post("http://localhost/alaqsa/Home/" + 'class_subjects',
				{'class_name':Class_Name,'level_name':Level_Name})
				.done(function(data){
					obj=JSON.parse(data);
					$('.subject_drop').empty();

					$('<option/>').val('').html('اختر المادة').appendTo('.subject_drop');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.subject_drop');
					}

				})
				.fail(function(data){
					$('.subject_drop').empty();

				});

		$.post("http://localhost/alaqsa/Home/" + 'class_tests',
				{'class_name':Class_Name,'level_name':Level_Name , 'subject_name':$('.subject_drop').val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.test_drop').empty();

					$('<option/>').val('').html('اختر المادة').appendTo('.test_drop');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.test_drop');
					}

				})
				.fail(function(data){
					$('.test_drop').empty();

				});

			});

	$('.subject_drop').change(function()
			{

		$.post("http://localhost/alaqsa/Home/" + 'class_tests',
				{'class_name':Class_Name,'level_name':Level_Name , 'subject_name':$(this).val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.test_drop').empty();

					$('<option/>').val('').html('اختر المادة').appendTo('.test_drop');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.test_drop');
					}

				})
				.fail(function(data){
					$('.test_drop').empty();

				});


			});

	$('.test_drop').change(function()
			{

		$.post("http://localhost/alaqsa/Home/" + 'test_skills',
				{'class_name':Class_Name,'level_name':Level_Name ,
			'subject_name':$('.subject_drop').val(),
			'test_name': $(this).val()
				})
				.done(function(data){
					obj=JSON.parse(data);
					$('.skill_drop').empty();

					$('<option/>').val('').html('اختر المادة').appendTo('.skill_drop');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.skill_drop');
					}

				})
				.fail(function(data){
					$('.skill_drop').empty();

				});


			});


	Dialogload('#class_delete_dialog','.delete',400,'delete_input_id');
	Dialogload('#class_delete_dialog','.delete_level_button',400,'delete_input_id');
	Dialogload('#permission_modify_dialog','.modify_permission',400,'hidden_past_permission_id');
	Dialogload('#subject_modify_dialog','.modify_subject',400,'hidden_past_subject_id');
	Dialogload('#assign_modify_dialog','.modify_assign',400,'hidden_past_assign_id');
	Dialogload('#test_modify_dialog','.modify_test',400,'hidden_past_test_id');
	Dialogload('#skill_modify_dialog','.modify_skill',400,'hidden_past_skill_id');
	Dialogload('#skill_add_dialog','.add_skill',400,'hidden_test_id');


	var teacher_array = ['اسم المعلم','رقم الهوية','مكان الميلاد','تاريخ الميلاد','التخصص','تاريخ التخرج','المؤهل الدراسي','اسم الجامعة','الجنسية','إيميل المعلم','جوال المعلم'];	
	var user_array = ['اسم المستخدم','اسم الدخول للمستخدم','كلمة السر','البريد الإلكتروني','الهاتف','مسمى الوظيفة'];

	Dialogload('#teacher_modify_dialog','.modify_teacher',400,'hidden_past_teacher_id');
	Dialogload('#user_modify_dialog','.modify_user',400,'hidden_past_user_id');

	$('.modify_teacher').click(function(){
		$.post("http://localhost/alaqsa/Home/get_teacher",
				{teacher_id:this.id},		
				function(data){
					var jsonStr = JSON.stringify(data);
					jsonStr = jsonStr.replace('[','');
					jsonStr = jsonStr.replace(']','');
					var Obj = jQuery.parseJSON(jsonStr);
					delete Obj['teacher_id'];
					$('.teacher_class').remove();
					var j=0;
					$.each( Obj, function( key, value ) {

						$('#teacher_modify_form').append("<label class='teacher_class'>"+ teacher_array[j] + "</label>");
						$('#teacher_modify_form').append("<input class='teacher_class' type=text name=" + key +" value=" + value + " />");	
						j++;	
					});
				},"json");		
	});

	$('.modify_user').click(function(){
		$.post("http://localhost/alaqsa/Home/get_user",
				{user_id:this.id},		
				function(data){
					var jsonStr = JSON.stringify(data);
					jsonStr = jsonStr.replace('[','');
					jsonStr = jsonStr.replace(']','');
					var Obj = jQuery.parseJSON(jsonStr);
					delete Obj['user_id'];
					$('.user_class').remove();
					var j=0;
					$.each( Obj, function( key, value ) {

						$('#user_modify_form').append("<label class='user_class'>"+ user_array[j] + "</label>");
						$('#user_modify_form').append("<input class='user_class' type=text name=" + key +" value=" + value + " />");	
						j++;	
					});
				},"json");		
	});




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
	form_submit('#mark_insert_form','mark_insert');
	form_submit('#teacher_modify_form','modify_teacher');
	form_submit('#user_modify_form','modify_user');
	form_submit('#permission_modify_form','modify_permission');
	form_submit('#subject_modify_form','modify_subject');
	form_submit('#assign_modify_form','modify_assign');
	form_submit('#test_modify_form','modify_test');
	form_submit('#skill_modify_form','modify_skill');
	form_submit('#skill_add_form','add_skill');




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
				$('<option/>').val('').html('اختر الصف').appendTo('.class_drop');

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
				$('.room_drop').empty();
				$('<option/>').val('').html('اختر الفصل').appendTo('.room_drop');

				for (i=0;i<obj.length;i++){
					$('<option/>').val(obj[i]).html(obj[i]).appendTo('.room_drop');
				}

			})
			.fail(function(data){
				$('.room_drop').empty();

			});

}


function updateTextArea() {         
	$('#levelsdiv :checked').each(function() {
		Level_Name=$(this).val();
		$.post("http://localhost/alaqsa/Home/" + 'level_classes',
				{'level_name':Level_Name})
				.done(function(data){
					obj=JSON.parse(data);
					$('.class_ul').remove();
					$("<ul class='class_ul'></ul>").appendTo('#classesdiv');

					for (i=0;i<obj.length;i++){
						$("<li class='class_option'><input type='checkbox' value='"+obj[i]+"' >"+ obj[i] +"</input></li>").appendTo('.class_ul');
					}

				})
				.fail(function(){
					$('.class_ul').remove();


				});	     });
}