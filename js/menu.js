$(function(){	

	/*==========================================================================================================*/
	// SAVE REPORT
	/*==========================================================================================================*/
	$('#btn_save_report').click(function(e){
		e.preventDefault();

		//day 0
		if(parseInt($('#master_report_count').val()) == 0){
			
			if($('#spud_data').val() == ''){
				alert('To create the first report, please make sure the spud date is not empty');
			}else{
				var data = {
					'spud_date' 		: $('#spud_data').val(),
					'transactional_id'	: $('#transactional_id').val()
				};	

				$.post('/rest/first_report',data,function(r){
					if(r.message == 'sucess'){
						$('#spud_data').attr('disabled','disabled');
						$('#master_report_count').val(1);
						$('#current_report').val(1);
						$('#current_report_str').html(r.number);
						$('#current_date').html(r.date);
						$('.navigation_wrapper').slideDown('fast',function(){
							$('.file_menu li').show();
						});
						$('#start_message').html('Select a data input form from the sidebar to continue.');	
					}
				},'json');
			}
		
		//day 0+
		}else{
			//validate_data();
			alert('saving function trigger');
		}
	});





	/*==========================================================================================================*/
	// PRINT AND SEND
	/*==========================================================================================================*/




	/*==========================================================================================================*/
	// REPORT ARCHIVE
	/*==========================================================================================================*/

	$('#btn_search_report').click(function(e){
		e.preventDefault();
		
	});




	/*==========================================================================================================*/
	// NEW REPORT
	/*==========================================================================================================*/

	$('#btn_new_report').click(function(e){
		e.preventDefault();
		var data = {
			'number'					: $('#current_report').val(),
			'date'						: $('#current_date').html(),
			'project_transactional_id'	: $('#transactional_id').val()
		};

		$.post('/rest/new_report',data,function(r){
			if(r.message == 'sucess'){
				location.reload();
			}else{
				alert('An error has ocourred. Please try again');
			}
		},'json');
	});

	//configure the datepickers
	$('.datepicker').datepicker({
		'dateFormat': 'yy-mm-dd'
	});

	//change the spud date on report 0
	$('#spud_data').change(function(){
		if($(this).val() == ''){
			$('.navigation_wrapper').hide();
			$('#current_date').html('');
			$('#start_message').html('Pick a spud date to start.');
		}
	});


	/*==========================================================================================================*/
	// MENU
	/*==========================================================================================================*/
	
	//show the menu
	$('#menu_btn').click(function(e){
		e.preventDefault();
		$('#menu_overlay').show();
	});

	//hide the menu
	$('#menu_overlay .close_link').click(function(e){
		e.preventDefault();
		$('#menu_overlay').hide();
	});

	//menu navigation
	$('.menu_option').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
		$('#menu_overlay').fadeOut('normal',function(){
			$(target).slideDown('normal');	
		});
		
	});	
	

	

});
/****** THE END ******/