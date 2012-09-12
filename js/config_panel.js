/* QFLUIDS CONFIG PANEL */

$(function(){
	/*==========================================================================================================*/
	// UI INTERACTIONS
	/*==========================================================================================================*/

	//DISABLE DISABLED CONFIG FIELDS
	$('#project_settings .disabled input, #project_settings .disabled select').attr('disabled','disabled');

	//NAVIGATION
	$('.options_sidebar a').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
		$('.config_panel').hide();
		$(target+'.config_panel').show();
	});

	//CANCEL THE CONFIG PANEL
	$('#close_settings_btn').click(function(e){
		e.preventDefault();
		if($(this).hasClass('just_close')){
			$('#project_settings').slideUp();
		}else{
			location.reload();
		}
	});


	/*==========================================================================================================*/
	// 1. GENERAL
	/*==========================================================================================================*/




	/*==========================================================================================================*/
	// 2. RIG
	/*==========================================================================================================*/

	//change the rig name
	$('.rigname_source').keyup(function(){
		$('.rigname').val($(this).val());
	});

	//OCULTAR Y MOSTRAR LAS RAMS
	$('.cb_piperam').change(function(){
		if($('.cb_piperam:checked').length == 1){
			$('.pipe_ram').show();
		}else{
			$('.pipe_ram').hide();
		}
	});

	$('.cb_blindram').change(function(){
		if($('.cb_blindram:checked').length == 1){
			$('.blindram').show();
		}else{
			$('.blindram').hide();
		}
	});

	$('.cb_shearram').change(function(){
		if($('.cb_shearram:checked').length == 1){
			$('.shearram').show();
		}else{
			$('.shearram').hide();
		}
	});



	/*==========================================================================================================*/
	// 3. CONTROL SOLIDS EQUIPEMENT
	/*==========================================================================================================*/

	//shakers to use widget
	$('.shaker_touse').change(function(e){

		if(parseInt($(this).val()) > 0){
			$('#shakers_table').show();
		}

		var enabled_fields = $(this).val();

		$('#shakers_table tbody tr').each(function(i){
			i = i + 1;
			if(i <= enabled_fields){
				$(this).removeClass('disabled');
				$('input, select',this).removeAttr('disabled');
			}else{
				$(this).addClass('disabled');
				$('input, select',this).attr('disabled','disabled');
			}
		});
	});


	//save cse button
	$('#btn_save_cse').click(function(e){
		e.preventDefault();
		
		//VALIDATIONS
		var error_qty = 0;
		//===============================================================
		//1. VALIDATE SHAKERS
		$('#shakers_table tbody tr').each(function(){
			if(!$(this).hasClass('disabled')){
				$('input, select',this).each(function(){
					if($(this).val() == ''){
						error_qty = error_qty + 1;
					}
				});	
			}	
		});

		//2. VALIDATE MUD CLEANER
		$('#mudcleaner_table .required').each(function(){
			if($(this).val() == ''){
				error_qty = error_qty + 1;
			}
		});


		//2. VALIDATE CENTRIFUGUES
		$('#centrifugues_table .required').each(function(){
			if($(this).val() == ''){
				error_qty = error_qty + 1;
			}
		});

		if(error_qty > 0){
			alert('Some required fields are empty.\nPlease verify and try again');
		}else{

			//SAVE ROUTINES
			//===============================================================
			
			//SHAKERS
			var shakers 		= {};
			shakers.shaker_qty 	= $('.shaker_touse').val();
			shakers.shakers 	= []; 
			$('#shakers_table tbody tr').each(function(){
				if(!$(this).hasClass('disabled')){
					var this_shaker = {
						maker 			: $('.maker',this).val(),
						model 			: $('.model',this).val(),
						nominal_flow 	: $('.nominal_flow',this).val(),
						screens 		: $('.screens',this).val(),
						movement 		: $('.movement',this).val()
					}
					shakers.shakers.push(this_shaker);
				}
			});

			//MUD CLEANER
			var mud_cleaner 					= {};
			mud_cleaner.maker 					= $('#mudcleaner_table input[name="maker"]').val(); 
			mud_cleaner.model 					= $('#mudcleaner_table input[name="model"]').val();
			mud_cleaner.desander_cones 			= $('#mudcleaner_table select[name="desander_cones"]').val();
			mud_cleaner.desander_conediameter 	= $('#mudcleaner_table input[name="desander_conediameter"]').val();
			mud_cleaner.desander_pumptype 		= $('#mudcleaner_table select[name="desander_pumptype"]').val();
			mud_cleaner.desilter_cones 			= $('#mudcleaner_table select[name="desilter_cones"]').val();
			mud_cleaner.desilter_conediameter 	= $('#mudcleaner_table input[name="desilter_conediameter"]').val();
			mud_cleaner.desilter_pumptype 		= $('#mudcleaner_table select[name="desilter_pumptype"]').val();
			mud_cleaner.shaker_model 			= $('#mudcleaner_table input[name="shaker_model"]').val();
			mud_cleaner.shaker_screens 			= $('#mudcleaner_table select[name="shaker_screens"]').val();
			mud_cleaner.shaker_movement 		= $('#mudcleaner_table select[name="shaker_movement"]').val();


			//CENTRIFUGUES
			var centrifuges 		= {};
			centrifuges.centrifuges = [];
			centrifuges.qty 		= 0;
			$('#centrifugues_table tbody tr').each(function(){
				centrifuges.qty = centrifuges.qty + 1;
				var this_centrifugue 		= {
					maker 		: $('input[name="maker"]',this).val(),
					type 		: $('select[name="type"]',this).val(),
					variator	: $('select[name="variator"]',this).val(),
					maxrpm 		: $('input[name="maxrpm"]',this).val()
				}
				centrifuges.centrifuges.push(this_centrifugue);

			});

			var jsonshakers 		= $.toJSON(shakers);
			var jsonmudcleaner 		= $.toJSON(mud_cleaner);
			var jsoncentrifuges 	= $.toJSON(centrifuges);

			$.post('/rest/config_shakers',jsonshakers,function(r){
				if(r == true){
					log('Shakers saved, saving mud cleaner...');
					$.post('/rest/config_mudcleaner',jsonmudcleaner,function(r){
						if(r == true){
							log('Mud cleaner saved, saving centrifugues...');
							$.post('/rest/config_centrifugues',jsoncentrifuges,function(r){
								log('Centrifugues saved, process complete.');
								$('#close_settings_btn').val('Close & Reload').removeClass('just_close');
							},'json');
						}
					},'json');
				}
			},'json');

		}
	});

	/*==========================================================================================================*/
	// 4. TANKS
	/*==========================================================================================================*/


	/*==========================================================================================================*/
	// 5. MUD PROPERTIES
	/*==========================================================================================================*/


	/*==========================================================================================================*/
	// 6. PERSONAL
	/*==========================================================================================================*/
	
	//create a new enginer
	$('#form_new_enginer a').click(function(e){
		e.preventDefault();
		var eqty = 0;
		$('#form_new_enginer input').each(function(){
			if($(this).val() == ''){
				eqty = eqty + 1;
			}
		});

		if(eqty > 0){
			alert('Some fields are empty, please verify and try again.');
		}else{
			var data = $('#form_new_enginer').serialize();
			$.post('/rest/new_enginer',data,function(r){
				if(r.message == 'already_created'){
					alert('This enginer is already created');
				}else{
					var enginers_html = '';
					$(r.enginers).each(function(){	
			        	enginers_html = enginers_html +	'<tr id="this_enginer_'+ this.id +'">';
			        	enginers_html = enginers_html +		'<td><input name="name" type="text" value="'+ this.name +'" disabled="disabled" /></td>';
			        	enginers_html = enginers_html +		'<td><input name="lastname" type="text" value="'+ this.lastname +'" disabled="disabled" /></td>';
			        	enginers_html = enginers_html +		'<td><input name="identification" type="text" value="'+ this.identification +'" disabled="disabled" /></td>';
			        	enginers_html = enginers_html +		'<td><input name="rate" type="text" value="'+ this.rate +'" disabled="disabled" /></td>';
			        	enginers_html = enginers_html +		'<td><a href="#delete_enginer" id="delete_enginer_'+ this.id +'" class="remove_enginer">Remove</a></td>';
			        	enginers_html = enginers_html +	'</tr>';
					});
					$('#form_new_enginer input[name="name"]').val('');
					$('#form_new_enginer input[name="lastname"]').val('');
					$('#form_new_enginer input[name="identification"]').val('');
					$('#form_new_enginer input[name="rate"]').val('');
					$('#tbody_enginer_list').html(enginers_html);		
				}
			},'json');	
		}
	});	


	//remove an enginer
	$('.remove_enginer').live('click',function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		id = id.split('delete_enginer_');
		id = id[1];

		var data = {'id':id};

		$.post('/rest/remove_enginer',data,function(r){
			if(r.message == 'deactivated'){
				$('#this_enginer_'+id).remove();
			}
		},'json');
	});

	//save enginer settings
	$('#save_enginer_settings').click(function(e){
		e.preventDefault();
		var maximun_enginers = $('#maximun_enginers').val();
		if(!isNaN(maximun_enginers)){
			var data = {'maximun_enginers':maximun_enginers};
			$.post('/rest/save_project_settings',data,function(r){
				if(r.message == 'project_updated'){
					alert('Enginer settings saved');
				}else{
					alert('An error has ocurred. Please try again, or ask the system administrator for help.');
				}
			},'json');
		}else{
			alert('Some fields are wrong. Please verify and try again');
		}
	});

});
/****** THE END ******/