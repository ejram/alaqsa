//Main document ready
$(document).ready(function()
		{
	$('.datep').datepicker({ dateFormat: 'yy-mm-dd' });
	$('<option/>').val('').html('اختر المرحلة').prependTo('.level_drop_permit');
	$('<option/>').val('').html('اختر المرحلة').prependTo('.level_drop');
	$('.level_drop').val('').attr('selected',0);
	$('.level_drop_permit').val('').attr('selected',0);
	$(function() {
		   $( "#room_add_form" ).validate();
		});			
			
			
			

	put_classes();
	put_rooms();
	$('.subject_drop').empty();
	$('.test_drop').empty();

	$('<option/>').val('').html('اختر المادة').prependTo('.subject_drop');
	$("input:checkbox[value='all']").click(function(){
			if($(this).is(':checked'))
				$("input:checkbox:not([value='all'])").prop('checked', true);
				else
					$("input:checkbox:not([value='all'])").prop('checked', false);

				
				
	});

/*
	$('#levelsdiv input').click(function(){
		var Level_name=$(this).val();
		if($(this).is(':checked'))
		{			
			$.post("http://localhost/alaqsa/Home/get_level",
					{level_name:$(this).val()},		
					function(data){
						var jsonStr = JSON.stringify(data);
						jsonStr = jsonStr.replace('[','');
						jsonStr = jsonStr.replace(']','');
						var Obj = jQuery.parseJSON(jsonStr);
						
						alert(Level_name);
						$.post("http://localhost/alaqsa/Home/" + 'level_classes',
								{'level_name':Obj['level_name']})
								.done(function(data){
									obj=JSON.parse(data);
									$("<ul class='"+Obj['level_name']+"'></ul>").appendTo('#classesdiv');

									for (i=0;i<obj.length;i++){
										$("<li class='"+Obj['level_name']+"'><input type='checkbox' onclick='fff()' value='"+obj[i]+"' >"+ obj[i] +"</input></li>").appendTo('.'+Obj['level_name']);
									}

								})
								.fail(function(){
									$('.'+Obj['level_name']).remove();


								});
						
						
					},"json");		

		}
		else{
			$('.'+Level_name).remove();
			
	
		}

	});
	
	
	
	$('#classesdiv input').click(function(){
		var Class_name=$(this).val();
		if($(this).is(':checked'))
		{			
			$.post("http://localhost/alaqsa/Home/get_class",
					{class_name:$(this).val()},		
					function(data){
						var jsonStr = JSON.stringify(data);
						jsonStr = jsonStr.replace('[','');
						jsonStr = jsonStr.replace(']','');
						var Obj = jQuery.parseJSON(jsonStr);
						alert(Obj['class_name']);
						$.post("http://localhost/alaqsa/Home/" + 'level_classes',
								{'level_name':Obj['class_level'],'class_name':Obj['class_name']})
								.done(function(data){
									obj=JSON.parse(data);
									$("<ul class='"+Obj['class_name']+"'></ul>").appendTo('#roomsdiv');

									for (i=0;i<obj.length;i++){
										$("<li class='"+Obj['class_name']+"'><input type='checkbox' value='"+obj[i]+"' >"+ obj[i] +"</input></li>").appendTo('.'+Obj['class_name']);
									}

								})
								.fail(function(){
									$('.'+Obj['class_name']).remove();


								});
						
						
					},"json");		

		}
		else{
			$('.'+Class_name).remove();
			
	
		}

	});
	
*/

	$('.level_drop').change(function()
			{
		$('.subject_drop').empty();
		$('.test_drop').empty();
		$('.skill_drop').empty();
		$('.student_drop').empty();
		$('.room_drop').empty();

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
		$('.subject_drop').empty();
		$('.test_drop').empty();
		$('.skill_drop').empty();
		$('.student_drop').empty();
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
		$('.test_drop').empty();
		$('.skill_drop').empty();

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
		$('.skill_drop').empty();

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
	
	$('.level_drop_permit').change(function()
			{
		$('.subject_drop_permit').empty();
		$('.test_drop_permit').empty();
		$('.skill_drop_permit').empty();
		$('.room_drop_permit').empty();
		$('.student_drop_permit').empty();
		Level_Name_Permit = $(this).val();
		$.post("http://localhost/alaqsa/Home/" + 'level_classes_permit',
				{'level_name':Level_Name_Permit})
				.done(function(data){
					obj=JSON.parse(data);
					$('.class_drop_permit').empty();
					$('<option/>').val('').html('اختر الصف').appendTo('.class_drop_permit');
					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.class_drop_permit');
					}

				})
				.fail(function(){
					$('.class_drop_permit').empty();


				});

			});    
	
	$('.class_drop_permit').change(function()
			{
		$('.test_drop_permit').empty();
		$('.skill_drop_permit').empty();
		$('.room_drop_permit').empty();
		$('.student_drop_permit').empty();
		$.post("http://localhost/alaqsa/Home/" + 'class_rooms_permit',
				{'level_name':$('.level_drop_permit').val(),'class_name':$(this).val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.room_drop_permit').empty();
					$('<option/>').val('').html('اختر الفصل').appendTo('.room_drop_permit');
					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.room_drop_permit');
					}

				})
				.fail(function(){
					$('.room_drop_permit').empty();


				});

		
		$.post("http://localhost/alaqsa/Home/" + 'class_subjects_permit',
				{'class_name':$('.class_drop_permit').val(),
			'level_name':$('.level_drop_permit').val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.subject_drop_permit').empty();

					$('<option/>').val('').html('اختر المادة').appendTo('.subject_drop_permit');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.subject_drop_permit');
					}

				})
				.fail(function(data){
					$('.subject_drop_permit').empty();

				});
				
			});  
	
	$('.subject_drop_permit').change(function()
			{
		$('.test_drop_permit').empty();
		$('.skill_drop_permit').empty();
		$.post("http://localhost/alaqsa/Home/" + 'class_tests',
				{'class_name':$('.class_drop_permit').val(),
			'level_name':$('.level_drop_permit').val(),
			'subject_name':$(this).val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.test_drop_permit').empty();

					$('<option/>').val('').html('اختر المعيار').appendTo('.test_drop_permit');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.test_drop_permit');
					}

				})
				.fail(function(data){
					$('.test_drop_permit').empty();

				});
			});
		
		$('.test_drop_permit').change(function()
				{
			$('.skill_drop_permit').empty();

			$.post("http://localhost/alaqsa/Home/" + 'test_skills',
					{'class_name':$('.class_drop_permit').val(),
				'level_name':$('.level_drop_permit').val(),
				'subject_name':$('.subject_drop_permit').val(),
				'test_name':$(this).val()
					})
					.done(function(data){
						obj=JSON.parse(data);
						$('.skill_drop_permit').empty();

						$('<option/>').val('').html('اختر المهارة').appendTo('.skill_drop_permit');

						for (i=0;i<obj.length;i++){
							$('<option/>').val(obj[i]).html(obj[i]).appendTo('.skill_drop_permit');
						}

					})
					.fail(function(data){
						$('.skill_drop_permit').empty();

					});


			});
		
		$('.room_drop_permit').change(function()
				{

			$.post("http://localhost/alaqsa/Home/" + 'room_sts',
					{'class_name':$('.class_drop_permit').val(),
				'level_name':$('.level_drop_permit').val(),
				'room_name':$(this).val()
				})
					.done(function(data){
						obj=JSON.parse(data);
						$('.student_drop_permit').empty();
						$('<option/>').val('').html('اختر اسم الطالب').appendTo('.student_drop_permit');

						for (i=0;i<obj.length;i++){
							$('<option/>').val(obj[i].id).html(obj[i].name).appendTo('.student_drop_permit');
						}

					})
					.fail(function(data){
						$('.student_drop_permit').empty();

					});


			});
		
		$('.room_drop').change(function()
				{

			$.post("http://localhost/alaqsa/Home/" + 'room_sts_full',
					{'class_name':$('.class_drop').val(),
				'level_name':$('.level_drop').val(),
				'room_name':$(this).val()
				})
					.done(function(data){
						obj=JSON.parse(data);
						$('.student_drop').empty();
						$('<option/>').val('').html('اختر اسم الطالب').appendTo('.student_drop');

						for (i=0;i<obj.length;i++){
							$('<option/>').val(obj[i].id).html(obj[i].name).appendTo('.student_drop');
						}

					})
					.fail(function(data){
						$('.student_drop').empty();

					});


			});

	Dialogload('#class_delete_dialog','.delete',600,'delete_input_id');
	Dialogload('#class_delete_dialog','.delete_level_button',600,'delete_input_id');
	Dialogload('#permission_modify_dialog','.modify_permission',600,'hidden_past_permission_id');
	Dialogload('#subject_modify_dialog','.modify_subject',600,'hidden_past_subject_id');
	Dialogload('#assign_modify_dialog','.modify_assign',600,'hidden_past_assign_id');
	Dialogload('#test_modify_dialog','.modify_test',600,'hidden_past_test_id');
	Dialogload('#skill_modify_dialog','.modify_skill',600,'hidden_past_skill_id');
	Dialogload('#skill_add_dialog','.add_skill',600,'hidden_test_id');
	Dialog_load('#level_add_dialog','.add_level',600);
	Dialog_load('#add_class_dialog','.add_class',600);
	Dialog_load('#room_insert_dialog','.add_room',600);
	Dialog_load('#teacher_insert_dialog','.add_teacher',600);
	Dialog_load('#subject_insert_dialog','.add_subject',600);
	Dialog_load('#test_insert_dialog','.add_test',600);
	Dialog_load('#skill_insert_dialog','.add_skill1',600);
	Dialog_load('#user_insert_dialog','.add_user',600);
	Dialog_load('#permission_insert_dialog','.add_permission',600);
	Dialog_load('#assign_insert_dialog','.add_assign',600);
	Dialog_load('#student_insert_dialog','.add_student',600);
	Dialog_load('#mark_insert_dialog','.add_mark',600);


	var teacher_array = ['اسم المعلم','رقم الهوية','مكان الميلاد','تاريخ الميلاد','التخصص','تاريخ التخرج','المؤهل الدراسي','اسم الجامعة','الجنسية','إيميل المعلم','جوال المعلم'];	
	var user_array = ['اسم المستخدم','اسم الدخول للمستخدم','كلمة السر','البريد الإلكتروني','الهاتف','مسمى الوظيفة'];
	var student_array = [' الجنسية:',' رقم جواز السفر:','رقم السجل المدني للطالب/الإقامة:','تاريخ الهوية:','تاريخ انتهاء الإقامة:'
	                     ,' الاسم الأول بالعربي:','الاسم الأول بالأنجليزي:','اسم الأب بالعربي:','اسم الأب بالانجليزي:',
	                     'اسم الجد بالعربي:',' اسم الجد بالإنجليزي:','اسم العائلة بالعربي:',' اسم العائلة بالإنجليزي:',' تاريخ ميلاد الطالب:','مكان الميلاد:',
	                     'اسم ولي أمر الطالب الرباعي:',' تاريخ ميلاد ولي الأمر:',' مكان ميلاد ولي الأمر:',' رقم هوية ولي الأمر:',' تاريخ الهوية لولي الأمر:',
	                     ' فئة دم الطالب:',' نوع السكن:',' ملكية السكن:',' الحالة الإجتماعية لولي أمر الطالب:',' المنطقة الإدارية:',' المدينة:',
	                     ' الحي:',' الشارع الرئيسي:',' الشارع الفرعي:',' رقم المنزل:',' بجوار:',' الهاتف 1:',' الهاتف 2:',' الجوال (هاتف التواصل):',
	                     ' البريد الإلكتروني:',' عمل ولي الأمر:',' جهة العمل:',' العنوان في الإجازة:',' الرمز البريدي:',' صندوق البريد:',' الفاكس:',
	                     ' وسيلة النقل:',' حالة التسجيل:',' هل يسكن في قرية:',' اسم القرية:',' اسم قريب الطالب:',' عنوان قريب الطالب:',' عدد أفراد الأسرة:',' عدد الأخوة:',
	                     ' عدد الأخوات:',' تسلسل الطالب:',' هل الأب على قيد الحياة:',' هل الأم على قيد الحياة:',' مستوى تعليم الأب:',' مستوى تعليم الأم:',' مع من يسكن الطالب:',
	                     ' المرحلة:',' الصف:',' الفصل:'];

	Dialogload('#teacher_modify_dialog','.modify_teacher',600,'hidden_past_teacher_id');
	Dialogload('#user_modify_dialog','.modify_user',600,'hidden_past_user_id');
	Dialogload('#student_modify_dialog','.modify_student',600,'hidden_past_student_id');

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
					$('#teacher_modify_form').append("<input type=submit value='تعديل' />");	

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
					$('#user_modify_form').append("<input type=submit value='تعديل' />");	

				},"json");		
	});
	
	$('.modify_student').click(function(){
		$.post("http://localhost/alaqsa/Home/get_student",
				{st_id:this.id},		
				function(data){
					var jsonStr = JSON.stringify(data);
					jsonStr = jsonStr.replace('[','');
					jsonStr = jsonStr.replace(']','');
					var Obj = jQuery.parseJSON(jsonStr);
					delete Obj['st_id'];
					$('.student_class').remove();
					var j=0;
					$.each( Obj, function( key, value ) {

						$('#student_modify_form').append("<label class='student_class'>"+ student_array[j] + "</label>");
						$('#student_modify_form').append("<input class='student_class' type=text name=" + key +" value=" + value + " />");	
						j++;	
					});
					$('#student_modify_form').append("<input type=submit value='تعديل' />");	

				},"json");		
	});




	form_submit('#level_insert_form','level_insert');
	form_submit('#class_insert_form','ins_class');
	form_submit('#room_add_form','room_insert');
	form_submit('#teacher_insert_form','teacher_insert');
	form_submit('#subject_insert_form','subject_insert');
	form_submit('#test_insert_form','test_insert');
	form_submit('#skill_insert_form','skill_insert');
	form_submit('#user_insert_form','user_insert');
	form_submit('#student_insert_form','student_insert');
	form_submit('#assign_insert_form','assign_insert');
	form_submit('#mark_insert_form','mark_insert');
	
	form_submit('#table_form','del_class');
	
	form_submit('#permission_search_form','permission_search');
	form_submit('#modify_class_form','modify_class');
	form_submit('#modify_level_form','modify_level');
	form_submit('#room_modify_form','modify_room');
	form_submit('#teacher_modify_form','modify_teacher');
	form_submit('#user_modify_form','modify_user');
	form_submit('#student_modify_form','modify_student');
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
			window.location.reload(true);
		});
		return false;
			})



			//open dialog for adding class.
			$( '#add_class_dialog' ).dialog( {autoOpen: false, draggable: false,
				modal: true, resizable: false,
				show: { effect: 'drop', direction: "up" } ,
				width: 600 
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
		width: 600 } );
	$('.modify_class').click(function(){    	

		document.getElementById('hidden_past_class_id').value=this.id;

		$('#class_modify_dialog').dialog('open');
		return false;
	}); 


	//open dialog to modify a class.
	$('#room_modify_dialog').dialog( { autoOpen: false, draggable: false,
		modal: true, resizable: false,
		show: { effect: 'drop', direction: "up" } ,
		width: 600 } );
	$('.modify_room').click(function(){    	

		document.getElementById('hidden_past_room_id').value=this.id;

		$('#room_modify_dialog').dialog('open');
		return false;
	}); 

	//open dialog to modify a level.
	$('#level_modify_dialog').dialog( { autoOpen: false, draggable: false,
		modal: true, resizable: false,
		show: { effect: 'drop', direction: "up" } ,
		width: 600 } );
	$('.modify_level_button').click(function(){    	

		document.getElementById('hidden_past_level_id').value=this.id;

		$('#level_modify_dialog').dialog('open');
		return false;
	});


	//open dialog to insert a new room.
	$('#room_insert_dialog').dialog({autoOpen: false, draggable: false,
		modal: true, resizable: false,
		show: { effect: 'drop', direction: "up" } ,
		width: 600 } );
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


