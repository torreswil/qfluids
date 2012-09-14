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

	//load asinc data on page load
	load_personal();
	load_current_tanks();

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

	$('#active_type').change(function(){
		if($(this).val() == ''){
			$('.tank_type_form_active').hide();
			$('#btn_create_active_tank').hide();
			$('.tank_measures_fieldset_active').hide();
		}else if(parseInt($(this).val()) == 1){
			$('.tank_type_form_active').hide();
			$('#active_cuadrado').show();
			$('#btn_create_active_tank').show();
			$('.tank_measures_fieldset_active').show();
		}else if(parseInt($(this).val()) == 2){
			$('.tank_type_form_active').hide();
			$('#active_semicircular').show();
			$('#btn_create_active_tank').show();
			$('.tank_measures_fieldset_active').show();
		}else if(parseInt($(this).val()) == 3){
			$('.tank_type_form_active').hide();
			$('#active_trailer').show();
			$('#btn_create_active_tank').show();
			$('.tank_measures_fieldset_active').show();
		}else if(parseInt($(this).val()) == 4){
			$('.tank_type_form_active').hide();
			$('#active_horizontal').show();
			$('#btn_create_active_tank').show();
			$('.tank_measures_fieldset_active').show();
		}
	});

	$('#reserve_type').change(function(){
		if($(this).val() == ''){
			$('.tank_type_form_reserve').hide();
			$('#btn_create_reserve_tank').hide();
			$('.tank_measures_fieldset_reserve').hide();
		}else if(parseInt($(this).val()) == 1){
			$('.tank_type_form_reserve').hide();
			$('#reserve_cuadrado').show();
			$('#btn_create_reserve_tank').show();
			$('.tank_measures_fieldset_reserve').show();
		}else if(parseInt($(this).val()) == 2){
			$('.tank_type_form_reserve').hide();
			$('#reserve_semicircular').show();
			$('#btn_create_reserve_tank').show();
			$('.tank_measures_fieldset_reserve').show();
		}else if(parseInt($(this).val()) == 3){
			$('.tank_type_form_reserve').hide();
			$('#reserve_trailer').show();
			$('#btn_create_reserve_tank').show();
			$('.tank_measures_fieldset_reserve').show();
		}else if(parseInt($(this).val()) == 4){
			$('.tank_type_form_reserve').hide();
			$('#reserve_horizontal').show();
			$('#btn_create_reserve_tank').show();
			$('.tank_measures_fieldset_reserve').show();
		}

		var parent_form = $(this).parents('form');
		$('input',parent_form).removeClass('required');
	});

	$('.btn_create_tank').click(function(){
		var parent_form = $(this).parents('form');
		if(parent_form.attr('id') == 'form_active_tank'){ 
			var current_tanks_table = $('#current_active_tanks'); 
		}else if(parent_form.attr('id') == 'form_reserve_tank'){
			var current_tanks_table = $('#current_reserve_tanks');	
		}

		var eqty = 0;
		$('select',parent_form).each(function(){
			if($(this).val() == ''){
				eqty = eqty + 1;
			}
		});

		if(eqty > 0){
			alert('Some fields are empty. Please verify and try again.');
		}else{
			//get the tank name and verify a tank with the same tankname is no already created
			var ename 	= 0;
			var tank_name = $('.name',parent_form).val();
			$('.tank_name_id',current_tanks_table).each(function(){
				if($(this).val() == tank_name){
					ename = 1;
				}
			});

			if(ename > 0){
				alert('This tank is already created');
			}else{
				//get the tank type
				var tank_type = parseInt($('.type',parent_form).val());
				switch(tank_type){
					case 1:
						$('.medidas_cuadrado input',parent_form).addClass('required');
						break;
					case 2:
						$('.medidas_semicircular input',parent_form).addClass('required');
						break;
					case 3:
						$('.medidas_trailer input',parent_form).addClass('required');
						break;
					case 4:
						$('.medidas_cilindro input',parent_form).addClass('required');
						break;
				}

				//validate fields are not empty
				var eqty = 0;
				$('.required',parent_form).each(function(){
					if($(this).val() == ''){
						eqty = eqty + 1;
					}
				});

				if(eqty > 0){
					alert('Some fields are empty, please verify and try again.');
				}else{
					//save the tank
					var data = {}
					switch(tank_type){
						case 1:
							alert('creando cuadrado');
							break;
						case 2:
							alert('creando semicircular');
							break;
						case 3:
							alert('creando trailer');
							break;
						case 4:
							alert('creando cilindro');
							break;
					}
					//reload the tank list

					//upgrade the config panel close button	

					//reset form
				}
			}
		}

	});

	function load_current_tanks(){
		var active_data = {
			active  		: 1,
			project 		: $('#project_id').val(),
			tank_category 	: 'active' 
		}

		$.post('/rest/load_current_tanks',active_data,function(r){
			$('#current_active_tanks').html(r);
		});

		var reserve_data = {
			active  		: 1,
			project 		: $('#project_id').val(),
			tank_category 	: 'reserve'
		}

		$.post('/rest/load_current_tanks',reserve_data,function(r){
			$('#current_reserve_tanks').html(r);
		});	
	}


	/*==========================================================================================================*/
	// 5. MUD PROPERTIES
	/*==========================================================================================================*/


	/*==========================================================================================================*/
	// 6. PERSONAL
	/*==========================================================================================================*/
	
	//when opening the personal settings panel...
	$('#personal_settings_link').click(function(e){
		e.preventDefault();
		load_personal();
	})


	//sugest a price for the enginer daily rate based on the category
	$('#form_new_enginer select').change(function(){
		if($(this).val() !== ''){
			var data = {'id':$(this).val()};
			$.post('/rest/get_category_info',data,function(r){
				$('#form_new_enginer input[name="rate"]').val(r.default_rate);
			},'json');
		}else{
			$('#form_new_enginer input[name="rate"]').val('');
		}
	});


	//create a new enginer
	$('#enginers form a').click(function(e){
		e.preventDefault();
		var current_form = $(this).parents('form');
		var eqty = 0;
		$('input',current_form).each(function(){
			if($(this).val() == ''){
				eqty = eqty + 1;
			}
		});

		$('select',current_form).each(function(){
			if($(this).val() == ''){
				eqty = eqty + 1;
			}
		});

		if(eqty > 0){
			alert('Some fields are empty, please verify and try again.');
		}else{
			var data = current_form.serialize();
			$('input[name="name"],input[name="lastname"],input[name="identification"]',current_form).val('');
			$.post('/rest/new_person',data,function(r){
				if(r.message == 'already_created'){
					alert('This enginer is already created');
				}else{
					load_personal();
					$('#close_settings_btn').val('Close & Reload').removeClass('just_close');			
				}
			},'json');	
		}
	});	


	//remove an enginer
	$('.remove_person_link').live('click',function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		id = id.split('rm_person_');
		id = id[1];

		var data = {'id':id};

		$.post('/rest/remove_person',data,function(r){
			if(r.message == 'deactivated'){
				load_personal();
				$('#close_settings_btn').val('Close & Reload').removeClass('just_close');
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

	function load_personal(){
		//load enginers
		var enginers_data = {
			project 	:$('#project_id').val(),
			type 		:'enginer', 
			active		: 1
		};

		$.post('/rest/load_personal',enginers_data,function(r){
			$('#current_enginers_list').html(r);
		});

		//load operators
		var operators_data = {
			project 	:$('#project_id').val(),
			type 		:'operator', 
			active		: 1
		};

		$.post('/rest/load_personal',operators_data,function(r){
			$('#current_operators_list').html(r);
		});

		//load yard workers
		var yardworker_data = {
			project 	:$('#project_id').val(),
			type 		:'yard_worker', 
			active		: 1
		};

		$.post('/rest/load_personal',yardworker_data,function(r){
			$('#current_yardworkers_list').html(r);
		});	
	}

});
/****** THE END ******/