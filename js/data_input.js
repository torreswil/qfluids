/* Qfluids - Data Input Module */
/* jose.paternina@desarrollo22.com */
/* Creado por Desarrollo 22 para Qmax Colombia LTDA */
/* Copyright - 2012 */

$(function(){

	/*==========================================================================================================*/
	// INIT FUNCTIONS
	/*==========================================================================================================*/
	//materials
	load_materials_status();
	load_ac_status();
	load_current_concentrations();
	load_tank_status();
	load_today_consumptions();
	step_by_step_mvc();
        
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

    //add casing button
    $('#btn_add_casing').click(function(e){
    	e.preventDefault();
    	if(fval('md') <= 0){
			alert('To place Casign, first verify the open hole is greater than 0');
		}else{
			var casing_qty = $('#casing_table tbody tr').length;
			if(casing_qty == 7){
				alert('You can only place 7 casing tools.');
			}else{
				$('#select_casing_overlay').show();	
			}
		}
    });


	//CUADRO DE DIALOGO SELECCION DE CASING
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
        
    //Consulta el ID de según los campos seleccionados
    $('#pickcasing_id').change(function(e){
        var data = {
            'oddeci'		: $('#pickcasing_od').val(),
            'iddeci'        : $(this).val(),                        
            'project_id'    : $('#project_id').val()
        };
        $.post('/rest/get_casing',data,function(r){                                                     
                $("#pickcasing_selected_id").val(r[0].id);
        }, 'json');		
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

		//cuantos revestidores existen e información del ultimo revestidor creado
		var csgqty  = $('#casing_table tbody tr').length;
		if(csgqty !== 0){
			var lastcsg = $('#casing_tool_'+csgqty);
			var lastcsg_data = {
				'name'			: $('#picker_'+csgqty).val(),
				'od'			: fval('odcsg_'+csgqty),
				'od_dummie'		: $('#od_dummie_'+csgqty).val(),
				'id'			: fval('idcsg_'+csgqty),
				'top'			: fval('topcsg_'+csgqty),
				'bottom'		: fval('bottomcsg_'+csgqty),
				'capacity'		: fval('volcsg_'+csgqty),
				'len'			: fval('longcsg_'+csgqty),
				'zrrange_top' 	: fval('zrrange_top'+csgqty),
				'zrrange_btm' 	: fval('zrrange_btm'+csgqty)
			}			
		}else{
			lastcsg 		= false;
			lastcsg_data 	= false;
		}
 		
 		log(lastcsg_data);
				
		//CASING FOUND
		if($('#checkbox_casing_not_found:checked').length == 0){
			
			var eqty = 0;
			$('#form_pickcasing .required').each(function(){
				if($(this).val() == ''){
					eqty = eqty + 1;
				}
			});

			if(eqty > 0){
				alert('All fields are required.');
			}else{
				//armar el paquete de datos que se va al front
				var newcsg = {
					'cid'			: $('#pickcasing_selected_id').val(),
					'name'			: $('#pickcasing_type').val(),
					'od'			: fval('pickcasing_od'),
					'od_dummie'		: $('#pickcasing_od option:selected').html(),
					'id'			: fval('pickcasing_id'),
					'top'			: fval('pickcasing_top'),
					'bottom'		: fval('pickcasing_bottom')
				}

				if(lastcsg_data != false){
					//validar el diametro del tubo
					if(newcsg.od >= lastcsg_data.id){
						alert('The internal diameter cannot be equal or greater than the external diameter of the last selected tool.');
					}else{
						var top_validation = false;
						
						//validar que el tope de la herramienta este acorde al montaje
						if(newcsg.name == 'Liner'){
							if(newcsg.top > lastcsg_data.bottom){
								alert('The top value cannot be greater than the bottom of the last selected tool.');
							}else{
								top_validation = true;
							}
						}else{
							top_validation = true;
						}

						if(top_validation == true){

							//all validations passed, proceed	
							append_casing_to_dom(newcsg);
							hide_casing_overlay();
						
						}else{
							return false;
						}
					}					
				}else{
					//all validations passed, proceed	
					append_casing_to_dom(newcsg);
					hide_casing_overlay();	
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
                    $('#picker_id_'+target).val(r);
				},'json');
			}
		}
	});

	function append_casing_to_dom(data){
		
		var id = $('#casing_table tbody tr').length + 1;
		var html = ''
		 	html = html + '<tr id="casing_tool_'+id+'" class="casing_tool_row active" style="display: table-row;">';
            html = html + '   <td>';
            html = html + '       <input type="text" value="'+data.name+'" id="picker_'+id+'" style="width:100px;margin-right:0;" class="pick_casing" disabled="disabled" />';
            html = html + '       <input type="hidden" value="'+data.cid+'"  id="picker_id_'+id+'" class="pick_casing_id" />';
            html = html + '   </td>';
            html = html + '   <td>';
            html = html + '       <input type="hidden" class="od" value="'+data.od+'" name="odcsg_'+id+'" id="odcsg_'+id+'" />';
            html = html + '       <input type="text" class="od_dummie" style="width:60px;margin-right:0;" disabled="disabled" value="'+data.od_dummie+'" id="od_dummie_'+id+'" />';
            html = html + '  </td>';
            html = html + '       <td><input type="text" class="id" style="width:60px;margin-right:0;" disabled="disabled" value="'+data.id+'" name="idcsg_'+id+'" id="idcsg_'+id+'" /></td>';
            html = html + '       <td><input type="text" class="top" style="width:60px;margin-right:0;" disabled="disabled" value="'+data.top+'" name="topcsg_'+id+'" id="topscsg_'+id+'" /></td>';
            html = html + '       <td><input type="text" class="bottom" style="width:60px;margin-right:0;" disabled="disabled" value="'+data.bottom+'" name="bottomcsg_'+id+'" id="bottomcsg_'+id+'" /></td>';
            html = html + '       <td><input type="text" class="volume" style="width:60px;margin-right:0;" disabled="disabled" name="volcsg_'+id+'" id="volcsg_'+id+'" /></td>';
            html = html + '   <td>';
            html = html + '       <input type="text" class="length" style="width:60px;margin-right:0;" disabled="disabled" name="longcsg_'+id+'" id="longcsg_'+id+'" />';
            html = html + '       <input type="hidden" class="zrrange_top" id="zrrange_top_'+id+'" name="zrrange_top_'+id+'" disabled="disabled" value="0">';
            html = html + '       <input type="hidden" class="zrrange_btm" id="zrrange_btm_'+id+'" name="zrrange_btm_'+id+'" disabled="disabled" value="0">';
            html = html + '  </td>';
            html = html + '   <td>ELIMINAR</td>';
            html = html + '</tr>';

            $('#casing_table tbody').append(html).parent().slideDown();
            $('#ip_add_casing').slideUp();
            correr_calculos();

	}

	function hide_casing_overlay(){
		var no_option = '<option value="" selected="selected">Select...</option>';
		$('#select_casing_overlay').hide();
		$('#pickcasing_id').html(no_option);
		$('#pickcasing_od').val('');
		$('#pickcasing_type').val('');
		$('#pickcasing_top').val('');
		$('#pickcasing_bottom').val('');
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
		$('#casing_tool_'+target+' .od, #casing_tool_'+target+' .od_dummie, #casing_tool_'+target+' .id,#casing_tool_'+target+' .top,#casing_tool_'+target+' .bottom,#casing_tool_'+target+' .volume, #casing_tool_'+target+' .length').val(0);
                $('#picker_id_'+target).val('');
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
				'type'			: $('#pump_picker_type').val()
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
				'strokelength'	: $('#pump_picker_stroke').val()
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
        
        //Consulta el ID de según los campos seleccionados
        $('#pump_picker_presure').change(function(e){
                var data = {
                        'maker'			: $('#pump_picker_maker').val(),
                        'type'			: $('#pump_picker_type').val(),
                        'strokelength'          : $('#pump_picker_stroke').val(),
                        'linerdiameter'         : $('#pump_picker_diameter').val(),                        
                        'modelo'		: $('#pump_picker_model').val(),
                        'presure'		: $('#pump_presure').val(),
                        'project_id'            : $('#project_id').val()
                };
                $.post('/rest/get_pump',data,function(r){                               
                        $("#pump_picker_selected_id").val(r[0].id);
                }, 'json');		
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
                                $('#pump_'+pump_number+'_maker_id').val($("#pump_picker_selected_id").val());

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
                                                $('#pump_'+pump_number+'_maker_id').val(r);
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
                                $('.pick_mud').val($('#new_mud_form input').val());	
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
                var this_class;
                if($(this).hasClass('clock_1')) {
                        this_class = 'clock_1';
                } else if($(this).hasClass('clock_2')) {
                        this_class = 'clock_2';
                } else {
                        this_class = 'clock_3';
                }		
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
	
	$('.btn_new_transfer').click(function(e){
		e.preventDefault();

		//get the context
		var context = $(this).parents('fieldset');

		//validate there are not general information fields empty
		var eqty = 0;
		$('.general_st_info input',context).each(function(){
			if($(this).val() == ''){
				eqty = eqty + 1;
			}
		});

		if(eqty > 0){
			alert('Some fields are empty. Please verify and try again.');
		}else{
			//init the data object
			var data = {
				code 		: $('.st_number',context).val(),
				origin 		: $('.st_origin',context).val(),
				type 		: 'incoming'
			};

			data.materials 	= [];
			var zeros_qty 	= 0;
			var zeros_limit	= $('.materials_table tr',context).length;

			//proccess the materials table
			$('.materials_table .material_qty',context).each(function(){
				if($(this).val() == ''){
					$(this).val(0);
				}

				if(parseInt($(this).val()) == 0){
					zeros_qty = zeros_qty + 1;
				}
			});

			if(zeros_qty == zeros_limit){
				alert('To register this stock transfer, the quantities need to be greater than 0 in at least one material.');
			}else{
				$('.materials_table .material_qty',context).each(function(){
					var material_id = $(this).attr('id');
						material_id = material_id.split('material_');
						material_id = material_id[1];

					if(parseInt($(this).val()) !== 0){
						var this_material = {
							id 			: material_id,
							quantity	: $(this).val()
						}

						data.materials.push(this_material);
					}
				});

				$.post('/rest_mvc/register_stock_transfer',$.toJSON(data),function(r){
					if(r == true){
						$('.materials_table .material_qty',context).val('');
						$('.general_st_info input',context).val('');
						alert('Stock Transfer registered.');
						load_ac_status();
						load_materials_status();                                                
					}
				},'json');
			}
		}
	});

	function load_materials_status(){  
        var data = {'project_id' : $('#project_id').val()};
        $.post('/rest_mvc/load_materials_status',data,function(r){
        	$('#materials_status_table').html(r);	
        });                      
        //Equipos
        $.post('/rest_mvc/load_equipment_status',data,function(r){
                $('#equipment_status_table').html(r);	
        });   
           
        var project = $('#project_id').val();
        var incoming_list = {
            project_id          : project,
            type                : 'incoming'
        };
        $.post('/rest/load_stock',incoming_list,function(r){			
                $('#incoming_stock_list').html(r);
        });                                                
	} 

	function load_today_consumptions(){
		$('#today_consumptions_table').load('/rest_mvc/load_today_consumptions');
	} 
      
      $('.btn_stock_transfers').click(function(e){
		e.preventDefault();
		$('#stock_transfers_overlay').show();
	});

	$('#stock_transfers_overlay .close_link').click(function(e){              
		e.preventDefault();                        
		$('#stock_transfers_overlay').hide();
	});
            
      $('.btn_outgoing_materials').click(function(e){
		e.preventDefault();
		$('#outgoing_materials_overlay').show();
	});

	$('#outgoing_materials_overlay .close_link').click(function(e){               
		e.preventDefault();                        
		$('#outgoing_materials_overlay').hide();
	});

	/*==========================================================================================================*/
	// 7. VOLUMES
	/*==========================================================================================================*/

	$('.show_n_hide_reserves').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
			target = target.split('toggle_plus_');
			target = target[1];

		if($(this).hasClass('closed')){
			$('.reserve_td').hide();
			$('.reserve_td_'+target).show();
			$(this).removeClass('closed').addClass('opened');	
		}else if($(this).hasClass('opened')){
			$('.reserve_td').hide();
			$(this).removeClass('opened').addClass('closed');	
		}			
	});

	$('.remove_activetank').live('change',function(){
		var check = $(this).attr('checked');
		var id = $(this).attr('id');
			id = id.split('active_tank_');
			id = id[1];

		//tank has been unchecked, move to out of circuit
		if(check == undefined){
			

		//tank is active again, move to the mud circuit
		}else if(check == 'checked'){
			
		}
		correr_calculos();
	});

	$('.mta_link').live('click',function(e){
		e.preventDefault();
		$('#tv_destiny').prepend('<option value="0">Active</option>').val(0).attr('disabled','disabled');
		$('#tv_origin option[value="0"]').remove();
		$('#tv_origin').val('').removeAttr('disabled');
		$('#mtr_overlay h5').html('Transfer mud to Active:');
		$('#tv_volume').val('');

		//traer las concentraciones del activo y ponerlas en la tabla de concentraciones del tanque de destino
		$('.sconcentration').each(function(){
			//obtener el id del material
			var id = $(this).attr('id');
				id = id.split('_');
				id = id[1];

			//el id del destino es 0 porque el destino es activo
			var id_destino = 0;
			$(this).val($('#currentconc_'+id+'_'+id_destino).val());

		});
		$('#mtr_overlay').show();
	});

	$('#mta_overlay .close_link').click(function(e){
		e.preventDefault();
		$('#mta_overlay').hide();
	});

	$('#mta_btn').click(function(e){
		e.preventDefault();
		$('#mta_overlay').hide();	
	});

	$('.mtr_link').live('click',function(e){
		e.preventDefault();
		$('#tv_origin').prepend('<option value="0">Active</option>').val(0).attr('disabled','disabled');
		$('#tv_destiny option[value="0"]').remove();
		$('#tv_destiny').val('').removeAttr('disabled');
		$('#mtr_overlay h5').html('Transfer mud from Active:');
		$('#tv_volume').val('');
		$('.sconcentration').each(function(){
			$(this).val('');
		});
		$('#mtr_overlay').show();
	});

	$('#mtr_overlay .close_link').click(function(e){
		e.preventDefault();
		$('#mtr_overlay').hide();
	});

	$('#tv_destiny').change(function(e){
		log($(this).val());
		e.preventDefault();
		var id_destino = $(this).val();

		//trabajar solo si el tanque existe
		if($('#this_tank_'+id_destino).length > 0){
			$('.sconcentration').each(function(){
				//obtener el id del material
				var id = $(this).attr('id');
					id = id.split('_');
					id = id[1];
				$(this).val($('#currentconc_'+id+'_'+id_destino).val());
			});	
		}

		//si es de una reserva al activo
		if(parseInt($('#tv_destiny').val()) == 0){
			var tanque_origen 	= $('#tv_origin').val();
			var tanque_destino 	= 0;
			var volumen_destino = fval('volfinalact');

		//si es del activo para una reserva
		}else{
			var tanque_origen 	= 0;
			var tanque_destino 	= $('#tv_destiny').val();
			var volumen_destino = fval('volfinal_'+tanque_destino);
		}

		var volumen_transferido = fval('tv_volume');


		$('.sconcentration').each(function(){
			var id = $(this).attr('id');
				id = id.split('_');
				id = id[1];

			var concentracion_origen 	= fval('currentconc_'+id+'_'+tanque_origen);
			var concentracion_destino 	= fval('currentconc_'+id+'_'+tanque_destino);

			var concentracion = (volumen_transferido * concentracion_origen + volumen_destino * concentracion_destino) / (volumen_transferido + volumen_destino);
			completar_campo_val($(this).attr('id'),concentracion.toFixed(2));
		});

	});

	$('#tv_volume').keyup(function(e){
		e.preventDefault();

		//si es de una reserva al activo
		if(parseInt($('#tv_destiny').val()) == 0){
			var tanque_origen 	= $('#tv_origin').val();
			var tanque_destino 	= 0;
			var volumen_destino = fval('volfinalact');

		//si es del activo para una reserva
		}else{
			var tanque_origen 	= 0;
			var tanque_destino 	= $('#tv_destiny').val();
			var volumen_destino = fval('volfinal_'+tanque_destino);
		}

		var volumen_transferido = fval('tv_volume');


		$('.sconcentration').each(function(){
			var id = $(this).attr('id');
				id = id.split('_');
				id = id[1];

			var concentracion_origen 	= fval('currentconc_'+id+'_'+tanque_origen);
			var concentracion_destino 	= fval('currentconc_'+id+'_'+tanque_destino);

			var concentracion = (volumen_transferido * concentracion_origen + volumen_destino * concentracion_destino) / (volumen_transferido + volumen_destino);
			completar_campo_val($(this).attr('id'),concentracion.toFixed(2));
		});
	});

	
	$('#show_active_system_tanks').click(function(e){
		e.preventDefault();
		if($(this).hasClass('show')){
			$('#show_active_tanks_tr').show();
			$(this).removeClass('show').addClass('hide').html('Hide Tanks');	
		}else if($(this).hasClass('hide')){
			$('#show_active_tanks_tr').hide();
			$(this).removeClass('hide').addClass('show').html('Show Tanks');	
		}
	});



	//show_add_chemicals_overlay
	$('.show_add_chemicals_overlay').click(function(e){
		e.preventDefault();
		var tank_id = $(this).attr('id');
			tank_id = tank_id.split('link_add_chemicals_');
			tank_id = tank_id[1];

		var tank_label = $('#tank_name_label_'+tank_id).html();
		$('#add_chemicals_overlay h5').html('Add chemicals to '+tank_label+':');
		$('#ca_tank').val(tank_id);
		$('#add_chemicals_overlay').show();
	});

	$('#add_chemicals_overlay .close_link').click(function(e){
		e.preventDefault();
		$('#ca_tank').val('');
		$('#ca_wa').val('');
		$('#voltotalchem').val('');		
		$('#add_chemicals_overlay').hide();
	});

	$('#add_chemicals_overlay .used').live('keyup',function(){
		correr_calculos();
	});



	//ADICIONAR QUIMICA A UN TANQUE
	$('#add_chemicals_btn').click(function(e){
		e.preventDefault();
		var confirmation = confirm('Are you sure you want to perform this action?');
		if(confirmation){
			//validar que el tanque destino no este vacio
			if($('#ca_tank').val() == ''){
				alert('The destiny tank cannot be empty.');
			}else{
				var destiny = ival('ca_tank');

				//obtener el aforo maximo y la cantidad ocupada del tanque destino
				if(destiny == 0){
					var aforo_maximo = 0;
					var cantidad_ocupada = fval('activepits');
					$('#inside_circuit_active_tanks .voltkaforo').each(function(){
						aforo_maximo = aforo_maximo + fval($(this).attr('id'));
					});
				}else{
					var aforo_maximo 		= fval('voltkaforo_'+destiny);
					var cantidad_ocupada 	= fval('volfinal_'+destiny); 
				}

				//validar que el incremento de volumen no sea mayor que la capacidad disponible
				var capacidad_disponible 	= aforo_maximo - cantidad_ocupada;
				var capacidad_requerida 	= fval('voltotalchem') + fval('ca_wa');

				if(capacidad_disponible < capacidad_requerida){
					alert('There is not enought room in the destiny tank. Please verify the quantities and water aditions to continue.');
				}else{
					//validar que las cantidades a consumir de cada elemento no sean mayores que las que hay en stock.
					var eqty = 0;
					$('.used').each(function(){
						var id = $(this).attr('id');
							id = id.split('_');
							id = id[1];

						if(ival($(this).attr('id')) > ival('ac_stock_'+id)){
							eqty = eqty + 1;
						}

					});

					if(eqty > 0){
						alert('You cannot use more material than the one in stock. Please verify your quantities and try again.');
					}else{
						//ocultar el link de cancelar, el boton de adicion de quimica
						// y mostrar el boton de trabajando...
						$('#add_chemicals_btn').hide();
						$('#add_chemicals_overlay .close_link').hide();
						$('#add_chemicals_btn_working').show();

						//armar el objeto
						var data = {
							'tank' 				: destiny,
							'water_volume' 		: fval('ca_wa'),
							'chemical_volume' 	: fval('voltotalchem'),
							'chemicals' 		: []
						}

						$('.used').each(function(){
							var id = $(this).attr('id');
								id = id.split('_');
								id = id[1];

							var this_chemical = {
								'id' 			: id,
								'used' 			: ival($(this).attr('id')),
								'volume' 		: fval('volincr_'+id),
								'add_quimica' 	: ival('concincr_'+id)
							}

							data.chemicals.push(this_chemical);
						});

						//ajax
						$.post('/rest_mvc/chemical_adition',$.toJSON(data),function(r){
							if(r == true){
								//actualizar el tanque, refrescar el inventario y refrescar el formulario de stock de adicion de quimica
								load_tank_status();
								load_materials_status();
								load_today_consumptions();
								load_ac_status();
								load_current_concentrations();
								correr_calculos();
								step_by_step_mvc();
					
								//emular click del usuario sobre el boton cancelar
								$('#add_chemicals_overlay .close_link').show();
								$('#add_chemicals_overlay .close_link').click();
								$('#add_chemicals_btn').show();
								$('#add_chemicals_btn_working').hide();
							}
						},'json');
					}
				}
			}
		}
	});

	function load_ac_status(){
		var data = {'project_id' : $('#project_id').val()};
		$.post('/rest/load_ac_status',data,function(r){
			$('#ac_status').html(r);	
		});
		
	}

	function load_tank_status(){
		$.getJSON('/rest_mvc/load_tank_status',function(r){
			//colocar la informacion en el tanque activo
			var a = r.active;
			completar_campo_val('volstartact',Math.round(a.volumen_inicial));
			completar_campo_val('volrecact',Math.round(a.volumen_recibido));
			completar_campo_val('volchem_0',Math.round(a.volumen_adicion_quimica));
			completar_campo_val('volwateract',Math.round(a.volumen_adicion_agua));
			completar_campo_val('volconsact',Math.round(a.volumen_construido));
			completar_campo_val('voltransfact',Math.round(a.volumen_transferido_reservas) + Math.round(a.volumen_transferido_osc));
			completar_campo_val('volfinalact',Math.round(a.volumen_final));
			completar_campo_val('volrecosc',Math.round(a.volumen_recibido_osc));
			completar_campo_val('voltransosc',Math.round(a.volumen_transferido_osc));

			//colocar la informacion en todos los tanques
			$(r.all_tanks).each(function(){
				var id = this.id;
				if($('#this_tank_'+id).length > 0){
					completar_campo_val('volstart_'+id,Math.round(this.volumen_inicial));
					completar_campo_val('volrec_'+id,Math.round(this.volumen_recibido));
					completar_campo_val('volchem_'+id,Math.round(this.volumen_adicion_quimica));
					completar_campo_val('volwater_'+id,Math.round(this.volumen_adicion_agua));
					completar_campo_val('volcons_'+id,Math.round(this.volumen_construido));
					completar_campo_val('voltransf_'+id,Math.round(this.volumen_transferido_activo));
					completar_campo_val('volfinal_'+id,Math.round(this.volumen_final));
					if(id == 12){log('volfinal_'+id,this.volumen_final)}
				}
			});
			
			correr_calculos();
		});
	}

	function load_current_concentrations(){
		var data = {'project_id' : $('#project_id').val()};
		$.post('/rest_mvc/load_current_concentrations',data,function(r){
			$('#current_concentrations_table').html(r);	
		});	
	}


	//transfer_volume_btn: transferir volumen desde y hacia el activo
	$('#transfer_volume_btn').click(function(){
		var confirmation = confirm('Are you sure you want to perform this action?');

		if(confirmation){

			//validar que siempre uno de los campos sea el activo y el otro sea
			//diferente del activo

			var origin 	= $('#tv_origin').val(); 
			var destiny = $('#tv_destiny').val();

			if(origin == destiny){
				alert('Origin and destiny must be different tanks.');
			}else{
				if(parseInt(origin) !== 0){
					if(parseInt(destiny) == 0){
						var semaforo = 'verde';
					}else{
						var semaforo = 'rojo';
					}
				}else if(parseInt(destiny) !== 0){
					if(parseInt(origin) == 0){
						var semaforo = 'verde';
					}else{
						var semaforo = 'rojo';
					}
				}

				if(semaforo == 'rojo'){
					alert('You can make mud transfer only from and to the active system');
				}else{
					var volume = fval('tv_volume');
					if(volume == 0){
						alert('You must define a volume and make sure it is different from zero.');
					}else{
						//get the origin maximun and current volume and make sure it has enought mud 
						//in order to make the transfer

						if(parseInt(origin) == 0){
							var aforo_origen 	= 0;
							$('#inside_circuit_active_tanks .voltkaforo').each(function(){
								aforo_origen = aforo_origen + fval($(this).attr('id'));
							});
							var volumen_origen = fval('volfinalact');
						}else{
							var aforo_origen 	= fval('voltkaforo_'+origin); 
							var volumen_origen 	= fval('volfinal_'+origin);
						}

						//get the destiny maximun and current volume and make sure it has enougth room
						//to receive the mud

						if(parseInt(destiny) == 0){
							var aforo_destino 	= 0;
							$('#inside_circuit_active_tanks .voltkaforo').each(function(){
								aforo_destino = aforo_destino + fval($(this).attr('id'));
							});
							var volumen_destino = fval('volfinalact');
						}else{
							var aforo_destino 		= fval('voltkaforo_'+origin); 
							var volumen_destino 	= fval('volfinal_'+origin);	
						}

						if(volumen_origen < volume){
							alert('You can transfer only '+volumen_origen+' bbl from the origin tank to make this transfer.');
						}else{
							//exito... hacer la transferencia de volumenes y actualizar el estado de las concentraciones
							$('#transfer_volume_btn').hide();
							$('#mtr_overlay .close_link').hide();
							$('#transfer_volume_btn_working').show();


							var data = {
								'origin' 	: origin,	
								'destiny' 	: destiny,
								'volume'	: volume
							}

							$.post('/rest_mvc/transferencia_volumen',$.toJSON(data),function(r){
								if(r == true){
									//actualizar el tanque, refrescar el inventario y refrescar el formulario de stock de adicion de quimica
									load_materials_status();
									load_ac_status();
									load_tank_status();
									load_current_concentrations();
									step_by_step_mvc();	

									if(parseInt(origin) !== 0){
										//preguntarle al servidor el tipo del tanque
										var data = {'tank':origin};
										$.post('/rest_mvc/get_tank_info',data,function(r){
											if(parseInt(r.name) > 32){
												if((volumen_origen - volume) < 1){
													$('#manual_tank_setup_'+origin).show();	
												}else{
													$('#manual_tank_setup_'+origin).hide();
												}
											}
										},'json');
									}

									$('#mtr_overlay .close_link').click();
									$('#transfer_volume_btn').show();
									$('#mtr_overlay .close_link').show();
									$('#transfer_volume_btn_working').hide();
								}
							},'json');
							
							/*
							var espacio_disponible_destino = aforo_destino - volumen_destino;
							if(espacio_disponible_destino < volume){
								alert('You have only '+espacio_disponible_destino+' bbl in the destiny tank avaliable to make this transfer');
							}else{

								
							}*/
						}
					}

				}
			}
		}
	});

	//concentraciones resultantes
	$('.show_rc_overlay').click(function(e){
		e.preventDefault();
		$("#rc_overlay").show();
	});	

	$('#rc_btn').click(function(e){
		e.preventDefault();
		$("#rc_overlay").hide();
	});

	$('.remove_activetank').click(function(e){
		e.preventDefault();
		var id = $(this).attr('id');
			id = id.split('_');
			id = id[2];

		var tank_row = $('#this_active_tank_'+id);
		
		//el tanque aun se encuetra en el circuito, sacarlo
		if(tank_row.hasClass('inside_circuit')){
			var parametros_transferencia = {
				'volumen' 	: fval('volrealtk_'+id),
				'origen' 	: 0,
				'destino' 	: 99,
				'tanque' 	: id
			}
		//el tanque ya no está en en circuto, reintegrarlo
		}else{
			var parametros_transferencia = {
				'volumen' 	: fval('volrealtk_'+id),
				'origen' 	: 99,
				'destino' 	: 0,
				'tanque' 	: id 
			}
		}

		sc_transfer(parametros_transferencia);
	});

	$('#tv_osc_overlay .close_link').click(function(e){
		e.preventDefault();
		$('#tv_osc_overlay').hide();
	});

	function sc_transfer(d){
		var origin 	= d.origen;
		var destiny = d.destino;
		var volume 	= d.volumen;
		var tank 	= d.tanque;

		if(volume > 0){
			if(origin == 0){
				$('#tv_osc_overlay h5').html('Transfer '+volume+' bbl to Out of Short Circuit:');
				$('#tv_osc_overlay legend').html('Concentraciones resultantes por fuera del circuito corto:');
			}else{
				$('#tv_osc_overlay h5').html('Transfer '+volume+' bbl back to active:');
				$('#tv_osc_overlay legend').html('Concentraciones resultantes en el sistema activo:');
			}

			$('#tv_osc_origin').val(origin);
			$('#tv_osc_destiny').val(destiny);
			$('#tv_osc_volume').val(volume);
			$('#osc_transfer_tank').val(tank);

			var volumen_transferido = volume;

			if(destiny == 99){
				var volumen_destino = fval('volfinal_99');
			}else if(destiny == 0){
				var volumen_destino = fval('volfinalact');
			}
			
			$('.soc_concentration').each(function(){
				var material = $(this).attr('id');
					material = material.split('_');
					material = material[2];

				var concentracion_origen 	= fval('currentconc_'+material+'_'+origin);
				var concentracion_destino 	= fval('currentconc_'+material+'_'+destiny);

				var concentracion = 0;
				var concentracion = (volumen_transferido * concentracion_origen + volumen_destino * concentracion_destino) / (volumen_transferido + volumen_destino);
				
				completar_campo_val($(this).attr('id'),concentracion.toFixed(2));
			});

			$('#tv_osc_overlay').show();
		}else{
			alert('This tank has no volume. Please verify the headroom and try again');
		}
	}


	$('#transfer_osc_btn').click(function(e){
		e.preventDefault();
		var confirmation = confirm('Are you sure you want to perform this action?');
		if(confirmation){
			//exito... hacer la transferencia de volumenes y actualizar el estado de las concentraciones
			$('#transfer_osc_btn').hide();
			$('#tv_osc_overlay .close_link').hide();
			$('#transfer_osc_volume_btn_working').show();


			var data = {
				'origin' 	: $('#tv_osc_origin').val(),	
				'destiny' 	: $('#tv_osc_destiny').val(),
				'volume'	: $('#tv_osc_volume').val()
			}

			$.post('/rest_mvc/transferencia_volumen',$.toJSON(data),function(r){
				if(r == true){
					var transfer_tank = $('#osc_transfer_tank').val();
					
					if($('#this_active_tank_'+transfer_tank).hasClass('inside_circuit')){
						$('#this_active_tank_'+transfer_tank).removeClass('inside_circuit');
						$('#hlibre_'+transfer_tank).attr('disabled','disabled');
						$('#active_tank_'+transfer_tank).removeAttr('checked');	
					}else{
						$('#this_active_tank_'+transfer_tank).addClass('inside_circuit');
						$('#hlibre_'+transfer_tank).removeAttr('disabled');
						$('#active_tank_'+transfer_tank).attr('checked','checked');
					}

					//actualizar el tanque, refrescar el inventario y refrescar el formulario de stock de adicion de quimica
					load_materials_status();
					load_ac_status();
					load_tank_status();
					load_current_concentrations();
					step_by_step_mvc();	
					
					$('#tv_osc_overlay .close_link').click();
					$('#transfer_osc_btn').show();
					$('#tv_osc_overlay .close_link').show();
					$('#transfer_osc_volume_btn_working').hide();
				}
			},'json');
		}	
	});


	$('.manual_tank_setup').click(function(e){
		e.preventDefault();
		var id = $(this).attr('id');
			id = id.split('_');
			id = id[3];

		$.post('/rest_mvc/load_single_tank',{'tank':id},function(r){
			log(r);
			$('#mte_current_volume').val(r.status.volumen_final);
			$(r.concentrations).each(function(){
				$('#mteconcentration_'+this.material).val(this.concentration);	
			});
		},'json');

		$('#mts_tank').val(id);
		$('#mts_overlay').show();
	});

	$('#mts_overlay .close_link').click(function(e){
		e.preventDefault();
		$('#mts_overlay').hide();
	});

	$('#setup_volume_btn').click(function(){
		var data = {
			'tank' 			 : fval('mts_tank'),
			'volume'		 : fval('mte_current_volume'),
			'concentrations' : []
		}

		$('.mteconcentration').each(function(){
			var material = $(this).attr('id');
				material = material.split('_');
				material = material[1];

			var concentracion = fval($(this).attr('id'));

			var esta_concentracion = {
				'material' : material,
				'concentracion' : concentracion
			}

			data.concentrations.push(esta_concentracion);
		});

		$.post('/rest_mvc/create_tank_status',$.toJSON(data),function(r){
			load_tank_status();
			load_current_concentrations();
			step_by_step_mvc();
			$('#mts_overlay .close_link').click();
		},'json');		
	});

	function step_by_step_mvc(){
		$('#step_by_step_mvc').load('/rest_mvc/step_by_step_mvc');
	}

	$('.delete_mvc_step').live('click',function(e){
		e.preventDefault();
		if(confirm('Are you sure yo want to undo this step?')){
			var id = $(this).attr('href');
				id = id.split('_');
				id = id[1];

			$.post('/rest_mvc/undo_step',{'id':id},function(r){
				if(r == true){
					load_materials_status();
					load_ac_status();
					load_tank_status();
					load_current_concentrations();
					step_by_step_mvc();
				}
			},'json');
		}
	});

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