//Open blank dialog function
function Dialog_load(dest,butt,Dwidth)
{
	$( dest ).dialog( { autoOpen: false, draggable: false,
		modal: true, resizable: false,
		show: { effect: 'drop', direction: "up" } ,
		width: Dwidth } );

	$(butt).click(function(){
 
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





function fff(){
	
	

	
		var Class_name=$(this).val();
		alert(Class_name);
		if($(this).is(':checked'))
		{			
			$.post("http://localhost/alaqsa/Home/get_class",
					{class_name:$(this).val()},		
					function(data){
						var jsonStr = JSON.stringify(data);
						jsonStr = jsonStr.replace('[','');
						jsonStr = jsonStr.replace(']','');
						var Obj = jQuery.parseJSON(jsonStr);
						alert(Obj['class_name']);
						$.post("http://localhost/alaqsa/Home/" + 'level_classes',
								{'level_name':Obj['class_level'],'class_name':Obj['class_name']})
								.done(function(data){
									obj=JSON.parse(data);
									$("<ul class='"+Obj['class_name']+"'></ul>").appendTo('#roomsdiv');

									for (i=0;i<obj.length;i++){
										$("<li class='"+Obj['class_name']+"'><input type='checkbox' value='"+obj[i]+"' >"+ obj[i] +"</input></li>").appendTo('.'+Obj['class_name']);
									}

								})
								.fail(function(){
									$('.'+Obj['class_name']).remove();


								});
						
						
					},"json");		

		}
		else{
			$('.'+Class_name).remove();
			
	
		}


	
}