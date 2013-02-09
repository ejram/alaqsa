$(document).ready(function()
		{
	$('<option/>').val('all').html('اختر المرحلة').prependTo('.r_level_drop');

	$('.r_level_drop').val('').attr('selected',0);



	$('.r_level_drop').change(function()
			{
		$('.r_subject_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_subject_drop');

		$('.r_test_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_test_drop');

		$('.r_skill_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_skill_drop');

		$('.r_student_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_student_drop');

		$('.r_room_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_room_drop');

		$.post("http://localhost/alaqsa/Home/" + 'level_classes',
				{'level_name':$(this).val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.r_class_drop').empty();
					$('<option/>').val('all').html('الكل').appendTo('.r_class_drop');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.r_class_drop');
					}

				})
				.fail(function(){
					$('.r_class_drop').empty();


				});
		$.post("http://localhost/alaqsa/Home/" + 'class_rooms',
				{'class_name':$(this).val(),'level_name':$('.r_level_drop').val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.r_room_drop').empty();
					$('<option/>').val('all').html('الكل').appendTo('.r_room_drop');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.r_room_drop');
					}

				})
				.fail(function(data){
					$('.r_room_drop').empty();

				});

			});    
	$('.r_class_drop').change(function()
			{
		$('.r_subject_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_subject_drop');

		$('.r_test_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_test_drop');

		$('.r_skill_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_skill_drop');

		$('.r_student_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_student_drop');

		$.post("http://localhost/alaqsa/Home/" + 'class_rooms',
				{'class_name':$(this).val(),'level_name':$('.r_level_drop').val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.r_room_drop').empty();

					$('<option/>').val('all').html('الكل').appendTo('.r_room_drop');


					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.r_room_drop');
					}

				})
				.fail(function(data){
					$('.r_room_drop').empty();

				});

		$.post("http://localhost/alaqsa/Home/" + 'class_subjects',
				{'class_name':$(this).val(),'level_name':$('.r_level_drop').val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.r_subject_drop').empty();

					$('<option/>').val('all').html('الكل').appendTo('.r_subject_drop');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.r_subject_drop');
					}

				})
				.fail(function(data){
					$('.r_subject_drop').empty();

				});

		$.post("http://localhost/alaqsa/Home/" + 'class_tests',
				{'class_name':$(this).val(),'level_name':$('.r_level_drop').val() , 'subject_name':$('.r_subject_drop').val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.r_test_drop').empty();

					$('<option/>').val('all').html('الكل').appendTo('.r_test_drop');


					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.r_test_drop');
					}

				})
				.fail(function(data){
					$('.r_test_drop').empty();

				});

			});

	$('.r_subject_drop').change(function()
			{
		$('.r_test_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_test_drop');

		$('.r_skill_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_skill_drop');

		$.post("http://localhost/alaqsa/Home/" + 'class_tests',
				{'class_name':$('.r_class_drop').val(),'level_name':$('.r_level_drop').val() , 'subject_name':$(this).val()})
				.done(function(data){
					obj=JSON.parse(data);
					$('.r_test_drop').empty();

					$('<option/>').val('all').html('الكل').appendTo('.r_test_drop');


					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.r_test_drop');
					}

				})
				.fail(function(data){
					$('.r_test_drop').empty();

				});


			});
	
	

	$('.r_test_drop').change(function()
			{
		$('.r_skill_drop').empty();
		$('<option/>').val('all').html('الكل').appendTo('.r_skill_drop');

		
		$.post("http://localhost/alaqsa/Home/" + 'test_skills',
				{'class_name':$('.r_class_drop').val(),'level_name':$('.r_level_drop').val() ,
			'subject_name':$('.r_subject_drop').val(),
			'test_name': $(this).val()
				})
				.done(function(data){
					obj=JSON.parse(data);
					$('.r_skill_drop').empty();

					$('<option/>').val('all').html('الكل').appendTo('.r_skill_drop');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i]).html(obj[i]).appendTo('.r_skill_drop');
					}

				})
				.fail(function(data){
					$('.r_skill_drop').empty();

				});


			});	
	
	$('.r_room_drop').change(function()
			{

		$.post("http://localhost/alaqsa/Home/" + 'room_sts_full',
				{'class_name':$('.r_class_drop').val(), 'level_name':$('.r_level_drop').val(),
			'room_name':$(this).val()
				})
				.done(function(data){
					obj=JSON.parse(data);
					$('.r_student_drop').empty();

					$('<option/>').val('all').html('الكل').appendTo('.r_student_drop');

					for (i=0;i<obj.length;i++){
						$('<option/>').val(obj[i].id).html(obj[i].name).appendTo('.r_student_drop');
					}

				})
				.fail(function(data){
					$('.r_student_drop').empty();

				});

			});	
		});
	
function report_submit(submit_form,submit_dest)
{

	$(submit_form).submit(function()
			{
		$.post("http://localhost/alaqsa/Home/" + submit_dest,
				$(submit_form).serialize(),
				function(data){
			
alert(data);
});
		return false;
			})

}