/* Qfluids - Data Input Module */
/* jose.paternina@desarrollo22.com */
/* Creado por Desarrollo 22 para Qmax Colombia LTDA */
/* Copyright - 2012 */

$(function(){

	/*==========================================================================================================*/
	// NAVIGATION
	/*==========================================================================================================*/
	
	//show the sidebar only if the spud_date is defined
	if($('#spud_data').val() !== ''){
		$('.navigation_wrapper').slideDown('fast');
	}

	//CLICK EN UN ENLACE DE LA BARRA LATERAL
	$('.nav_links a').click(function(e){
		e.preventDefault();
		correr_calculos();
		var target = $(this).attr('href');
		
		if(!$(this).hasClass('pop_up')){
			$('.this_panel').hide();
			$(target).show();

			$('.nav_links a').removeClass('active');
			$(this).addClass('active');
		}
		
	});

	/*==========================================================================================================*/
	// 1. HOLE GEOMETRY
	/*==========================================================================================================*/
	
	//mostrar la hidraulica
	$('#pressure_loss_fieldset a').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
		$(target).show();
	});

	//CLICK PARA OCULTAR UN OVERLAY
	$(".this_hidden_panel").click(function(e) {
        if (e.target.id == "as_math" || $(e.target).parents("#as_math").size() || e.target.id == "ds_math" || $(e.target).parents("#ds_math").size()) { 
        	log('math clicked');    
        }else {
        	$('.this_hidden_panel').hide();	
        }
    });

    //BOTON DE CERRAR UN HIDDEN_PANEL
    $('.this_hidden_panel .title a').click(function(e){
    	e.preventDefault();
    	$('.this_hidden_panel').fadeOut('fast');
    });

	//CUADRO DE DIALOGO SELECCION DE CASING
	$('.pick_casing').click(function(){
		if(fval('md') <= 0){
			alert('To place Casign, first verify the open hole is greater than 0');
		}
	});	

	$('.pick_casing').focus(function(){
			if($(this).val() !== ''){
				$('#select_casing_overlay').show();
				$(this).attr('disabled','disabled');
				var casing_id = $(this).attr('id');
				casing_id = casing_id.split('picker_');
				casing_id = casing_id[1];
				$('#casing_number').val(casing_id);
			}	
	});

	$('#pickcasing_type').change(function(){
		if($(this).val() == 'Casing'){
			$('#pickcasing_top').val(0).attr('disabled','disabled');
		}else if($(this).val() == 'Liner'){
			$('#pickcasing_top').val('').removeAttr('disabled');
		}else{

		}
	});

	$('#pickcasing_od').change(function(){
		var no_option = '<option value="" selected="selected">Select...</option>';
		if($(this).val() !== ''){
			var data = 'oddeci='+$(this).val();
			var preppend_string = no_option;
			$.post('/rest/listar_id_casing',data,function(r){
				$(r).each(function(){
					var opt = '<option value="'+this.iddeci+'">'+this.iddeci+'</option>'
					preppend_string = preppend_string + opt;
				});
				$('#pickcasing_id').html(preppend_string);
			},'json');
		}
	});

	
	$('#select_casing_overlay .cancel_overlay').click(function(e){
		e.preventDefault();
		hide_casing_overlay();
	});

	$('#checkbox_casing_not_found').change(function(){
		if($(this).attr('checked') == 'checked'){
			$('#table_pickcasing select,#table_pickcasing input').attr('disabled','disabled');
			$('#table_createcasing select,#table_createcasing input').removeAttr('disabled');
			$('#table_createcasing').show();
		}else{
			$('#table_pickcasing select,#table_pickcasing input').removeAttr('disabled');
			$('#table_createcasing select,#table_createcasing input').attr('disabled','disabled');
			$('#table_createcasing').hide();
		}
	});

	$('#createcasing_type').change(function(){
		if($(this).val() == 'Casing'){
			$('#createcasing_top').val(0).attr('disabled','disabled');
		}else if($(this).val() == 'Liner'){
			$('#createcasing_top').val('').removeAttr('disabled');
		}
	});

	$('#btn_casing_selected').click(function(e){
		e.preventDefault();
		
		//CASING FOUND
		if($('#checkbox_casing_not_found:checked').length == 0){
			var eqty = 0;
			$('#table_pickcasing input,#table_pickcasing select').each(function(){
				if($(this).val() == ''){
					eqty = eqty + 1;
				}
			});	

			if(eqty > 0){
				alert('Some fields are empty. Please verify and try again.');
			}else{
				var target = $('#casing_number').val();
				var last_target = parseInt(target) - 1;
				if(last_target > 0){
					//VALIDATE THE OD IS LESS THAN THE OD OF THE LAST SELECTED CASING
					if(parseFloat($('#casing_tool_'+last_target+' .od').val()) <= parseFloat($('#pickcasing_od').val())){
						alert('The OD in this tool cannot be greater than the OD in the last selected tool');
					}else{
						var new_casing = parseInt(target) + 1;
						if(parseFloat($('#pickcasing_top').val()) > parseFloat($('#pickcasing_bottom').val())){
							alert('Top value must be less than bottom value');	
						}else{
							$('#picker_'+target).val($('#pickcasing_type').val());
							$('#casing_tool_'+target+' .od').val($('#pickcasing_od').val());
							$('#casing_tool_'+target+' .od_dummie').val($('#pickcasing_od option:selected').html());
							$('#casing_tool_'+target+' .id').val($('#pickcasing_id').val());
							$('#casing_tool_'+target+' .top').val($('#pickcasing_top').val());
							$('#casing_tool_'+target+' .bottom').val($('#pickcasing_bottom').val());
							$('#casing_tool_'+new_casing).show();
							$('.casingclear').each(function(){
								$(this).hide();
							});
							$('.casingclear','#casing_tool_'+new_casing).show();
							$('#casing_tool_'+target).addClass('active');
							if(new_casing == 8){
								$('#casing_tool_7 .casingclear').show();
							}
							hide_casing_overlay();	
						}
							
					}	
				}else{
					var new_casing = parseInt(target) + 1;
					if(parseFloat($('#pickcasing_top').val()) > parseFloat($('#pickcasing_bottom').val())){
						alert('Top value must be less than bottom value');	
					}else{
						$('#picker_'+target).val($('#pickcasing_type').val());
						$('#casing_tool_'+target+' .od').val($('#pickcasing_od').val());
						$('#casing_tool_'+target+' .od_dummie').val($('#pickcasing_od option:selected').html());
						$('#casing_tool_'+target+' .id').val($('#pickcasing_id').val());
						$('#casing_tool_'+target+' .top').val($('#pickcasing_top').val());
						$('#casing_tool_'+target+' .bottom').val($('#pickcasing_bottom').val());
						$('#casing_tool_'+new_casing).show();
						$('.casingclear').each(function(){
							$(this).hide();
						});
						$('.casingclear','#casing_tool_'+new_casing).show();
						$('#casing_tool_'+target).addClass('active');
						if(new_casing == 8){
							$('#casing_tool_7 .casingclear').show();
						}
						hide_casing_overlay();	
					}
				}
			}

		//CASING NOT FOUND
		}else{
			var eqty = 0;
			$('#createcasing_od').val(mixnumber_to_float($('#createcasing_odfrac').val()));
			$('#table_createcasing input,#table_createcasing select').each(function(){
				if($(this).val() == ''){
					eqty = eqty + 1;
				}
			});

			if(eqty > 0){
				alert('Some fields are empty. Please verify and try again. create');
			}else{
				var data = $('#form_createcasing').serialize();
				$.post('/rest/insert_casing',data,function(r){
					var target = $('#casing_number').val();
					var last_target = parseInt(target) - 1;
					if(last_target > 0){
						if(parseFloat($('#casing_tool_'+last_target+' .od').val()) <= parseFloat($('#createcasing_od').val())){
							alert('The OD in this tool cannot be greater than the OD in the last selected tool');	
						}else{
							var new_casing = parseInt(target) + 1;
							if(parseFloat($('#createcasing_top').val()) > parseFloat($('#createcasing_bottom').val())){
								alert('Top value must be less than bottom value');	
							}else{
								$('#picker_'+target).val($('#createcasing_type').val());
								$('#casing_tool_'+target+' .od_dummie').val($('#createcasing_odfrac').val());
								$('#casing_tool_'+target+' .od').val($('#createcasing_od').val());
								$('#casing_tool_'+target+' .id').val($('#createcasing_id').val());
								$('#casing_tool_'+target+' .top').val($('#createcasing_top').val());
								$('#casing_tool_'+target+' .bottom').val($('#createcasing_bottom').val());
								$('#casing_tool_' + parseInt(target) + 1).show();
								$('#casing_tool_'+new_casing).show();
								$('.casingclear').each(function(){
									$(this).hide();
								});
								$('.casingclear','#casing_tool_'+new_casing).show();
								$('#casing_tool_'+target).addClass('active');
								if(new_casing == 8){
									$('#casing_tool_7 .casingclear').show();
								}
								hide_casing_overlay();	
							}
						}
					}else{
						var new_casing = parseInt(target) + 1;
						if(parseFloat($('#createcasing_top').val()) > parseFloat($('#createcasing_bottom').val())){
							alert('Top value must be less than bottom value');	
						}else{
							$('#picker_'+target).val($('#createcasing_type').val());
							$('#casing_tool_'+target+' .od_dummie').val($('#createcasing_odfrac').val());
							$('#casing_tool_'+target+' .od').val($('#createcasing_od').val());
							$('#casing_tool_'+target+' .id').val($('#createcasing_id').val());
							$('#casing_tool_'+target+' .top').val($('#createcasing_top').val());
							$('#casing_tool_'+target+' .bottom').val($('#createcasing_bottom').val());
							

							$('#casing_tool_'+new_casing).show();
							$('.casingclear').each(function(){
								$(this).hide();	
							});

							$('.casingclear','#casing_tool_' + new_casing).show();
							$('#casing_tool_'+target).addClass('active');

							if(new_casing == 8){
								$('#casing_tool_7 .casingclear').show();
							}
							hide_casing_overlay();	
						}
					}	
				},'json');
			}
		}
	});

	function hide_casing_overlay(){
		var no_option = '<option value="" selected="selected">Select...</option>';
		$('#select_casing_overlay').hide();
		$('#pickcasing_id').html(no_option);
		$('#pickcasing_od').val('');
		$('#pickcasing_type').val('');
		$('#pickcasing_top').val('');
		$('#pickcasing_bottom').val('');
		$('.pick_casing').removeAttr('disabled');
		$('#table_createcasing select,#table_createcasing input').attr('disabled','disabled');
		$('#table_createcasing').hide();
		$('#checkbox_casing_not_found').removeAttr('checked');
		$('#table_pickcasing select,#table_pickcasing input').removeAttr('disabled');
		correr_calculos();
	}

	// HERRAMIENTA DE AGREGAR Y ELIMINAR CASING
	$('#casing_tool_1').show();

	$('a.casingclear').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
		target = target.split('#casingclear_');
		target = target[1];
		
		if($(this).parents('.casing_tool_row').attr('id') !== 'casing_tool_1'){
			$('#casing_tool_'+target).hide().removeClass('active');
		}

		var last_row = target - 1;
		$('a.casingclear','#casing_tool_' + last_row).show();
		$('#casing_tool_'+target+' .pick_casing').val('Select...');
		$('#casing_tool_'+target+' .od,#casing_tool_'+target+' .id,#casing_tool_'+target+' .top,#casing_tool_'+target+' .bottom,#casing_tool_'+target+' .volume, #casing_tool_'+target+' .length').val(0);
		
		correr_calculos();
	});



	//DRILL STRING: ADD ANOTHER
	$('#add_another_drill').click(function(e){
		e.preventDefault();
		if($('.drill_string_pieces .input_error').length == 0){
			var eqty = 0;
			$('.drill_string_pieces').each(function(){
				if($('.odbha',this).val() == '' || parseFloat($('.odbha',this).val()) == 0){
					eqty = eqty + 1;
				}

				if($('.idbha',this).val() == '' || parseFloat($('.idbha',this).val()) == 0){
					eqty = eqty + 1;
				}

				if($('.longbha',this).val() == '' || parseFloat($('.longbha',this).val()) == 0){
					eqty = eqty + 1;
				}
			});

			if(eqty == 0){
				$(this).hide();
				var cantidad_completos 	= 0;
				var cantidad_vacios 	= 0;
				$('.select_drill_string').each(function(){
					if($(this).val() == ''){
						cantidad_vacios = 1;
					}else{
						cantidad_completos 	= cantidad_completos + 1;
					}
				});

				var first_id = $('.select_drill_string').filter(':first').attr('id');
				first_id = first_id.split('select_drill_string_');
				first_id = first_id[1];

				if(typeof cantidad_vacios !== 'undefined'){
					if(cantidad_vacios > 0){
						alert('To add another drill string, please make sure the last one is not empty.');
						$('#add_another_drill').show();
					}else if(cantidad_completos == 9){
						alert('You can have maximum 9 Drill String tools in your system.');
					}else{
						$.post('/rest/new_drill_string_row',{'drillstring_qty' : first_id},function(r){
							$('.drill_string_pieces').prepend(r);
							var new_id = parseInt(first_id) + 1;

							//prepend a new row in the dsmath_tab:exponents table
							var ds_group_preppend = '';
							ds_group_preppend = ds_group_preppend +		'<tr id="ds_group_'+new_id+'">';
			                ds_group_preppend = ds_group_preppend +			'<td class="label_m"><label>ds_'+new_id+'</label></td>';     
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="retbha_'+new_id+'" id="retbha_'+new_id+'" style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="fft_bha_lami_'+new_id+'" id="fft_bha_lami_'+new_id+'" style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="fft_bha_tur_'+new_id+'" id="fft_bha_tur_'+new_id+'" style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="ptpl_'+new_id+'" id="ptpl_'+new_id+'" style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="ptpt_'+new_id+'" id="ptpt_'+new_id+'" style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="laminarlabelbha_'+new_id+'" id="laminarlabelbha_'+new_id+'" style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +		'</tr>';
			                $('#ds_group').prepend(ds_group_preppend);

			                //prepend a new row in the dsmath_tab:bingham table
							var ds_group_preppend = '';
							ds_group_preppend = ds_group_preppend +		'<tr id="bingham_'+new_id+'">';
			                ds_group_preppend = ds_group_preppend +			'<td class="label_m"><label>ds_'+new_id+'</label></td>';
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="veltubbha_'+new_id+'" id="veltubbha_'+new_id+'"  style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" id="velcritbha_'+new_id+'" name="velcritbha_'+new_id+'" style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" id="ptblbha_'+new_id+'" name="ptblbha_'+new_id+'" style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" id="ptbtbha_'+new_id+'" name="ptbtbha_'+new_id+'" style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" id="zbinghamflujobha_'+new_id+'" name="zbinghamflujobha_'+new_id+'" style="width:100px;"></td>';
			                ds_group_preppend = ds_group_preppend +		'</tr>';
			                $('#bingham_group').prepend(ds_group_preppend);

			                $('#add_another_drill').show();
						});
					}
				}
			}else{
				alert('Some fields are empty. Please verify and try again.');
			}		
		}
	});

	//DRILL STRING: REMOVE
	$('.remove_ds').live('click',function(e){
		if(confirm('Are you sure you want to delete this item?\nThis action can\'t be undone.')){
			e.preventDefault();
			var href 	= $(this).attr('href');
			var id 		= href.split('_');
			id 			= id[1];

			if($('.select_drill_string').length > 1){
				$('#row_select_drill_string_' + id + ', #ds_group_' + id + ', #bingham_' + id).remove();	
			}else{
				$('.row_select_drill_string select,.row_select_drill_string input, #ds_group input').val(0);		
			}
			
			correr_calculos();	
		}else{
			return false;
		}
	});

	// POPULAR EL NOMBRE DE LA HERRAMIENTA A LAS TABLAS DE LA HIDRAULICA
	$('.select_drill_string').live('change',function(){
		var id = $(this).attr('id');
		id = id.split('select_drill_string_');
		id = id[1];

		if($(this).val() !== ''){
			$('#bingham_'+id+' label').html($(this).val());	
		}

		if($(this).val() !== ''){
			$('#bingham_'+id+' label,#ds_group_'+id+' label').html($(this).val());	
		}
		
	});

	$('#ds_math input').attr('disabled','disabled');


	/*==========================================================================================================*/
	// 2. OPERATIONAL INFO
	/*==========================================================================================================*/
	
	//CUADRO DE DIALOGO SELECCION DE BOMBAS
	//**************************************************************************************************************************
	$('.pick_pump').focus(function(e){
		e.preventDefault();
		$(this).attr('disabled','disabled');
		var pump_element = $(this).attr('id');
		pump_element = pump_element.split('_');
		pump_element = pump_element[1];
		$('#select_pump_overlay .current_pump_number').html(pump_element);
		$('.rod_row').show();
		$('#select_pump_overlay').show();
	});

	$('#pump_picker_maker').change(function(e){
		e.preventDefault();
		var no_option = '<option value="" selected="selected">Select...</option>';
		if($(this).val() !== ''){	
			var data = {'maker':$(this).val()};
			$.post('/rest/get_pump_types',data,function(r){
				var append_string = no_option;
				$(r).each(function(){
					append_string = append_string + '<option value="'+this.type+'">'+this.type+'</option>';
				});
				$('#pump_picker_type').html(append_string);
			},'json');
		}else{
			$('#pump_picker_type').html(no_option);
			$('#pump_picker_stroke').html(no_option);
			$('#pump_picker_diameter').html(no_option);
			$('#pump_picker_rod').html(no_option);
			$('#pump_picker_model').html(no_option);
			$('#pump_picker_presure').html(no_option);
		}
	});

	$('#pump_picker_type').change(function(e){
		e.preventDefault();
		var no_option = '<option value="" selected="selected">Select...</option>';

		$('#pump_picker_stroke').html(no_option);
		$('#pump_picker_diameter').html(no_option);
		$('#pump_picker_rod').html(no_option);
		$('#pump_picker_model').html(no_option);
		$('#pump_picker_presure').html(no_option);

		if($(this).val() !== ''){
			if($(this).val() == 'TRIPLEX'){
				$('.rod_row').hide();
			}else{
				$('.rod_row').show();	
			}
			var data = {
				'maker'			: $('#pump_picker_maker').val(),
				'type'			: $('#pump_picker_type').val(),
			};	
			$.post('/rest/get_pump_strokelength',data,function(r){
				var append_string = no_option;
				$(r).each(function(){
					append_string = append_string + '<option value="'+this.strokelength+'">'+this.strokefrac+' in</option>';
				});
				$('#pump_picker_stroke').html(append_string);
			},'json');
		}else{
			$('#pump_picker_stroke').html(no_option);
			$('#pump_picker_diameter').html(no_option);
			$('#pump_picker_rod').html(no_option);
			$('#pump_picker_model').html(no_option);
			$('#pump_picker_presure').html(no_option);
		}
	});

	$('#pump_picker_stroke').change(function(e){
		e.preventDefault();
		$('#pump_picker_diameter').html(no_option);
		$('#pump_picker_rod').html(no_option);
		$('#pump_picker_model').html(no_option);
		$('#pump_picker_presure').html(no_option);

		var no_option = '<option value="" selected="selected">Select...</option>';
		if($(this).val() !== ''){	
			var data = {
				'maker'			: $('#pump_picker_maker').val(),
				'type'			: $('#pump_picker_type').val(),
				'strokelength'	: $('#pump_picker_stroke').val(),
			};
			$.post('/rest/get_pump_linerdiameter',data,function(r){
				var append_string = no_option;
				$(r).each(function(){
					append_string = append_string + '<option value="'+this.linerdiameter+'">'+this.linerdiameter_frac+' in</option>';
				});
				$('#pump_picker_diameter').html(append_string);
			},'json');
		}else{
			$('#pump_picker_diameter').html(no_option);
			$('#pump_picker_rod').html(no_option);
			$('#pump_picker_model').html(no_option);
			$('#pump_picker_presure').html(no_option);
		}
	});

	$('#pump_picker_diameter').change(function(e){
		e.preventDefault();
		var no_option = '<option value="" selected="selected">Select...</option>';
		$('#pump_picker_rod').html(no_option);
		$('#pump_picker_model').html(no_option);
		$('#pump_picker_presure').html(no_option);

		if($(this).val() !== ''){	
			var data = {
				'maker'			: $('#pump_picker_maker').val(),
				'type'			: $('#pump_picker_type').val(),
				'strokelength'	: $('#pump_picker_stroke').val(),
				'linerdiameter'	: $('#pump_picker_diameter').val()
			};

			if($('#pump_picker_type').val() == 'TRIPLEX'){
				var post_resource = '/rest/get_pump_model';	
			}else{
				var post_resource = '/rest/get_pump_rod';
			}
			

			$.post(post_resource,data,function(r){
				var append_string = no_option;
				$(r).each(function(){
					if(this.rod !== null){
						if($('#pump_picker_type').val() == 'TRIPLEX'){
							append_string = append_string + '<option value="'+this.modelo+'">'+this.modelo+'</option>';	
						}else{
							append_string = append_string + '<option value="'+this.rod+'">'+this.rodfrac+' in</option>';
						}
					}			
				});

				if($('#pump_picker_type').val() == 'TRIPLEX'){
					$('#pump_picker_model').html(append_string);
				}else{
					$('#pump_picker_rod').html(append_string);		
				}
			
			},'json');
		}else{
			$('#pump_picker_rod').html(no_option);
			$('#pump_picker_model').html(no_option);
			$('#pump_picker_presure').html(no_option);
		}
	});

	$('#pump_picker_rod').change(function(e){
		e.preventDefault();
		var no_option = '<option value="" selected="selected">Select...</option>';
		$('#pump_picker_model').html(no_option);
		$('#pump_picker_presure').html(no_option);
		
		if($(this).val() !== ''){	
			var data = {
				'maker'			: $('#pump_picker_maker').val(),
				'type'			: $('#pump_picker_type').val(),
				'strokelength'	: $('#pump_picker_stroke').val(),
				'linerdiameter'	: $('#pump_picker_diameter').val(),
				'rod'			: $('#pump_picker_rod').val()
			};
			$.post('/rest/get_pump_model',data,function(r){
				var append_string = no_option;
				$(r).each(function(){
					append_string = append_string + '<option value="'+this.modelo+'">'+this.modelo+'</option>';
				});
				$('#pump_picker_model').html(append_string);
			},'json');
		}else{
			$('#pump_picker_model').html(no_option);
			$('#pump_picker_presure').html(no_option);
		}
	});

	$('#pump_picker_model').change(function(e){
		e.preventDefault();
		var no_option = '<option value="" selected="selected">Select...</option>';
		$('#pump_picker_presure').html(no_option);
		if($(this).val() !== ''){
			
			if($('#pump_picker_type').val() == 'TRIPLEX'){
				var data = {
					'maker'			: $('#pump_picker_maker').val(),
					'type'			: $('#pump_picker_type').val(),
					'strokelength'	: $('#pump_picker_stroke').val(),
					'linerdiameter'	: $('#pump_picker_diameter').val(),
					'modelo'		: $('#pump_picker_model').val()
				};
			}else{
				var data = {
					'maker'			: $('#pump_picker_maker').val(),
					'type'			: $('#pump_picker_type').val(),
					'strokelength'	: $('#pump_picker_stroke').val(),
					'linerdiameter'	: $('#pump_picker_diameter').val(),
					'rod'			: $('#pump_picker_rod').val(),
					'modelo'		: $('#pump_picker_model').val()
				};
			}

			$.post('/rest/get_pump_pression',data,function(r){
				var append_string = no_option;
				$(r).each(function(){
					append_string = append_string + '<option value="'+this.presion+'">'+this.presion+' psi</option>';
				});
				$('#pump_picker_presure').html(append_string);
			},'json');
		}else{
			$('#pump_picker_presure').html(no_option);
		}
	});

	//SELECT O CREATE PUMP
	$('#checkbox_pump_not_found').change(function(){
		if($(this).attr('checked') == 'checked'){
			$('#table_pump_picker select').attr('disabled','disabled');
			$('#table_pump_creator select,#table_pump_creator input').removeAttr('disabled');
			$('#table_pump_creator').show();
		}else{
			$('#table_pump_picker select').removeAttr('disabled');
			$('#table_pump_creator select,#table_pump_creator input').attr('disabled','disabled');
			$('#table_pump_creator').hide();
		}
	});

	//PUMP PICKER: CANCEL OVERLAY
	$('#select_pump_overlay a.cancel_overlay').click(function(e){
		e.preventDefault();
		var no_option = '<option value="" selected="selected">Select...</option>';
		$('#pump_picker_maker').val('');
		$('#pump_picker_type').html(no_option);
		$('#pump_picker_stroke').html(no_option);
		$('#pump_picker_diameter').html(no_option);
		$('#pump_picker_rod').html(no_option);
		$('#pump_picker_model').html(no_option);
		$('#pump_picker_presure').html(no_option);
		$('#select_pump_overlay').hide();

		var pump_number = parseInt($('#select_pump_overlay .current_pump_number').html());
		$('#pump_'+pump_number+'_maker').removeAttr('disabled');
		$('#select_pump_overlay .current_pump_number').html('');

		if($('#checkbox_pump_not_found:checked').length == 1){
			$('#checkbox_pump_not_found').removeAttr('checked');
			$('#new_pump_form input').val('');
			$('#new_pump_form select').val('');
			$('#table_pump_creator').hide();
		}
	});

	//PUMP PICKER: CONTINUE
	$('#btn_pump_selected').click(function(e){
		e.preventDefault();
		if($('#checkbox_pump_not_found:checked').length == 1){
			var current_action = 'creating_pump';
		}else{
			var current_action = 'selecting_pump';
		}

		if(current_action == 'selecting_pump'){
			var error_qty = 0;
			$('#table_pump_picker select').each(function(){
				if($(this).val() == ''){
					error_qty = error_qty + 1;
				}
			});

			log(error_qty);

			if($('#pump_picker_type').val() == 'TRIPLEX'){
				if(error_qty == 1){
					var pump_continue = true;
				}else if(error_qty > 1){
					var pump_continue = false;
				}
			}else{
				if(error_qty > 0 && error_qty < 7){
					var pump_continue = false;
				}else if(error_qty == 7){
					var pump_continue = 'clear';
				}else{
					var pump_continue = true;
				}
			}

			//bajar los datos al formulario
			if(pump_continue == true){
				log('bajando datos...');

				//bajada de datos
				var pump_number = parseInt($('#select_pump_overlay .current_pump_number').html());
				$('#pump_'+pump_number+'_maker').val($('#pump_picker_maker').val());
				$('#pump_'+pump_number+'_type').val($('#pump_picker_type').val());
				$('#pump_'+pump_number+'_stroke').val($('#pump_picker_stroke').val());
				$('#pump_'+pump_number+'_diameter').val($('#pump_picker_diameter').val());
		
				var stroke_dummie = $('#pump_picker_stroke option:selected').html();
				stroke_dummie = stroke_dummie.split(' in');
				stroke_dummie = stroke_dummie[0];
				$('#pump_'+pump_number+'_stroke_dummie').val(stroke_dummie);
				
				var diameter_dummie = $('#pump_picker_diameter option:selected').html();
				diameter_dummie = diameter_dummie.split(' in');
				diameter_dummie = diameter_dummie[0];
				$('#pump_'+pump_number+'_diameter_dummie').val(diameter_dummie);
				
				if($('#pump_picker_type').val() == 'TRIPLEX'){
					$('#pump_'+pump_number+'_rod').val(0);
					$('#pump_'+pump_number+'_rod_dummie').val(0);
				}else{
					$('#pump_'+pump_number+'_rod').val($('#pump_picker_rod').val());

					var rod_dummie = $('#pump_picker_rod option:selected').html();
					rod_dummie = rod_dummie.split(' in');
					rod_dummie = rod_dummie[0];
					$('#pump_'+pump_number+'_rod_dummie').val(rod_dummie);
				}
				
				$('#pump_'+pump_number+'_model').val($('#pump_picker_model').val());
				$('#pump_'+pump_number+'_presure').val($('#pump_picker_presure').val());
			
				//reset select pump
				var no_option = '<option value="" selected="selected">Select...</option>';
				$('#pump_picker_maker').val('');
				$('#pump_picker_type').html(no_option);
				$('#pump_picker_stroke').html(no_option);
				$('#pump_picker_diameter').html(no_option);
				$('#pump_picker_rod').html(no_option);
				$('#pump_picker_model').html(no_option);
				$('#pump_picker_presure').html(no_option);
				$('#select_pump_overlay .current_pump_number').html('');
				
				//reset create pump
				$('#table_pump_creator input').val('');
				$('#table_pump_creator select[name="type"]').val('DUPLEX');
				$('#new_pump_form input[name="rodfrac"]').addClass('required');	
				$('.new_pump_rod_tr').show();
				$('#table_pump_picker select').removeAttr('disabled');
				$('#table_pump_creator select,#table_pump_creator input').attr('disabled','disabled');
				$('#table_pump_creator').hide();
				$('#select_pump_overlay').hide();
				$('#pump_'+pump_number+'_maker').removeAttr('disabled');

			//limpiar el formulario
			}else if(pump_continue == 'clear'){
				log('limpiando formulario...');

				var pump_number = parseInt($('#select_pump_overlay .current_pump_number').html());
				$('#pump_'+pump_number+'_maker').val('');
				$('#pump_'+pump_number+'_type').val('');
				$('#pump_'+pump_number+'_stroke').val('');
				$('#pump_'+pump_number+'_diameter').val('');
				$('#pump_'+pump_number+'_stroke_dummie').val('');
				$('#pump_'+pump_number+'_diameter_dummie').val('');
				
				if($('#pump_picker_type').val() == 'TRIPLEX'){
					$('#pump_'+pump_number+'_rod').val('');
					$('#pump_'+pump_number+'_rod_dummie').val('');
				}else{
					$('#pump_'+pump_number+'_rod').val('');
					$('#pump_'+pump_number+'_rod_dummie').val('');
				}
				
				$('#pump_'+pump_number+'_model').val('');
				$('#pump_'+pump_number+'_presure').val('');
			
				//reset select pump
				var no_option = '<option value="" selected="selected">Select...</option>';
				$('#pump_picker_maker').val('');
				$('#pump_picker_type').html(no_option);
				$('#pump_picker_stroke').html(no_option);
				$('#pump_picker_diameter').html(no_option);
				$('#pump_picker_rod').html(no_option);
				$('#pump_picker_model').html(no_option);
				$('#pump_picker_presure').html(no_option);
				$('#select_pump_overlay .current_pump_number').html('');
				
				//reset create pump
				$('#table_pump_creator input').val('');
				$('#table_pump_creator select[name="type"]').val('DUPLEX');
				$('#new_pump_form input[name="rodfrac"]').addClass('required');	
				$('.new_pump_rod_tr').show();
				$('#table_pump_picker select').removeAttr('disabled');
				$('#table_pump_creator select,#table_pump_creator input').attr('disabled','disabled');
				$('#table_pump_creator').hide();
				$('#select_pump_overlay').hide();
				$('#pump_'+pump_number+'_maker').removeAttr('disabled');

			//faltan datos
			}else{
				alert('Some fields are empty. Please verify and try again.');
			}
		}else if(current_action == 'creating_pump'){
			var error_qty = 0;
			$('#new_pump_form .required').each(function(){
				if($(this).val() == ''){
					error_qty = error_qty + 1;
				}
			});

			if(error_qty > 0){
				alert('Some fields are empty. Please verify and try again.');
			}else{

				if($('#table_pump_creator select[name="type"]').val() == 'TRIPLEX'){
					var no_sintax_problem = mixnumber_to_float($('#table_pump_creator input[name="strokefrac"]').val()) && mixnumber_to_float($('#table_pump_creator input[name="linerdiameter_frac"]').val());
				}else if($('#table_pump_creator select[name="type"]').val() == 'DUPLEX'){
					var no_sintax_problem = mixnumber_to_float($('#table_pump_creator input[name="strokefrac"]').val()) && mixnumber_to_float($('#table_pump_creator input[name="linerdiameter_frac"]').val()) && mixnumber_to_float($('#table_pump_creator input[name="rodfrac"]').val());
				}

				if(no_sintax_problem){
					$('#table_pump_creator input[name="strokelength"]').val(mixnumber_to_float($('#table_pump_creator input[name="strokefrac"]').val()));
					$('#table_pump_creator input[name="linerdiameter"]').val(mixnumber_to_float($('#table_pump_creator input[name="linerdiameter_frac"]').val()));
					$('#table_pump_creator input[name="rod"]').val(mixnumber_to_float($('#table_pump_creator input[name="rodfrac"]').val()));

					var data = $('#new_pump_form').serialize();
						
					$.post('/rest/insert_pump',data,function(r){
						var pump_number = parseInt($('#select_pump_overlay .current_pump_number').html());
						$('#pump_'+pump_number+'_maker').val($('#table_pump_creator input[name="maker"]').val());
						$('#pump_'+pump_number+'_type').val($('#table_pump_creator select[name="type"]').val());
						$('#pump_'+pump_number+'_stroke').val($('#table_pump_creator input[name="strokelength"]').val());
						$('#pump_'+pump_number+'_diameter').val($('#table_pump_creator input[name="linerdiameter"]').val());

						$('#pump_'+pump_number+'_stroke_dummie').val($('#table_pump_creator input[name="strokefrac"]').val());
						$('#pump_'+pump_number+'_diameter_dummie').val($('#table_pump_creator input[name="linerdiameter_frac"]').val());
						
						if($('#table_pump_creator select[name="type"]').val() == 'TRIPLEX'){
							$('#pump_'+pump_number+'_rod').val(0);
							$('#pump_'+pump_number+'_rod_dummie').val(0);
						}else{
							$('#pump_'+pump_number+'_rod').val($('#table_pump_creator input[name="rod"]').val());
							$('#pump_'+pump_number+'_rod_dummie').val($('#table_pump_creator input[name="rodfrac"]').val());
						}
						
						$('#pump_'+pump_number+'_model').val($('#table_pump_creator input[name="modelo"]').val());
						$('#pump_'+pump_number+'_presure').val($('#table_pump_creator input[name="presion"]').val());

						//reset select pump
						var no_option = '<option value="" selected="selected">Select...</option>';
						$('#pump_picker_maker').val('');
						$('#pump_picker_type').html(no_option);
						$('#pump_picker_stroke').html(no_option);
						$('#pump_picker_diameter').html(no_option);
						$('#pump_picker_rod').html(no_option);
						$('#pump_picker_model').html(no_option);
						$('#pump_picker_presure').html(no_option);
						$('#select_pump_overlay .current_pump_number').html('');
						$('#checkbox_pump_not_found:checked').removeAttr('checked');
						
						//reset create pump
						$('#table_pump_creator input').val('');
						$('#table_pump_creator select[name="type"]').val('DUPLEX');
						$('#new_pump_form input[name="rodfrac"]').addClass('required');	
						$('.new_pump_rod_tr').show();
						$('#table_pump_picker select').removeAttr('disabled');
						$('#table_pump_creator select,#table_pump_creator input').attr('disabled','disabled');
						$('#table_pump_creator').hide();
						$('#checkbox_pump_not_found:checked').removeAttr('checked');					

						$('#select_pump_overlay').hide();
						$('#pump_'+pump_number+'_maker').removeAttr('disabled');

						$('#eff_'+pump_number).focus();
						correr_calculos();	
					},'json');
				}else{
					alert('There are some sintax errors. Please verify and try again.');
				}
			}
		}
	});

	$('#new_pump_form select[name="type"]').change(function(e){
		e.preventDefault();
		if($(this).val() == 'DUPLEX'){
			$('#new_pump_form input[name="rodfrac"]').addClass('required');	
			$('.new_pump_rod_tr').show();
		}else if($(this).val() == 'TRIPLEX'){
			$('.new_pump_rod_tr').hide();
			$('#new_pump_form input[name="rodfrac"]').removeClass('required');
		}else{
			$('#new_pump_form input[name="rodfrac"]').removeClass('required');	
			$('.new_pump_rod_tr').show();	
		}
	});



	//CUADRO DE DIALOGO 'SELECCION DE BROCA'
	$('.pick_bit').focus(function(){
		$('#select_bit_overlay').show();
		$(this).attr('disabled','disabled');
	});

	$('#bit_overlay_listabrocas').change(function(){
		var no_option = '<option value="" selected="selected">Select...</option>';
		if($(this).val() == ''){
			$('#bit_overlay_listaods,#bit_overlay_listamodelos').html(no_option);
		}else{
			var data = 'id_broca=' + $(this).val();
			$.post('/rest/listar_diametros_broca',data,function(r){
				var append_string = no_option;
				$(r).each(function(){
					append_string = append_string + '<option value="' + this.odddeci + '">' + this.odfracc + ' ' + this.unit_oddfracc + '</option>';
				});

				$('#bit_overlay_listaods').html(append_string);

			},'json');
		}
	});

	$('#bit_overlay_listaods').change(function(){
		var no_option = '<option value="" selected="selected">Select...</option>';
		if($(this).val() == ''){
			$('#bit_overlay_listamodelos').html(no_option);
		}else{
			var data = 'id_broca=' + $('#bit_overlay_listabrocas').val() + '&odddeci=' + $(this).val();
			$.post('/rest/listar_modelos_broca',data,function(r){
				var append_string = no_option;
				$(r).each(function(){
					append_string = append_string + '<option value="' + this.id + '">' + this.nombre_modelo + '</option>';
				});
				$('#bit_overlay_listamodelos').html(append_string);

			},'json');
		}
	});

	$('#checkbox_bit_not_found').change(function(){
		if($(this).attr('checked') == 'checked'){
			$('#table_bit_picker select,#table_bit_picker input').attr('disabled','disabled');
			$('#table_bit_creator select,#table_bit_creator input').removeAttr('disabled');
			$('#table_bit_creator').show();
		}else{
			$('#table_bit_picker select,#table_bit_picker input').removeAttr('disabled');
			$('#table_bit_creator select,#table_bit_creator input').attr('disabled','disabled');
			$('#table_bit_creator').hide();
		}
	});

	$('#select_bit_overlay .cancel_link a').click(function(e){
		e.preventDefault();
		var no_option = '<option value="" selected="selected">Select...</option>';
		$('#bit_overlay_listaods,#bit_overlay_listamodelos').html(no_option);
		$('#select_bit_overlay').hide();
		$('.pick_bit').removeAttr('disabled');
		$('.jets_number').focus();
	});

	$('#btn_bit_selected').click(function(e){
		e.preventDefault();
		
		//CREATE A NEW BIT
		if($('#checkbox_bit_not_found:checked').length == 1){
			var od 		= $('#new_bit_form input[name=odfracc]').val();
			od 			= od.split(' ');
			if(od.length !== 2){
				if(parseInt($('#new_bit_form input[name=odfracc]').val()) == NaN){
					alert('Existe un error en la sintaxis del OD, por favor verifique e intente de nuevo.');	
				}else{
					$('#new_bit_form input[name=odddeci]').val($('#new_bit_form input[name=odfracc]').val());
				}	
			}else{
				var int_part 	= od[0];
				var real_part 	= od[1];
				var real_part	= real_part.split('/');
				if(real_part.length !== 2){
					alert('Existe un error en la sintaxis del OD, por favor verifique e intente de nuevo.');	
				}else{
					if(real_part[1].length > 0){
				        var decimal_part 	= parseInt(real_part[0])/parseInt(real_part[1]);
    					var decimal_od 		= parseInt(int_part) + decimal_part;
    					$('#new_bit_form input[name=odddeci]').val(decimal_od);    
					}else{
					    alert('Existe un error en la sintaxis del OD, por favor verifique e intente de nuevo.');   
					}
				}
			}

			
			var error_qty = 0;
			$('#new_bit_form .required').each(function(){
				if($(this).val() == ''){
					error_qty = error_qty + 1;
				}
			});

			if(error_qty > 0){
				alert('Hay campos incompletos en el formulario de creación de brocas.\nPor favor verifique e intente de nuevo.');
			}else{
				var data = $('#new_bit_form').serialize();
				$.post('/rest/insertar_broca',data,function(r){
					var bit_type = parseInt($('#bit_overlay_listabrocas_new').val());
					if(bit_type == 1){
						var bit_type_label = 'PDC';
					}else if(bit_type == 2){
						var bit_type_label = 'TRI-CONE';
					}else if(bit_type == 3){
						var bit_type_label = 'BI-CENTRIC';
					}
					$('#broca_bit_type').val(bit_type_label);
					$('#broca_bit_diameter').html($('#odfracc_new').val()+' in');
					$('#broca_bit_model').html($('#nombre_modelo_new').val());
					$('#broca_bit_oddeci').val($('#new_bit_form input[name=odddeci]').val());
					$('#broca_bit_model_id').val(r);
					hide_bit_overlay();
				},'json');	
			}

		//SELECT A BIT FROM THE DROPDOWN SYSTEM
		}else if($('#checkbox_bit_not_found:checked').length == 0){
			var data = 'id=' + $('#bit_overlay_listamodelos').val();
			$.post('/rest/listar_detalle_brocas',data,function(r){
				$('#broca_bit_type').val(r[0].nombre_broca);
				$('#broca_bit_diameter').html(r[0].odfracc+' in');
				$('#broca_bit_model').html(r[0].nombre_modelo);
				$('#broca_bit_oddeci').val(r[0].odddeci);
				$('#broca_bit_model_id').val(r[0].id);
				hide_bit_overlay();
			},'json');

		}
	});

	function hide_bit_overlay(){
		var no_option = '<option value="" selected="selected">Select...</option>';
		$('#bit_overlay_listaods,#bit_overlay_listamodelos').html(no_option);
		$('#bit_overlay_listabrocas,#bit_overlay_listabrocas_new').val('');
		$('#odfracc_new,#nombre_modelo_new,#new_bit_form input[name=odddeci],#new_bit_form input[name=length]').val('');
		$('#checkbox_bit_not_found:checked').removeAttr('checked');
		$('#table_bit_picker select,#table_bit_picker input').removeAttr('disabled');
		$('#table_bit_creator select,#table_bit_creator input').attr('disabled','disabled');
		$('#table_bit_creator').hide();
		$('#select_bit_overlay').hide();
		$('.pick_bit').removeAttr('disabled');
		$('#j_1').focus();
		correr_calculos();	
	}	

	/*==========================================================================================================*/
	// 3. MUD PROPERTIES
	/*==========================================================================================================*/
	
	// MUD TYPE PICKER
	$('.pick_mud').focus(function(e){
		e.preventDefault();
		$('#select_mud_overlay').show();
		$(this).attr('disabled','disabled');
	});

	$('#checkbox_mud_not_found').change(function(){
		if($(this).attr('checked') == 'checked'){
			$('#table_mud_picker select').attr('disabled','disabled');
			$('#table_mud_creator input').removeAttr('disabled');
			$('#table_mud_creator').show();
		}else{
			$('#table_mud_picker select').removeAttr('disabled');
			$('#table_mud_creator input').attr('disabled','disabled');
			$('#table_mud_creator').hide();
		}

	});

	$('#select_mud_overlay .cancel_link a').click(function(e){
		e.preventDefault();
		$('#checkbox_mud_not_found').removeAttr('checked');
		$('#new_mud_form input').val('');
		$('#table_mud_picker select').val('');;
		$('#select_mud_overlay').hide();
		$('.pick_mud').removeAttr('disabled');
		$('#table_mud_picker select').removeAttr('disabled');
		$('#table_mud_creator').hide();	
	});

	$('#btn_mud_selected').click(function(e){
		e.preventDefault();
		if($('#checkbox_mud_not_found:checked').length == 1){
			var error_qty = 0;
			$('#new_mud_form input').each(function(){
				if($(this).val() == ''){
					error_qty = error_qty + 1;
				}
			});

			if(error_qty > 0){
				alert('Some fields are empty, please verify and try again');
			}else{
				var data = $('#new_mud_form').serialize();
				$.post('/rest/insert_mud',data,function(r){
					$('.pick_mud').val($('#new_mud_form input').val());	
					$('#checkbox_mud_not_found').removeAttr('checked');
					$('#new_mud_form input').val('');
					$('#table_mud_picker select').val('');
					$('#table_mud_picker select').removeAttr('disabled');
					$('#select_mud_overlay').hide();
					$('.pick_mud').removeAttr('disabled');
					$('#table_mud_creator').hide();	
				},'json');
			}
		}else{
			$('.pick_mud').val($('#table_mud_picker select').val());		
			$('#checkbox_mud_not_found').removeAttr('checked');
			$('#new_mud_form input').val('');
			$('#table_mud_picker select').val('');
			$('#table_mud_picker select').removeAttr('disabled');
			$('#select_mud_overlay').hide();
			$('.pick_mud').removeAttr('disabled');
			$('#table_mud_creator').hide();	
		}

	});

		//clocks
	$('.clock_1,.clock_2,.clock_3').change(function(){
		var this_class = $(this).attr('class');
		var new_hour = $(this).val();
		$('.'+this_class+'_label').html(new_hour);
	});


	//drilling_time_select
	$('.drilling_time_select').change(function(){
		if($(this).val() !== ''){
			var current_val = $(this).val();
			error_qty = 0;
			var current_id = $(this).attr('id');
			$('.drilling_time_select').each(function(){
				if(current_id !== $(this).attr('id')){
					if($(this).val() == current_val){
						error_qty = error_qty + 1;
					}	
				}
			});

			if(error_qty > 0){
				alert('This activity is already selected.\nPlease select another one.');
				$(this).val('');
			}
		}
	});

	/*==========================================================================================================*/
	// 4. CONTROL SOLIDS EQUIPEMENT
	/*==========================================================================================================*/
	
	//CENTRIFUGAS
	$('#show_cp_1').click(function(e){
		e.preventDefault();
		if($(this).hasClass('open')){
			$('#centrifuge_1_properties').hide();
			$(this).removeClass('open').html('Show centrifuge properties');
		}else{
			$('#centrifuge_1_properties').show();
			$(this).addClass('open').html('Hide centrifuge properties');
		}
	});

	$('#show_cp_2').click(function(e){
		e.preventDefault();
		if($(this).hasClass('open')){
			$('#centrifuge_2_properties').hide();
			$(this).removeClass('open').html('Show centrifuge properties');
		}else{
			$('#centrifuge_2_properties').show();
			$(this).addClass('open').html('Hide centrifuge properties');
		}
	});

	/*==========================================================================================================*/
	// 5. PERSONAL
	/*==========================================================================================================*/
	
	$('.this_enginer').change(function(){
		if($(this).val() !== ''){
			var id_this_row 	= $(this).attr('id');
				id_this_row 	= id_this_row.split('this_enginer_');
				id_this_row 	= id_this_row[1];

			var enginer 		= $(this).val();
			var enginer_cost 	= $('#this_person_'+enginer+' input[name="rate"]').val();
			$('#this_enginer_cost_'+id_this_row).val(enginer_cost);

			eqty = 0;
			$('.this_enginer').each(function(){
				if($(this).val() == enginer){
					eqty = eqty + 1;
				}
			});

			if(eqty > 1){
				alert('This enginer is already selected. Please select a different one.');
				$(this).val('');
				return false;
			}
		}
	});

	/*==========================================================================================================*/
	// 6. INVENTARY
	/*==========================================================================================================*/
	/*==========================================================================================================*/
	// 7. VOLUMES
	/*==========================================================================================================*/
	/*==========================================================================================================*/
	// 8. REPORT HISTORY
	/*==========================================================================================================*/
	/*==========================================================================================================*/
	// 9. REQUISITIONS
	/*==========================================================================================================*/
	/*==========================================================================================================*/
	// 1O. PERSONAL REGISTRATION TOOL
	/*==========================================================================================================*/
	
	//open the overlay
	$('.show_register_dialog').click(function(e){
		e.preventDefault();
		$('#registration_overlay input[name="date"]').val(new Date().toISOString().slice(0, 10));
		$('#registration_overlay').show();
	});

	//close the overlay on cancel
	$('#registration_overlay .close_link').click(function(e){
		e.preventDefault();
		$('#registration_form input').val('');
		$('#registration_form select').val('');
		$('#registration_overlay').hide();
	});

	//Register button
	$('#register_btn').click(function(e){
		e.preventDefault();
		var error_qty = 0;
		
		$('#registration_form input').each(function(){
			if($(this).val() == ''){
				error_qty = error_qty + 1;
			}
		});

		$('#registration_form select').each(function(){
			if($(this).val() == ''){
				error_qty = error_qty + 1;
			}
		});

		if(error_qty > 0){
			alert('Some fields are empty. Please verify and try again.');
		}else{
			var data = {
				project 		: $('#registration_form input[name="project"]').val(),
				identification	: $('#registration_form input[name="identification"]').val(),
				date			: $('#registration_form input[name="date"]').val()
			};

			if($('#registration_form input[name="cover"]:checked').length == 1){
				data.cover = 1
			}else{
				data.cover = 0	
			}

			$.post('/rest/register_enginer',data,function(r){
				if(r.message == 'no_enginer'){
					alert('There is no enginer with this identification working on the project.');
					$('#registration_form input[name="identification"]').val('');
					$('#registration_form select').val('');
				}else if(r.message == 'already_registered'){
					alert(r.enginer + ' is already registered in this date.');
					$('#registration_form input[name="identification"]').val('');
					$('#registration_form select').val('');
				}else if(r.message == 'success'){	
					alert(r.enginer + ' has been sucessfully registered on ' + r.timestamp);
					$('#registration_form input[name="identification"]').val('');
					$('#registration_form select').val('');
					$('#registration_overlay').hide();
					correr_calculos();
				}
			},'json');
		}
	});
	
});
/****** THE END ******/