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

	//load async data on page load
	load_personal();
	load_current_tanks();
	load_tools_and_mud();
    load_test();
    load_settings_materials();
    load_settings_equipement();        

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
                        $('.pipe_ram:input').each(function() {
                                val = $(this).attr('old-value');
                                if(val!=undefined) {
                                        $(this).val(val);
                                }                                
                        });                        
		}else{
                        $('.pipe_ram:input').each(function() {
                                $(this).attr('old-value', $(this).val());
                                $(this).val('');
                        });
			$('.pipe_ram').hide();
		}
	});

	$('.cb_blindram').change(function(){
		if($('.cb_blindram:checked').length == 1){
                        $('.blind_ram:input').each(function() {
                                val = $(this).attr('old-value');
                                if(val!=undefined) {
                                        $(this).val(val);
                                }                                
                        });                        
			$('.blindram').show();                        
		}else{
                        $('.blind_ram:input').each(function() {
                                $(this).attr('old-value', $(this).val());
                                $(this).val('');
                        });
			$('.blindram').hide();
		}
	});

	$('.cb_shearram').change(function(){
		if($('.cb_shearram:checked').length == 1){
                        $('.shear_ram:input').each(function() {
                                val = $(this).attr('old-value');
                                if(val!=undefined) {
                                        $(this).val(val);
                                }                                
                        });                        
			$('.shearram').show();
		} else{                        
                        $('.shear_ram:input').each(function() {
                                $(this).attr('old-value', $(this).val());
                                $(this).val('');
                        })
			$('.shearram').hide();
		}
	});
        
        $('#rig_form_submit').click(function(e){
		e.preventDefault();
                var form = $(this).parents('form:first');                                
                $.post('/rest/save_rig', form.serialize(), function(r) {                        
                        if(r == true){
                                alert('Rig saved!');                                
                                $('#close_settings_btn').val('Close & Reload').removeClass('just_close');
                        }
                }, 'json');                
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
                        mud_cleaner.shaker_maker 			= $('#mudcleaner_table input[name="shaker_maker"]').val();
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

	$('#link_create_tank').click(function(e){
		e.preventDefault();
		$('input[name="system_type"]').val('active');
		var data = {type:'active'};
		$.post('/rest/list_tank_names',data,function(r){
			$('#new_tank_overlay .name').html(r);
		});
		$('#new_tank_overlay').slideDown();
	});

	$('.new_tank_st').change(function(){
		var data = {type:$(this).val()};
		$('#new_tank_overlay .name').html('<option value="">Loading...</option>');
		$.post('/rest/list_tank_names',data,function(r){
			$('#new_tank_overlay .name').html(r);
		});	
	});

	$('#active_type').change(function(e){
		e.preventDefault();
		var tank_type = parseInt($(this).val());
		
		$('#voltkaforo,#hlibremax').val(0);

		//cuadrado
		if(tank_type == 1){
			$('.tank_formula_input').hide();
			$('.fieldset_tank_cuadrado').show();

		//semicircular
		}else if(tank_type == 2){
			$('.tank_formula_input').hide();
			$('.fieldset_tank_semicircular').show();

		//trailer	
		}else if(tank_type == 3){
			$('.tank_formula_input').hide();
			$('.fieldset_tank_trailer').show();

		//cilindro horizontal
		}else if(tank_type == 4){
			$('.tank_formula_input').hide();
			$('.fieldset_tank_horizontal').show();
		
		//ninguno
		}else{
			$('.tank_formula_input').hide();
				
		}
	});

	$('#new_tank_overlay .cancel_overlay').click(function(e){
		e.preventDefault();
		$('.tank_formula_input').hide();
		$('.tank_formula_input input').val('');
		$('#voltkaforo,#hlibremax').val(0);
		$('#new_tank_overlay select').val('');
		$('.new_tank_st').val('active');
		var data = {type:'active'};
		$('#new_tank_overlay .name').html('<option value="">Loading...</option>');
		$.post('/rest/list_tank_names',data,function(r){
			$('#new_tank_overlay .name').html(r);
		});
		$('#new_tank_overlay').slideUp();

		$('#new_tank_overlay input[name="hlibremax"]').addClass('required').parents('tr').show();
		$('.tank_volume_label').html('Vol. Capacity');
		$('#new_tank_overlay .voltkaforo').attr('disabled','disabled');
		$('#new_tank_overlay .type').addClass('required').parents('tr').show();	
	});

	$('#new_tank_overlay .tank_formula_input input').keyup(function(){
		//define the tank type and the current form
		var tank_type = parseInt($('#active_type').val());
		switch(tank_type){
			case 1:
				var context = $('#new_tank_overlay .medidas_cuadrado');
				break;
			case 2:
				var context = $('#new_tank_overlay .medidas_semicircular');
				break;
			case 3:
				var context = $('#new_tank_overlay .fieldset_tank_trailer');
				break;
			case 4:
				var context = $('#new_tank_overlay .fieldset_tank_horizontal');
				break;
		}

		//hlibremax
		var hlibremax = 0;
		if(tank_type == 1){
			hlibremax = parseFloat($('.sh1',context).val());	
		}else if(tank_type == 2){
			var sh1 = parseFloat($('.sh1',context).val());
			var sh2 = parseFloat($('.sh2',context).val());
			hlibremax = sh1 + sh2;			
		}else if(tank_type == 3){
			var sh1 = parseFloat($('.sh1',context).val());
			var sh2 = parseFloat($('.sh2',context).val());
			hlibremax = sh1 + sh2;	
		}else if(tank_type == 4){
			hlibremax = parseFloat($('.diametro',context).val());
		}
		completar_campo_val('hlibremax',hlibremax.toFixed(1));

		//voltkaforo
		var voltkaforo = 0;
		
		if(tank_type == 1){
			var sh1 = parseFloat($('.sh1',context).val());
			var sl1 = parseFloat($('.sl1',context).val());
			var sa1 = parseFloat($('.sa1',context).val());
			voltkaforo = (sh1 * sl1 * sa1) / 9702;
		
		}else if(tank_type == 2){
			var sh1 = parseFloat($('.sh1',context).val());
			var sl1 = parseFloat($('.sl1',context).val());
			var sa1 = parseFloat($('.sa1',context).val());
			var sh2 = parseFloat($('.sh2',context).val());
			var sl2 = parseFloat($('.sl2',context).val());
			var sa2 = parseFloat($('.sa2',context).val());
			voltkaforo = (sh1 * sl1 * sa1) / 9702 + ((0.3168 * (sa2 / 12) * (sh2 / 12) + 1.403 * Math.pow(sh2 / 12,2) - 0.933 * Math.pow(sh2 /12, 3)  / (sa2 / 12))*(sl2 / 12))/5.6146;
	
		}else if(tank_type == 3){
			var sh1 = parseFloat($('.sh1',context).val());
			var sl1 = parseFloat($('.sl1',context).val());
			var sa1 = parseFloat($('.sa1',context).val());
			var sh2 = parseFloat($('.sh2',context).val());
			var sl2 = parseFloat($('.sl2',context).val());
			var sa2 = parseFloat($('.sa2',context).val());
			voltkaforo = (sh1 * sl1 * sa1) / 9702 + (sh2 * sl2 * sa2) / 9702;

		}else if(tank_type == 4){
			var radio  	= parseFloat($('.diametro',context).val()) / 2;
			var cd1 	= parseFloat($('.diametro',context).val());
			var sl1 	= parseFloat($('.sl1',context).val());
			voltkaforo 	= sl1 * ((Math.pow( radio , 2) * Math.acos( ( radio - cd1 ) / radio )) - ( ( radio - cd1 ) * Math.pow((2 * radio * cd1 - Math.pow( cd1, 2 ) ) , 0.5) ) ) / 9702;
			log('voltkaforo 	= '+sl1+' * ((Math.pow( '+radio+' , 2) * Math.acos( ( '+radio+' - '+cd1+' ) / '+radio+' )) - ( ( '+radio+' - '+cd1+' ) * Math.pow((2 * '+radio+' * '+cd1+' - Math.pow( '+cd1+', 2 ) ) , 0.5) ) ) / 9702;');
		}

		completar_campo_val('voltkaforo',voltkaforo.toFixed(1));
	});

	$('#btn_tank_create').click(function(){
		var parent_form 		= $('#new_tank_overlay');
		var current_tanks_table = $('.new_tank_st').val();
		if(current_tanks_table == 'active'){
			current_tanks_table = $('#current_active_tanks');
		}else if(current_tanks_table == 'reserve'){
			current_tanks_table = $('#current_reserve_tanks');
		}else if(current_tanks_table == 'pill'){
			current_tanks_table = $('#current_pill_tanks');
		}else if(current_tanks_table == 'trip'){
			current_tanks_table = $('#current_trip_tanks');
		}

		var current_tanks_qty 	=  $('.this_tank',current_tanks_table).length;
		log(current_tanks_qty);

		var eqty = 0;
		$('select',parent_form).each(function(){
			if($(this).val() == ''){
				eqty = eqty + 1;
			}
		});

		if(parseInt($('.name',parent_form).val()) > 32 ){
			eqty = eqty - 1;
		}

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
				alert('This tank is already created. Please choose a different name and try again.');
			}else{
			
				if(!isNaN($('#active_type').val())){
					//get the tank type
					var tank_type = parseInt($('#active_type').val());
					$('.medidas_cuadrado input,.medidas_semicircular input,.fieldset_tank_trailer input,.fieldset_tank_horizontal input',parent_form).removeClass('required');
					switch(tank_type){
						case 1:
							$('.medidas_cuadrado input',parent_form).addClass('required');
							break;
						case 2:
							$('.medidas_semicircular input',parent_form).addClass('required');
							break;
						case 3:
							$('.fieldset_tank_trailer input',parent_form).addClass('required');
							break;
						case 4:
							$('.fieldset_tank_horizontal input',parent_form).addClass('required');
							break;
					}	
				}else{
					var tank_type = 99;
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
					var data = {
						project 	: $('#project_id').val(),
						type 		: tank_type,
						name 		: $('.name',parent_form).val(),
						agitators	: $('.agitators',parent_form).val(),
						jets 		: $('.jets',parent_form).val(),
						voltkaforo 	: $('.voltkaforo',parent_form).val(),
						hlibremax 	: $('#hlibremax',parent_form).val(),
						active 		: 1,
						order 		: current_tanks_qty + 1
					}

					log(data);

					switch(tank_type){
						case 1:
							var context = $('#new_tank_overlay .medidas_cuadrado');
							data.sh1 = $('.sh1',context).val();
							data.sa1 = $('.sa1',context).val();
							data.sl1 = $('.sl1',context).val();
							break;
						case 2:
							var context = $('#new_tank_overlay .medidas_semicircular');
							data.sh1 = $('.sh1',context).val();
							data.sa1 = $('.sa1',context).val();
							data.sl1 = $('.sl1',context).val();
							data.sh2 = $('.sh2',context).val();
							data.sa2 = $('.sa2',context).val();
							data.sl2 = $('.sl2',context).val();
							break;
						case 3:
							var context = $('#new_tank_overlay .fieldset_tank_trailer');
							data.sh1 = $('.sh1',context).val();
							data.sa1 = $('.sa1',context).val();
							data.sl1 = $('.sl1',context).val();
							data.sh2 = $('.sh2',context).val();
							data.sa2 = $('.sa2',context).val();
							data.sl2 = $('.sl2',context).val();
							break;
						case 4:
							var context = $('#new_tank_overlay .fieldset_tank_horizontal');
							data.diametro 	= $('.diametro',context).val();
							data.sl1 		= $('.sl1',context).val();
							break;
					}


					$.post('/rest/create_tank',data,function(r){
						if(r == true){
							//reload the tank list
							load_current_tanks();
							$('.tank_formula_input').hide();
							$('.tank_formula_input input').val('');
							$('#voltkaforo,#hlibremax').val(0);
							$('#new_tank_overlay input[name="hlibremax"]').addClass('required').parents('tr').show();
							$('.tank_volume_label').html('Vol. Capacity');
							$('#new_tank_overlay .voltkaforo').attr('disabled','disabled');
							$('#new_tank_overlay .type').addClass('required').parents('tr').show();	
							$('#new_tank_overlay').slideUp();

							$('#new_tank_overlay select').val('');
							$('.new_tank_st').val('active');
							var data = {type:'active'};
							$('#new_tank_overlay .name').html('<option value="">Loading...</option>');
							$.post('/rest/list_tank_names',data,function(r){
								$('#new_tank_overlay .name').html(r);
							});

							//upgrade the config panel close button	
							$('#close_settings_btn').val('Close & Reload').removeClass('just_close');

						}
					},'json');
				}
			}
		}

	});

	$('.remove_tank').live('click',function(e){
		e.preventDefault();
		var id = $(this).attr('href');
			id = id.split('remove_tank_');
			id = id[1];

		if(confirm('Are you sure to delete this tank?')){
			$(this).parents('tr').remove();
			var data = {id : id};
			$.post('/rest/remove_tank',data,function(r){
				if(r == true){
					load_current_tanks();
					$('#close_settings_btn').val('Close & Reload').removeClass('just_close');
				}
			},'json');
		}
	});

	$('.update_tank_order').click(function(e){
		e.preventDefault();
		if($(this).attr('id') == 'active_order'){
			var context = $('#current_active_tanks');
		}else if($(this).attr('id') == 'reserve_order'){
			var context = $('#current_reserve_tanks');
		}

		var eqty = 0;
		//validate there is not repeated order numbers
		$('.tank_order',context).each(function(){
			var value 	= $(this).val();
			var matches = 0;
			$('.tank_order',context).each(function(){
				if($(this).val() == value){
					matches = matches + 1;
				}
			});
			if(matches > 1){
				eqty = eqty + 1;
			}
		});

		if(eqty > 0){
			alert('There are tanks with the same order number. Please verify and try again.');	
		}else{
			var data = [];
			$('.tank_order').each(function(){
				var id = $(this).attr('id');
					id = id.split('tank_order_');
					id = id[1];
				var order = $(this).val();
				this_tank = {
					'id'	: id,
					'order'	: order
				}

				data.push(this_tank);
			});

			$.post('/rest/update_tank_order',$.toJSON(data),function(r){
				if(r == true){
					load_current_tanks();
					$('#close_settings_btn').val('Close & Reload').removeClass('just_close');
					alert('Order updated.');	
				}
			},'json');
		}
	});

	function load_current_tanks(){
		var active_data = {
			active  		: 1,
			project 		: $('#project_id').val(),
			tank_category 	: 'active' 
		}

		$.post('/rest/load_current_tanks',active_data,function(r){
			if(r !== ''){
				$('#current_active_tanks').empty().html(r).parents('fieldset').show();	
			}else{
				$('#current_active_tanks').empty().parents('fieldset').hide();
			}
		});

		var reserve_data = {
			active  		: 1,
			project 		: $('#project_id').val(),
			tank_category 	: 'reserve'
		}

		$.post('/rest/load_current_tanks',reserve_data,function(r){
			if(r !== ''){
				$('#current_reserve_tanks').empty().html(r).parents('fieldset').show();
			}else{
				$('#current_reserve_tanks').empty().parents('fieldset').hide();	
			}
		});	
	
		var pill_data = {
			active  		: 1,
			project 		: $('#project_id').val(),
			tank_category 	: 'pill'
		}

		$.post('/rest/load_current_tanks',pill_data,function(r){
			if(r !== ''){
				$('#current_pill_tanks').empty().html(r).parents('fieldset').show();
			}else{
				$('#current_pill_tanks').empty().parents('fieldset').hide();	
			}
		});

		var trip_data = {
			active  		: 1,
			project 		: $('#project_id').val(),
			tank_category 	: 'trip'
		}

		$.post('/rest/load_current_tanks',trip_data,function(r){
			if(r !== ''){	
				$('#current_trip_tanks').empty().html(r).parents('fieldset').show();
			}else{
				$('#current_trip_tanks').empty().parents('fieldset').hide();	
			}
		});

	}


	$('.show_measures').live('click',function(e){
		e.preventDefault();
		var id = $(this).attr('href');
			id = id.split('show_measures_');
			id = id[1];

		var data = {'id':id};
		$.post('/rest/get_tank_properties',data,function(r){
			if(r == false){
				alert('An error has ocurred. Please try again.');
			}else{
				log(r);
				if(r.tank_category == 'active'){
					var category_name = 'Active';
				}else if(r.tank_category == 'trip'){
					var category_name = 'Trip Tank';
				}else if(r.tank_category == 'pill'){
					var category_name = 'Pill';
				}else if(r.tank_category == 'reserve'){
					var category_name = 'Reserve';
				}

				$('#edit_tank_overlay .estype').val(category_name);
				$('#edit_tank_overlay .ename').val(r.tank_name);
				$('#edit_tank_overlay .eagitators').val(r.agitators);
				$('#edit_tank_overlay .ejets').val(r.jets);
				$('#edit_tank_overlay .etanktype').val(r.tank_type);
				$('#edit_tank_overlay .evoltkaforo').val(r.voltkaforo);
				$('#edit_tank_overlay .ehlibremax').val(r.hlibremax);
				$('#edit_tank_overlay .id_tank').val(r.id);
				$('#edit_tank_overlay .type').val(r.type);

				if(r.type == 1){
					$('#edit_tank_overlay .fieldset_tank_cuadrado .sl1').val(r.sl1);
					$('#edit_tank_overlay .fieldset_tank_cuadrado .sa1').val(r.sa1);
					$('#edit_tank_overlay .fieldset_tank_cuadrado .sh1').val(r.sh1);
					$('#edit_tank_overlay .fieldset_tank_cuadrado').show();
				}else if(r.type == 2){
					$('#edit_tank_overlay .fieldset_tank_semicircular .sl1').val(r.sl1);
					$('#edit_tank_overlay .fieldset_tank_semicircular .sa1').val(r.sa1);
					$('#edit_tank_overlay .fieldset_tank_semicircular .sh1').val(r.sh1);
					$('#edit_tank_overlay .fieldset_tank_semicircular .sl2').val(r.sl2);
					$('#edit_tank_overlay .fieldset_tank_semicircular .sa2').val(r.sa2);
					$('#edit_tank_overlay .fieldset_tank_semicircular .sh2').val(r.sh2);
					$('#edit_tank_overlay .fieldset_tank_semicircular').show();
				}else if(r.type == 3){
					$('#edit_tank_overlay .fieldset_tank_trailer .sl1').val(r.sl1);
					$('#edit_tank_overlay .fieldset_tank_trailer .sa1').val(r.sa1);
					$('#edit_tank_overlay .fieldset_tank_trailer .sh1').val(r.sh1);
					$('#edit_tank_overlay .fieldset_tank_trailer .sl2').val(r.sl2);
					$('#edit_tank_overlay .fieldset_tank_trailer .sa2').val(r.sa2);
					$('#edit_tank_overlay .fieldset_tank_trailer .sh2').val(r.sh2);
					$('#edit_tank_overlay .fieldset_tank_trailer').show();
				}else if(r.type == 4){
					$('#edit_tank_overlay .fieldset_tank_horizontal .sl1').val(r.sl1);
					$('#edit_tank_overlay .fieldset_tank_horizontal .diametro').val(r.diametro);
					$('#edit_tank_overlay .fieldset_tank_horizontal').show();		
				} 

				$('#edit_tank_overlay').show();	
			}
		},'json');

	});

	$('#edit_tank_overlay .cancel_overlay').click(function(e){
		e.preventDefault();
		$('#edit_tank_overlay input').val('');
		$('#edit_tank_overlay tank_formula_input').hide();
		$('#edit_tank_overlay').hide();	
	});

	$('#edit_tank_overlay .tank_formula_input input').keyup(function(){
		//define the tank type and the current form
		var tank_type = parseInt($('#edit_tank_overlay .type').val());
		switch(tank_type){
			case 1:
				var context = $('#edit_tank_overlay .fieldset_tank_cuadrado');
				break;
			case 2:
				var context = $('#edit_tank_overlay .fieldset_tank_semicircular');
				break;
			case 3:
				var context = $('#edit_tank_overlay .fieldset_tank_trailer');
				break;
			case 4:
				var context = $('#edit_tank_overlay .fieldset_tank_horizontal');
				break;
		}

		//hlibremax
		var hlibremax = 0;
		if(tank_type == 1){
			hlibremax = parseFloat($('.sh1',context).val());	
		}else if(tank_type == 2){
			var sh1 = parseFloat($('.sh1',context).val());
			var sh2 = parseFloat($('.sh2',context).val());
			hlibremax = sh1 + sh2;			
		}else if(tank_type == 3){
			var sh1 = parseFloat($('.sh1',context).val());
			var sh2 = parseFloat($('.sh2',context).val());
			hlibremax = sh1 + sh2;	
		}else if(tank_type == 4){
			hlibremax = parseFloat($('.diametro',context).val());
		}
		completar_campo_val('ehlibremax',hlibremax.toFixed(1));

		//voltkaforo
		var voltkaforo = 0;
		
		if(tank_type == 1){
			var sh1 = parseFloat($('.sh1',context).val());
			var sl1 = parseFloat($('.sl1',context).val());
			var sa1 = parseFloat($('.sa1',context).val());
			voltkaforo = (sh1 * sl1 * sa1) / 9702;
		
		}else if(tank_type == 2){
			var sh1 = parseFloat($('.sh1',context).val());
			var sl1 = parseFloat($('.sl1',context).val());
			var sa1 = parseFloat($('.sa1',context).val());
			var sh2 = parseFloat($('.sh2',context).val());
			var sl2 = parseFloat($('.sl2',context).val());
			var sa2 = parseFloat($('.sa2',context).val());
			voltkaforo = (sh1 * sl1 * sa1) / 9702 + ((0.3168 * (sa2 / 12) * (sh2 / 12) + 1.403 * Math.pow(sh2 / 12,2) - 0.933 * Math.pow(sh2 /12, 3)  / (sa2 / 12))*(sl2 / 12))/5.6146;
	
		}else if(tank_type == 3){
			var sh1 = parseFloat($('.sh1',context).val());
			var sl1 = parseFloat($('.sl1',context).val());
			var sa1 = parseFloat($('.sa1',context).val());
			var sh2 = parseFloat($('.sh2',context).val());
			var sl2 = parseFloat($('.sl2',context).val());
			var sa2 = parseFloat($('.sa2',context).val());
			voltkaforo = (sh1 * sl1 * sa1) / 9702 + (sh2 * sl2 * sa2) / 9702;

		}else if(tank_type == 4){
			var radio  	= parseFloat($('.diametro',context).val()) / 2;
			var cd1 	= parseFloat($('.diametro',context).val());
			var sl1 	= parseFloat($('.sl1',context).val());
			voltkaforo 	= sl1 * ((Math.pow( radio , 2) * Math.acos( ( radio - cd1 ) / radio )) - ( ( radio - cd1 ) * Math.pow((2 * radio * cd1 - Math.pow( cd1, 2 ) ) , 0.5) ) ) / 9702;
		}

		completar_campo_val('evoltkaforo',voltkaforo.toFixed(1));
	});

	$('#btn_tank_edit').click(function(){
		//validate there are not empty fields
		var eqty = 0;
		$('#edit_tank_overlay input').each(function(){
			if($(this).val() == ''){
				eqty = eqty + 1;
			}
		});

		if(eqty > 0){
			alert('Some fields are empty. Please verify and try again.');
		}else{
			//collect the data depending on the tank type
			var data = {};
				data.id = $('#edit_tank_overlay .id_tank').val();

			var tank_type = $('#edit_tank_overlay .type').val(); 
			
			if(tank_type == 1){
				var context 	= $('#edit_tank_overlay .fieldset_tank_cuadrado');
				data.sh1 		= $('.sh1',context).val();
				data.sl1 		= $('.sl1',context).val();
				data.sa1	 	= $('.sa1',context).val();
				data.voltkaforo = $('#edit_tank_overlay .evoltkaforo').val();
				data.hlibremax  = $('#edit_tank_overlay .ehlibremax').val();

			}else if(tank_type == 2){
				var context 	= $('#edit_tank_overlay .fieldset_tank_semicircular');
				data.sh1 		= $('.sh1',context).val();
				data.sl1 		= $('.sl1',context).val();
				data.sa1	 	= $('.sa1',context).val();
				data.sh2 		= $('.sh2',context).val();
				data.sl2 		= $('.sl2',context).val();
				data.sa2	 	= $('.sa2',context).val();
				data.voltkaforo = $('#edit_tank_overlay .evoltkaforo').val();
				data.hlibremax  = $('#edit_tank_overlay .ehlibremax').val();

			}else if(tank_type == 3){
				var context 	= $('#edit_tank_overlay .fieldset_tank_trailer');
				data.sh1 		= $('.sh1',context).val();
				data.sl1 		= $('.sl1',context).val();
				data.sa1	 	= $('.sa1',context).val();
				data.sh2 		= $('.sh2',context).val();
				data.sl2 		= $('.sl2',context).val();
				data.sa2	 	= $('.sa2',context).val();
				data.voltkaforo = $('#edit_tank_overlay .evoltkaforo').val();
				data.hlibremax  = $('#edit_tank_overlay .ehlibremax').val();

			}else if(tank_type == 4){
				var context 	= $('#edit_tank_overlay .fieldset_tank_horizontal');
				data.diametro 	= $('.diametro',context).val();
				data.sl1 		= $('.sl1',context).val();
				data.voltkaforo = $('#edit_tank_overlay .evoltkaforo').val();
				data.hlibremax  = $('#edit_tank_overlay .ehlibremax').val();
			}

			//send data to the server and save
			$.post('/rest/update_tank',data,function(r){
				if(r == true){
					$('#close_settings_btn').val('Close & Reload').removeClass('just_close');
					alert('Tank updated.');
					//hide the overlay and refresh the tank list
					load_current_tanks();
					$('#edit_tank_overlay input').val('');
					$('#edit_tank_overlay tank_formula_input').hide();
					$('#edit_tank_overlay').hide();	
				}
			},'json');	
		}
	});

	$('#new_tank_overlay .name').change(function(){
		
		if(parseInt($(this).val()) > 32 && parseInt($(this).val()) < 37){
			log($(this).val());

			//ocultar medidas 
			$('#new_tank_overlay .tank_formula_input').hide();

			//quitarle la obligatoriedad a medidas 
			$('#new_tank_overlay .tank_formula_input input').removeClass('required');

			//ocultar y eliminar la obligatoriedad max headroom
			$('#new_tank_overlay input[name="hlibremax"]').removeClass('required').parents('tr').hide();

			//cambiar el label al volumen
			$('.tank_volume_label').html('Max Volume:');
			$('#new_tank_overlay .voltkaforo').removeAttr('disabled');

			$('#new_tank_overlay .type').removeClass('required').parents('tr').hide();
		}else{
			$('#new_tank_overlay input[name="hlibremax"]').addClass('required').parents('tr').show();
			$('.tank_volume_label').html('Vol. Capacity');
			$('#new_tank_overlay .voltkaforo').attr('disabled','disabled');
			$('#new_tank_overlay .type').addClass('required').parents('tr').show();	
		}
	});

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

	//save phases number
	$('#save_phases_number').click(function(e){
		e.preventDefault();		                    
                max_phase = $('select[name="phase_number"] option:selected').val();	
                var data = {'max_phase':max_phase};
                $.post('/rest/save_project_settings',data,function(r){
                        if(r.message == 'project_updated'){
                                alert('Number of phases saved');                                
                                load_test();
                                $('#close_settings_btn').val('Close & Reload').removeClass('just_close');
                        } else{
                                alert('An error has ocurred. Please try again, or ask the system administrator for help.');
                        }
                },'json');		
	});
        
    //save enginer settings
	$('#save_enginer_settings').click(function(e){
		e.preventDefault();
		var maximun_enginers 		= $('#maximun_enginers').val();
                var operators 		= $('input[name="operators"]:checked').val();
                var yard_workers 	= $('input[name="yard_workers"]:checked').val();
		
		if(!isNaN(maximun_enginers)){
			var data = {
				'maximun_enginers'	: maximun_enginers, 
				'operators'			: operators, 
				'yard_workers'		: yard_workers
			};
			
			$.post('/rest/save_project_settings',data,function(r){
				if(r.message == 'project_updated'){
                    if(yard_workers == 1) {
                        $('.tab_yard_workers').show();
                        $("#show_yard_workers").val('1');
                    } else {
                        $('.tab_yard_workers').hide();
                        $("#show_yard_workers").val('0');
                    }
                    if(operators == 1) {
                        $('.tab_operators').show();
                        $('#show_operators').val('1');
                    } else{
                        $('.tab_operators').hide();
                        $('#show_operators').val('0');
                    }
					alert('Enginer settings saved');
					$('#close_settings_btn').val('Close & Reload').removeClass('just_close');
				}else{
					alert('An error has ocurred. Please try again, or ask the system administrator for help.');
				}
			},'json');

		}else{
			alert('Some fields are wrong. Please verify and try again');
		}
	});
	
	$('#enginer_configuration input[type="radio"]').change(function(){
		var data = {
			setting_type : $(this).attr('name'),
			value 		 : $(this).val()
		};

		$.post('/rest/set_personal_settings',data,function(r){
			if(r == true){
				$('#close_settings_btn').val('Close & Reload').removeClass('just_close');	
			}else{
				alert('An error has ocurred. Please try again');
			}
		},'json');

		//operators activated
		if(data.setting_type == 'operators' && parseInt(data.value) == 1){
			$('.tab_operators').show();
		}
		//operators deactivated
		if(data.setting_type == 'operators' && parseInt(data.value) == 0){
			$('.tab_operators').hide();	
		}

		//yardworkers activated
		if(data.setting_type == 'yard_workers' && parseInt(data.value) == 1){
			$('.tab_yard_workers').show();
		}
		//yardworkers deactivated
		if(data.setting_type == 'yard_workers' && parseInt(data.value) == 0){
			$('.tab_yard_workers').hide();	
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
        if($("#show_operators").val()==1) {                        
               var operators_data = {
                        project 	:$('#project_id').val(),
                        type 		:'operator', 
                        active		: 1
                };

                $.post('/rest/load_personal',operators_data,function(r){
                        $('#current_operators_list').html(r);
                }); 
        } else {                        
                $('.tab_operators').hide();
        }
		

		//load yard workers
        if($("#show_yard_workers").val()==1) {                        
                var yardworker_data = {
                        project 	:$('#project_id').val(),
                        type 		:'yard_worker', 
                        active		: 1
                };

                $.post('/rest/load_personal',yardworker_data,function(r){
                        $('#current_yardworkers_list').html(r);
                });	
        } else {
                $('.tab_yard_workers').hide();
        }		        
	}
    

        /*==========================================================================================================*/
	// 7. TOOLS AND MUD LIBRARY - IvanMel
	/*==========================================================================================================*/
	
	//when opening the tools and mud library panel...
	$('#tools_settings_link').click(function(e){
		e.preventDefault();                
		load_tools_and_mud();
	})
	  
	$('.remove_bit_link').live('click',function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		id = id.split('rm_bit_')[1];
		
        var data = {'id':id};

		$.post('/rest/remove_bit',data,function(r){
			if(r.message == 'deactivated'){
                load_tools_and_mud();
                $('#close_settings_btn').val('Close & Reload').removeClass('just_close');
			}
		},'json');
	});
        
    $('.remove_pump_link').live('click',function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		id = id.split('rm_pump_')[1];
		
        var data = {'id':id};

		$.post('/rest/remove_pump',data,function(r){
			if(r.message == 'deactivated'){
                load_tools_and_mud();
                $('#close_settings_btn').val('Close & Reload').removeClass('just_close');
			}
		},'json');
	});
        
    $('.remove_casing_link').live('click',function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		id = id.split('rm_casing_')[1];
		
        var data = {'id':id};

		$.post('/rest/remove_casing',data,function(r){
			if(r.message == 'deactivated'){
                load_tools_and_mud();
                $('#close_settings_btn').val('Close & Reload').removeClass('just_close');
			}
		},'json');
	});
        
    $('.remove_mud_link').live('click',function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		id = id.split('rm_mud_')[1];
		
        var data = {'id':id};

		$.post('/rest/remove_mud',data,function(r){
			if(r.message == 'deactivated'){
                load_tools_and_mud();
                $('#close_settings_btn').val('Close & Reload').removeClass('just_close');
			}
		},'json');
	});

    function load_tools_and_mud() {  
            project = $('#project_id').val();
            var all_data = {
                    project_id     : project,
                    active          : 1,
                    custom          : 1
            };

            $.post('/rest/load_bits',all_data,function(r){			
                    load = $('#current_bits_list');
                    (r.length > 1) ? load.prev().show() : load.prev('thead').hide();                        
                    load.html(r);
            });

            $.post('/rest/load_pumps',all_data,function(r){			
                    load = $('#current_pumps_list');
                    (r.length > 1) ? load.prev().show() : load.prev('thead').hide();                        
                    load.html(r);			
            });

            $.post('/rest/load_casing',all_data,function(r){
            load = $('#current_casings_list');
                    (r.length > 1) ? load.prev().show() : load.prev('thead').hide();                        
                    load.html(r);			
            });

            $.post('/rest/load_muds',all_data,function(r){
                    load = $('#current_muds_list');
                    (r.length > 1) ? load.prev().show() : load.prev('thead').hide();                        
                    load.html(r);
            });

    }

    /*==========================================================================================================*/
	// 8. MATERIALS
	/*==========================================================================================================*/    
      
	$('.link_create_material').click(function(e){
		e.preventDefault();
		$('#cm_overlay').slideDown();
	});

	$('.link_create_equipement').click(function(e){
		e.preventDefault();
		$('#ce_overlay').slideDown();
	});

	$('#filter_materials').quicksearch('.buscar_materiales_aqui');
	$('.shon_n_hide_unselected_materials').click(function(e){
		e.preventDefault();
		if($(this).hasClass('unselected_hidden')){
			//mostrar todos los materiales
			$('#materials_activation_table tr').show();
			//cambiar el html del link
			$(this).removeClass('unselected_hidden').html('Show selected materials only');
		}else{
			$('#materials_activation_table tr').hide();
			//ocultar los materiales marcados 
			$('#materials_activation_table input[type="checkbox"]:checked').parents('tr').show();
			//agregar la clase 'selected_hidden' y cambiar el html del link
			$(this).addClass('unselected_hidden').html('Show all materials');
			 
		}
	});

	$('#filter_equipement').quicksearch('.buscar_equipos_aqui');
	$('.shon_n_hide_unselected_equipement').click(function(e){
		e.preventDefault();
		if($(this).hasClass('unselected_hidden')){
			//mostrar todos los materiales
			$('#equipement_activation_table tr').show();
			//cambiar el html del link
			$(this).removeClass('unselected_hidden').html('Show selected equipement only');
		}else{
			$('#equipement_activation_table tr').hide();
			//ocultar los materiales marcados 
			$('#equipement_activation_table input[type="checkbox"]:checked').parents('tr').show();
			//agregar la clase 'selected_hidden' y cambiar el html del link
			$(this).addClass('unselected_hidden').html('Show all equipement');
			 
		}
	});

	$("#btn_material_create").click(function(e) {
        e.preventDefault();
        var eqty = 0;
        $("#new_material_form .required").each(function(){
        	if($(this).val() == ''){
        		eqty = eqty + 1;
        	}
        });

        if(eqty > 0){
        	alert('Some required fields are empty. Please verify and try again');
        }else{
        	$("#new_material_form .default_cero").each(function(){
        		if($(this).val() == ''){
        			$(this).val(0);
        		}	
        	});

	        var data =  $("#new_material_form").serialize();
	        $.post('/rest/new_material', data, function(r){
                alert('Material saved!');
                $('#cm_overlay').hide();
                $("#new_material_form")[0].reset();                        
                $('#materials_activation_table').load('/rest_mvc/load_settings_materials');
	        });	
        }
    });

    $("#btn_equipement_create").click(function(e) {
        e.preventDefault();

         var eqty = 0;
        $("#new_equipement_form .required").each(function(){
        	if($(this).val() == ''){
        		eqty = eqty + 1;
        	}
        });

        if(eqty > 0){
        	alert('Some fields are empty. Please verify and try again.')
        }else{

        	$("#new_equipement_form .default_cero").each(function(){
        		if($(this).val() == ''){
        			$(this).val(0);
        		}	
        	});

        	var data =  $("#new_equipement_form").serialize();
	        $.post('/rest/new_equipement', data, function(r){
                alert('Equipement saved!');
                $('#ce_overlay').hide();
                $("#new_equipement_form")[0].reset();                        
                $('#equipement_activation_table').load('/rest_mvc/load_settings_equipement');
	        });
        }
        
    });
        
    $('#ce_overlay .cancel_overlay').click(function(e){
		e.preventDefault();
		$('#ce_overlay').slideUp();
		$("#new_equipement_form")[0].reset(); 
	});

	$('#cm_overlay .cancel_overlay').click(function(e){
		e.preventDefault();
		$('#cm_overlay').slideUp();
		$("#new_material_form")[0].reset(); 
	});

	$('.update_materials').click(function(e){
		var action_button = $(this);
		$(this).val('Working...').removeClass('update_materials');
		var materials = [];
		$('#materials_activation_table input[type="checkbox"]').each(function(){
			if($(this).attr('checked') == 'checked'){
				var uip = 1;
			}else{
				var uip = 0;
			}
			var mid = $(this).val();
			var this_material = {
				id 				: mid,
				used_in_project : uip,
				price 			: $('#mprice_'+mid).val(), 
				commercial_name : $('#mcname_'+mid).val(), 
				erp_id 			: $('#merpid_'+mid).val(),
			};

			materials.push(this_material);
		});
		
		
		$.post('/rest/update_materials',$.toJSON(materials),function(r){
			if(r == true){
				alert('Materials list updated.');
				load_settings_materials();         
				$('#close_settings_btn').val('Close & Reload').removeClass('just_close');
				action_button.val('Save').addClass('update_materials');	
			}else{
				alert('An error has ocurred. Please try again.');
				action_button.val('Save').addClass('update_materials');
			}
		},'json');
		
	}); 

	function load_settings_materials(){
		$('#materials_activation_table').load('/rest_mvc/load_settings_materials',function(){
			$('#filter_materials').quicksearch('.buscar_materiales_aqui');	
		});
		
	}

	function load_settings_equipement(){
		$('#equipement_activation_table').load('/rest_mvc/load_settings_equipement',function(){
			$('#filter_equipement').quicksearch('.buscar_equipos_aqui');
		});
	}                       
       
	$('.remove_material').live('click',function(e){
		e.preventDefault();
		if(confirm('Are you sure to remove this material?')){
			var id = $(this).attr('id');
				id = id.split('_');
				id = id[2];

			$.post('/rest_mvc/remove_material',{id:id},function(r){
				if(r == true){
					load_settings_materials();
				}else{
					alert('An error has ocurred. Please verify and try again.');
					load_settings_materials();
				}
			},'json');
		}
	});

	$('.remove_equipement').live('click',function(e){
		e.preventDefault();
		if(confirm('Are you sure to remove this equipement?')){
			var id = $(this).attr('id');
				id = id.split('_');
				id = id[2];

			$.post('/rest_mvc/remove_equipement',{id:id},function(r){
				if(r == true){
					load_settings_equipement();
				}else{
					alert('An error has ocurred. Please verify and try again.');
					load_settings_equipement();
				}
			},'json');
		}
	});

	$('.update_equipement').click(function(e){
		var action_button = $(this);
		$(this).val('Working...').removeClass('update_equipement');
		var equipement = [];
		$('#equipement_activation_table input[type="checkbox"]').each(function(){
			if($(this).attr('checked') == 'checked'){
				var uip = 1;
			}else{
				var uip = 0;
			}
			var eid = $(this).val();
			var this_equipement = {
				id 				: eid,
				used_in_project : uip,
				price 			: $('#eprice_'+eid).val(), 
				commercial_name : $('#ecname_'+eid).val(), 
				erp_id 			: $('#eerpid_'+eid).val(),
			};

			equipement.push(this_equipement);
		});
		
		log(equipement);
		$.post('/rest/update_equipement',$.toJSON(equipement),function(r){
			if(r == true){
				alert('Equipement list updated.');
				load_settings_equipement();         
				$('#close_settings_btn').val('Close & Reload').removeClass('just_close');
				action_button.val('Save').addClass('update_equipement');	
			}else{
				alert('An error has ocurred. Please try again.');
				action_button.val('Save').addClass('update_equipement');
			}
		},'json');
		
	});




    /*==========================================================================================================*/
	// 8. MUD PROPERTIES
	/*==========================================================================================================*/    
        
        //when opening the mud properties link..
	$('#mud_properties_link').click(function(e){
		e.preventDefault();                
		load_test();
	})
        
        function load_test() {
                //load physical and chemical properties
		var p_and_c_data = {			
			type_test	: 1, 
			active		: 1
		};
                $.post('/rest/load_test',p_and_c_data,function(r){			
                        $('#settings_physical_and_chemical_list').html(r);
                });
                var rheology_data = {			
			type_test	: 2, 
			active		: 1
		};                
                $.post('/rest/load_test',rheology_data,function(r){			
                        $('#settings_rheology_list').html(r);
                });
                var solids_math_data = {			
			type_test	: 3, 
			active		: 1
		};
                $.post('/rest/load_test',solids_math_data,function(r){			
                        $('#settings_solids_math_list').html(r);
                });
                var custom_data = {			
			custom          : 1, 
			active		: 1
		};
                $.post('/rest/load_test',custom_data,function(r){			
                        $('#custom_test_list').html(r);
                });
                
        }
        
        //create a new enginer
	$('#form_new_test a').click(function(e){
		e.preventDefault();
                
                total = $("#custom_test_list").find('tr');                
                if(total.length >= 5) {
                        /*
                         *@TODO traducir
                         */
                        alert('Ha ingresado el número máximo de pruebas adicionales para este proyecto.');
                        return false;
                }
                
		var current_form = $(this).parents('form');
		var eqty = 0;
		$('input',current_form).each(function(){
			if($(this).val() == ''){
				eqty = eqty + 1;
			}
		});		
		if(eqty > 0){
			alert('Some fields are empty, please verify and try again.');
		} else {
			var data = current_form.serialize();
			$('input[name="test"],input[name="unit_test"]',current_form).val('');
			$.post('/rest/new_test',data,function(r){
				if(r.message == 'already_created'){
					alert('This test is already created');
				}else{
					load_test();
					$('#close_settings_btn').val('Close & Reload').removeClass('just_close');			
				}
			},'json');	
		}
	});
        
        //remove an test
	$('.remove_test_link').live('click',function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		id = id.split('rm_test_')[1];		
                
		var data = {'id':id};
		$.post('/rest/remove_test',data,function(r){
			if(r.message == 'deactivated'){
				load_test();
				$('#close_settings_btn').val('Close & Reload').removeClass('just_close');
			}
		},'json');
	});
        
        
        $('.save_program_test').click(function(e){
		e.preventDefault();                
                var table = $(this).parent().prev();                
                var fields = table.find('.program_value');                                
                var data = [];
                var project = $('#project_id').val();
                fields.each(function() {                                
                        var phase = $(this).attr('data-phase');
                        var test = $(this).attr('data-test');;
                        var id = $(this).attr('data-program-id');
                        if(id==undefined || id==null || id=='') {
                            id = null;    
                        }
                        var value_program = $(this).val();                                				
                        this_program = {
                                'id'            : id,
                                'project_id'	: project,
                                'test_id'	: test,
                                'value_program' : value_program,
                                'phase'         : phase
                        }

                        data.push(this_program);
                });

                $.post('/rest/save_program',$.toJSON(data),function(r){
                        if(r == true){
                                load_test();
                                $('#close_settings_btn').val('Close & Reload').removeClass('just_close');
                                alert('Programs saved.');	
                        }
                },'json');		
	});

});
/****** THE END ******/
