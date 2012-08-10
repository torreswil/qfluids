function sidebar_position(){
	var win_width = $(window).width();
	var x_pos = (win_width - 1200)/2;
	if(win_width >= 1200){
		$('.sidebar').css('left',x_pos).show();
	}else{
		$('.sidebar').css('left',0).show();
	}
}

$(window).resize(function(){
	sidebar_position();	
});

$(document).ready(function(){
	sidebar_position();

	$('#pressure_loss_fieldset a').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
		$(target).fadeIn('fast');
	});

	//CLICK PARA OCULTAR UN OVERLAY
	$(".this_hidden_panel").click(function(e) {
        if (e.target.id == "as_math" || $(e.target).parents("#as_math").size() || e.target.id == "ds_math" || $(e.target).parents("#ds_math").size()) { 
        	log('math clicked');    
        }else {
        	$('.this_hidden_panel').fadeOut('fast');	
        }
    });

	//CLICK EN UN ENLACE DE LA BARRA LATERAL
	$('.nav_links a').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
		$('.this_panel').hide();
		$(target).show();
		correr_calculos();
	});

	//CUADRO DE DIALOGO 'SELECCION DE BROCA'
	//**********************************************************************************************************************************************************
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


	//CUADRO DE DIALOGO SELECCION DE CASING
	//*************************************************************************************************************************
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
							$('#casing_tool_' + parseInt(target) + 1).show();
							$('#casing_tool_'+new_casing).show();
							$('.casingclear').each(function(){
								$(this).hide();
							});
							$('.casingclear','#casing_tool_'+new_casing).show();
							$('#casing_tool_'+target).addClass('active');
							
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

		//$('#casing_tool_'+target+' .pick_casing').val('Select...');
		//$('#casing_tool_'+target+' .od,#casing_tool_'+target+' .id,#casing_tool_'+target+' .top,#casing_tool_'+target+' .bottom').val(0);
		
		if($(this).parents('.casing_tool_row').attr('id') !== 'casing_tool_1'){
			$('#casing_tool_'+target).hide().removeClass('active');
		}

		var last_row = target - 1;
		$('a.casingclear','#casing_tool_' + last_row).show();
		$('#casing_tool_'+target+' .pick_casing').val('Select...');
		$('#casing_tool_'+target+' .od,#casing_tool_'+target+' .id,#casing_tool_'+target+' .top,#casing_tool_'+target+' .bottom,#casing_tool_'+target+' .volume, #casing_tool_'+target+' .length').val(0);
		
		correr_calculos();
	});

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

			if(pump_continue == true){
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

			}else if(pump_continue == 'clear'){

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


	//*********************************************************************************************************************************************
	//DRILL STRING: ADD ANOTHER
	$('#add_another_drill').click(function(e){
		e.preventDefault();
		var cantidad_vacios 	= 0;
		var cantidad_completos 	= 0;
		$('.select_drill_string').each(function(){
			if($(this).val() == ''){
				cantidad_vacios = cantidad_vacios + 1;
			}else{
				cantidad_completos = cantidad_completos + 1;
			}
		});

		var first_id = $('.select_drill_string').filter(':first').attr('id');
		first_id = first_id.split('select_drill_string_');
		first_id = first_id[1];

		if(cantidad_vacios > 0){
			return false;
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
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="retbha_'+new_id+'" id="retbha_'+new_id+'" style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="fft_bha_lami_'+new_id+'" id="fft_bha_lami_'+new_id+'" style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="fft_bha_tur_'+new_id+'" id="fft_bha_tur_'+new_id+'" style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="ptpl_'+new_id+'" id="ptpl_'+new_id+'" style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="ptpt_'+new_id+'" id="ptpt_'+new_id+'" style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="laminarlabelbha_'+new_id+'" id="laminarlabelbha_'+new_id+'" style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +		'</tr>';
                $('#ds_group').prepend(ds_group_preppend);

                //prepend a new row in the dsmath_tab:bingham table
				var ds_group_preppend = '';
				ds_group_preppend = ds_group_preppend +		'<tr id="bingham_'+new_id+'">';
                ds_group_preppend = ds_group_preppend +			'<td class="label_m"><label>ds_'+new_id+'</label></td>';
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" name="veltubbha_'+new_id+'" id="veltubbha_'+new_id+'"  style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" id="velcritbha_'+new_id+'" name="velcritbha_'+new_id+'" style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" id="ptblbha_'+new_id+'" name="ptblbha_'+new_id+'" style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" id="ptbtbha_'+new_id+'" name="ptbtbha_'+new_id+'" style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +			'<td><input type="text" disabled="disabled" id="zbinghamflujobha_'+new_id+'" name="zbinghamflujobha_'+new_id+'" style="width:70px;"></td>';
                ds_group_preppend = ds_group_preppend +		'</tr>';
                $('#bingham_group').prepend(ds_group_preppend);
			});
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

	//********************************************************************************************************************************************
	// MUD TYPE PICKER
	//********************************************************************************************************************************************

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




	//********************************************************************************************************************************************
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



	
	// TRIGGERS CALCULOS
	$('#qfluids_form input').live('keyup',function(){
		
		correr_calculos();
	});
	$('#qfluids_form select').live('change',function(){
		
		correr_calculos();
	})
	$('#qfluids_form input[type="button"]').live('click',function(){
		
		correr_calculos();
	});

	$('#ds_math input').attr('disabled','disabled').css('width',70);


});

//*******************************************************************************
// CALCULOS 																	*
//*******************************************************************************

function mixnumber_to_float(mixnumber){
	var components 	= mixnumber.split(' ');
	if(components.length == 1){
		return parseInt(mixnumber);
	}else if(components.length == 0){
		return false;
	}else if(components.length > 0){
		var int_part 	= parseFloat(components[0]);
		var float_part 	= parseFloat(eval(components[1]));
		var float_num	= int_part + float_part;
		return float_num;
	}
}

function power(selector,exponente){
	return Math.pow(parseFloat($('#'+selector).val()),exponente);
}

function fval(selector){
	return parseFloat($('#'+selector).val());
}

function ival(selector){
	return parseInt($('#'+selector).val());
}

function correr_calculos(){
	calculos_raw();
	corregir_data();
}

function corregir_data(){
	$('#qfluids_form input').each(function(){
		if($(this).val() == 'NaN' || $(this).val() == 'Infinity' || $(this).val() == '-Infinity'){
			$(this).val(0);
		}
	});	
}

function completar_campo_val(nombre_campo,valor){
	$('#'+nombre_campo).val(valor);	
}

function log10(val) {
  return Math.log(val) / Math.LN10;
}

function calculos_raw(){

	//CALCULOS 'BROCA'
	//************************************************	
	//jets_string
	var jets_string = '';
	$('.broca_jet').each(function(){
		if($(this).val() !== ''){
			var this_value 			= $(this).val();
			var this_value_count 	= 0;
			$('.broca_jet').each(function(){
				if($(this).val() == this_value){
					this_value_count = this_value_count + 1;
				}
			});
			var new_part  = this_value_count + '*' + this_value;
			jets_string = jets_string.replace(new_part,'');
			jets_string = $.trim(jets_string + ' ' + new_part);
		}
	});
	completar_campo_val('jets_string',jets_string);

	//TFA
	var tfa = 0;
	var jets_sum = 0;
	$('.broca_jet').each(function(){
		var a = $(this).val();
		if(a !== ''){
			var this_jet_square = Math.pow($(this).val(),2);
			tfa = tfa + this_jet_square;
			jets_sum = tfa;
		}
	});
	tfa = Math.PI * tfa/4096;
	completar_campo_val('tfa',tfa.toFixed(3));
	
	//VEL JETS
	var veljet = 0;
	veljet = 0.32 * parseFloat($('#qgaltotal').val()) / tfa;
	completar_campo_val('veljet',veljet.toFixed(3));
	

	//PD BIT
	var pdbit = 0;
	var mw = 0;
	$('.mw').each(function(){
		if($(this).val() !== ''){
			mw = parseFloat($(this).val());
		}
	});
	pdbit = Math.pow(veljet,2) * mw / 1120;
	completar_campo_val('pdbit',pdbit.toFixed(2));
	completar_campo_val('zpdbit',pdbit.toFixed(2));
	completar_campo_val('zzpdbit',pdbit.toFixed(2));

	//HHPBIT
	var hhp = pdbit * $('#qgaltotal').val() / 1714;
	completar_campo_val('hhp',hhp.toFixed(3));

	//HSI
	var hsi = hhp / (jets_sum * 0.000767);
	completar_campo_val('hsi',hsi.toFixed(3));


	//CALCULOS 'PROPIEDADES DEL LODO'
	//************************************************

	//PV_1
	var pv_1 = 0;
	pv_1 = $('#teta_601').val() - $('#teta_301').val();
	completar_campo_val('pv_1',pv_1);

	//PV_2
	var pv_2 = 0;
	pv_2 = $('#teta_602').val() - $('#teta_302').val();
	completar_campo_val('pv_2',pv_2);

	//PV_3
	var pv_3 = 0;
	pv_3 = $('#teta_603').val() - $('#teta_303').val();
	completar_campo_val('pv_3',pv_3);

	//YP_1
	var yp_1 = 0;
	yp_1 =  $('#teta_301').val() - $('#pv_1').val(); 
	completar_campo_val('yp_1',yp_1);

	//YP_2
	var yp_2 = 0;
	yp_2 =  $('#teta_302').val() - $('#pv_2').val();
	completar_campo_val('yp_2',yp_2);

	//YP_3
	var yp_3 = 0;
	yp_3 =  $('#teta_303').val() - $('#pv_3').val();
	completar_campo_val('yp_3',yp_3);

	//YS_1
	var ys_1 = 0;
	ys_1 = 2 * $('#teta_31').val() - $('#teta_61').val();
	completar_campo_val('ys_1',ys_1); 

	//YS_2
	var ys_2 = 0;
	ys_2 = 2 * $('#teta_32').val() - $('#teta_62').val();
	completar_campo_val('ys_2',ys_2);
	
	//YS_3
	var ys_3 = 0;
	ys_3 = 2 * $('#teta_33').val() - $('#teta_63').val();
	completar_campo_val('ys_3',ys_3);

	//n_1
	var n_1 = 0;
	n_1 = 1.44 * Math.log(((2*pv_1)+yp_1)/(pv_1 + yp_1));
	completar_campo_val('n_1',n_1.toFixed(3));

	//n_2
	var n_2 = 0;
	n_2 = 1.44 * Math.log(((2*pv_2)+yp_2)/(pv_2 + yp_2));
	completar_campo_val('n_2',n_2.toFixed(3));

	//n_3
	var n_3 = 0;
	n_3 = 1.44 * Math.log(((2*pv_3)+yp_3)/(pv_3 + yp_3));
	completar_campo_val('n_3',n_3.toFixed(3));

	//k_1
	var k_1 = 0;
	k_1 = (Math.pow(511, n_1 * -1) * (pv_1 + yp_1));
	completar_campo_val('k_1',k_1.toFixed(3));

	//k_2
	var k_2 = 0;
	k_2 = (Math.pow(511, n_2 * -1) * (pv_2 + yp_2));
	completar_campo_val('k_2',k_2.toFixed(3));

	//k_3
	var k_3 = 0;
	k_3 = (Math.pow(511, n_3 * -1) * (pv_3 + yp_3));
	completar_campo_val('k_3',k_3.toFixed(3));

	//sol_1
	var sol_1 = 0;
	sol_1 = 100 - $('#wa_1').val() - $('#oil_1').val();
	sol_1 = (sol_1 == 100) ? 0 : sol_1;
	completar_campo_val('sol_1',sol_1.toFixed(2));

	//sol_2
	var sol_2 = 0;
	sol_2 = 100 - $('#wa_2').val() - $('#oil_2').val();
	sol_2 = (sol_2 == 100) ? 0 : sol_2;
	completar_campo_val('sol_2',sol_2.toFixed(2));

	//sol_3
	var sol_3 = 0;
	sol_3 = 100 - $('#wa_3').val() - $('#oil_3').val();
	sol_3 = (sol_3 == 100) ? 0 : sol_3;
	completar_campo_val('sol_3',sol_3.toFixed(2));

	//asg_1
	var asg_1 = 0;
	asg_1 = (($('#mw_1').val()/8.33) - (($('#wa_1').val() / 100) + ($('#oil_1').val() * 0.84/100))) / (sol_1 / 100);
	completar_campo_val('asg_1',asg_1.toFixed(2));

	//asg_2
	var asg_2 = 0;
	asg_2 = (($('#mw_2').val()/8.33) - (($('#wa_2').val() / 100) + ($('#oil_2').val() * 0.84/100))) / (sol_2 / 100);
	completar_campo_val('asg_2',asg_2.toFixed(2));

	//asg_3
	var asg_3 = 0;
	asg_3 = (($('#mw_3').val()/8.33) - (($('#wa_3').val() / 100) + ($('#oil_3').val() * 0.84/100))) / (sol_3 / 100);
	completar_campo_val('asg_3',asg_3.toFixed(2));

	//lgspercent_1
	var lgspercent_1 = 0;
	lgspercent_1 = ((parseFloat($('#wa_1').val()) + (sol_1 * 4.2) + (parseFloat($('#oil_1').val()) * 0.84)) - (100 * (parseFloat($('#mw_1').val()) / 8.33))) / 1.6;
	completar_campo_val('lgspercent_1',lgspercent_1.toFixed(2));

	//lgspercent_2
	var lgspercent_2 = 0;
	lgspercent_2 = ((parseFloat($('#wa_2').val()) + (sol_2 * 4.2) + (parseFloat($('#oil_2').val()) * 0.84)) - (100 * (parseFloat($('#mw_2').val()) / 8.33))) / 1.6;
	completar_campo_val('lgspercent_2',lgspercent_2.toFixed(2));

	//lgspercent_3
	var lgspercent_3 = 0;
	lgspercent_3 = ((parseFloat($('#wa_3').val()) + (sol_3 * 4.2) + (parseFloat($('#oil_3').val()) * 0.84)) - (100 * (parseFloat($('#mw_3').val()) / 8.33))) / 1.6;
	completar_campo_val('lgspercent_3',lgspercent_3.toFixed(2));

	//hgspercent_1
	var hgspercent_1 = 0;
	hgspercent_1 = (100 * (parseFloat($('#mw_1').val()) / 8.33 ) - (parseFloat($('#wa_1').val()) + (sol_1 * 2.6) + (parseFloat($('#oil_1').val()) * 0.84))) / 1.6;
	completar_campo_val('hgspercent_1',hgspercent_1.toFixed(2));

	//hgspercent_2
	var hgspercent_2 = 0;
	hgspercent_2 = (100 * (parseFloat($('#mw_2').val()) / 8.33 ) - (parseFloat($('#wa_2').val()) + (sol_2 * 2.6) + (parseFloat($('#oil_2').val()) * 0.84))) / 1.6;
	completar_campo_val('hgspercent_2',hgspercent_2.toFixed(2));

	//hgspercent_3
	var hgspercent_3 = 0;
	hgspercent_3 = (100 * (parseFloat($('#mw_3').val()) / 8.33 ) - (parseFloat($('#wa_3').val()) + (sol_3 * 2.6) + (parseFloat($('#oil_3').val()) * 0.84))) / 1.6;
	completar_campo_val('hgspercent_3',hgspercent_3.toFixed(2));

	//lgsppb_1
	var lgsppb_1 = 0;
	lgsppb_1 = (lgspercent_1 / 100) * 909.7;
	completar_campo_val('lgsppb_1',lgsppb_1.toFixed(2));

	//lgsppb_2
	var lgsppb_2 = 0;
	lgsppb_2 = (lgspercent_2 / 100) * 909.7;
	completar_campo_val('lgsppb_2',lgsppb_2.toFixed(2));

	//lgsppb_3
	var lgsppb_3 = 0;
	lgsppb_3 = (lgspercent_3 / 100) * 909.7;
	completar_campo_val('lgsppb_3',lgsppb_3.toFixed(2));

	//hgsppb_1
	var hgsppb_1 = 0;
	hgsppb_1 = (hgspercent_1 / 100) * 979;
	completar_campo_val('hgsppb_1',hgsppb_1.toFixed(2));

	//hgsppb_2
	var hgsppb_2 = 0;
	hgsppb_2 = (hgspercent_2 / 100) * 979;
	completar_campo_val('hgsppb_2',hgsppb_2.toFixed(2));

	//hgsppb_3
	var hgsppb_3 = 0;
	hgsppb_3 = (hgspercent_3 / 100) * 979;
	completar_campo_val('hgsppb_3',hgsppb_3.toFixed(2));

	//capdp
	var capdp = 0;
	capdp = Math.pow(parseFloat($('#iddp').val()),2) / 1029.4;
	completar_campo_val('capdp',capdp.toFixed(4));

	//capvdp
	var capvdp = 0;
	capvdp = capdp * parseFloat($('#longdp').val());
	completar_campo_val('capvdp',capvdp.toFixed(2));

	//dispdp
	var dispdp = 0;
	dispdp = (Math.pow(parseFloat($('#oddp').val()),2) - Math.pow(parseFloat($('#iddp').val()),2)) / 1029.4;
	completar_campo_val('dispdp',dispdp.toFixed(4));

	//dispvdp
	var dispvdp = 0;
	dispvdp = dispdp * parseFloat($('#longdp').val());
	completar_campo_val('dispvdp',dispvdp.toFixed(2));

	
	// CALCULOS GEOMETRIA DEL POZO
	//**************************************************
	
	// 1. CASING (REVESTIMIENTO)

	$('#casing_table .active').each(function(){
		var target =  $(this).attr('id');
		var id 	= target.split('casing_tool_');
		id 		= id[1];

		if($('#'+target + ' .pick_casing').val() == 'Casing'){
			var length = parseFloat($('#bottomcsg_'+id).val());
			completar_campo_val('longcsg_'+id,length);
		}else if($('#'+ target + ' .pick_casing').val() == 'Liner'){
			var last_id = parseFloat(id) - 1;
			if($('#casing_tool_'+ last_id + ' .pick_casing').val() == 'Liner'){
				var last_length = parseFloat($('#topscsg_'+id).val()) - parseFloat($('#topscsg_'+last_id).val());	
				completar_campo_val('longcsg_'+last_id,last_length);
				var length = parseFloat($('#bottomcsg_'+id).val()) - parseFloat($('#topscsg_'+id).val());
				completar_campo_val('longcsg_'+id,length);
			}else if($('#casing_tool_'+ last_id + ' .pick_casing').val() == 'Casing'){
				var last_length = parseFloat($('#topscsg_'+id).val());
				completar_campo_val('longcsg_'+last_id,last_length);
				var length = parseFloat($('#bottomcsg_'+id).val()) - last_length;
				completar_campo_val('longcsg_'+id,length);	
			}
		}

		var volcsg = 0;
		volcsg = power('idcsg_'+id,2) * $('#longcsg_'+id).val() / 1029.4;
		completar_campo_val('volcsg_'+id,volcsg.toFixed(2));

	});


	//2. HUECO

	//zhole
	//var zhole = 0;
	//zhole = mixnumber_to_float($.trim($('#zholed').val()));
	//completar_campo_val('zhole',zhole);

	//openhole
	var openhole = 0;
	
	var zhole = 0;
	if($('#zhole').val() !== ''){
		zhole = parseFloat($('#zhole').val());
	}

	var zrice = 0;
	if($('#zrice').val() !== ''){
		zrice = parseFloat($('#zrice').val());
	}

	var zcuttings = 0;
	if($('#zcuttings').val() !== ''){
		zcuttings = parseFloat($('#zcuttings').val());
	}

	var zcaliper = 0;
	if($('#zcaliper').val() !== ''){
		zcaliper = parseFloat($('#zcaliper').val());
	}

	openhole = zhole + zrice + zcuttings + zcaliper; 
	completar_campo_val('openhole',openhole.toFixed(3));

	//zwashout
	var zwashout = 0;
	zwashout = 100 * (openhole - zhole) / zhole;
	completar_campo_val('zwashout',zwashout.toFixed(2));

	//longhoyo
	var longhoyo = 0;
	var bottomcsg_partial = 0;
	$('#casing_table .active .bottom').each(function(){
		bottomcsg_partial = $(this).val();
	});
	longhoyo = parseFloat($('#md').val()) - parseFloat(bottomcsg_partial);
	completar_campo_val('longhoyo',longhoyo.toFixed(2));
	

	//volhole
	var volhole = 0;
	volhole = Math.pow(openhole,2) * longhoyo / 1029.4; 
	completar_campo_val('volhole',volhole.toFixed(2));


	//volcsgt
	var volcsgt = 0;
	$('#casing_table .active').each(function(){
		var target =  $(this).attr('id');
		var id 	= target.split('casing_tool_');
		id 		= id[1];

		if($('#'+target + ' .pick_casing').val() == 'Casing'){
			volcsgt = parseFloat($('#volcsg_'+id).val());
		}else if($('#'+ target + ' .pick_casing').val() == 'Liner'){
			var last_id = parseFloat(id) - 1;
			if($('#casing_tool_'+ last_id + ' .pick_casing').val() == 'Liner'){
				var count = id;
				volcsgt = parseFloat($('#volcsg_'+count).val());
				while(count > 0){
					count = count - 1;
					volcsgt = volcsgt + parseFloat($('#volcsg_'+count).val());
					if($('#casing_tool_'+ count + ' .pick_casing').val() == 'Casing'){
						count = 0;
					}
				}
			}else if($('#casing_tool_'+ last_id + ' .pick_casing').val() == 'Casing'){
				volcsgt = parseFloat($('#volcsg_'+id).val()) + parseFloat($('#volcsg_'+last_id).val());		
			}
		}
	});
	completar_campo_val('volcsgt',volcsgt.toFixed(2));


	//zrangetop - zrrange_btm
	$('#casing_table .active').each(function(){
		var target =  $(this).attr('id');
		var id 	= target.split('casing_tool_');
		id 		= id[1];

		if($('#'+target + ' .pick_casing').val() == 'Casing'){
			var zrrange_top = 0;
			var zrrange_btm	= parseFloat($('#'+target + ' .length').val());
			completar_campo_val('zrrange_top_'+id,zrrange_top);
			completar_campo_val('zrrange_btm_'+id,zrrange_btm);

			var previous_casing = parseFloat(id);
			while(previous_casing > 0){
				previous_casing = previous_casing - 1;
				completar_campo_val('zrrange_top_'+previous_casing,0);
				completar_campo_val('zrrange_btm_'+previous_casing,0);	
			}

		}else if($('#'+ target + ' .pick_casing').val() == 'Liner'){
			var zrrange_top = fval('topscsg_'+id);
			var zrrange_btm = fval('bottomcsg_'+id);
			completar_campo_val('zrrange_top_'+id,zrrange_top);
			completar_campo_val('zrrange_btm_'+id,zrrange_btm);
			var previous_casing = parseFloat(id) - 1;
			completar_campo_val('zrrange_btm_'+previous_casing,zrrange_top);
		}
	});

	//volholeempty
	var volholeempty = 0;
	volholeempty = volhole + volcsgt;
	completar_campo_val('volholeempty',volholeempty.toFixed(2));


	//TABLA DE DATOS DE LA SECCION ANULAR
	var zdstop = 0
	var zdsbtm = 0;
	var astable = Array();
	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];
		
		//dsod
		if($('#odbha_'+id).val() !== ''){
			var dsod = fval('odbha_'+id);	
		}else{
			var dsod = 0;
		}
		
		//toolname
		var tool_name = $(this).val().toUpperCase();
		if(tool_name == ''){
			tool_name = 'DS_'+id;
		}	

		//bottom de este elemento
		zdsbtm = zdsbtm + fval('longbha_'+id);
		longbha = fval('longbha_'+id);

		//averiguar en que seccion del casing se encuentra
		$('#casing_table .active').each(function(){
			var csgtop 	= parseFloat($('.zrrange_top',this).val());
			var csgbtm 	= parseFloat($('.zrrange_btm',this).val());
			var csgid  	= parseFloat($('.id',this).val());
			var csgname	= $('.pick_casing',this).val();
			if(csgname == 'Casing'){
				csgname = 'CSG';
			}else{
				csgname = 'LINER';
			}


			if(csgtop + csgbtm !== 0){
				if(zdstop == csgtop && zdsbtm == csgbtm){
					var this_match = {
						'name'		: csgname+' - '+tool_name,
						'idhole'	: csgid,
						'odstring'	: dsod,
						'len'		: longbha
					}
					
					if(this_match.len > 0){
						astable.push(this_match);	
					}	
				}else if(zdstop < csgtop && zdsbtm < csgbtm){
					var this_match = {
						'name'		: csgname+' - '+tool_name,
						'idhole'	: csgid,
						'odstring'	: dsod,
						'len'		: zdsbtm - csgtop
					}
					if(this_match.len > 0){
						astable.push(this_match);	
					}
				}else if(zdstop > csgtop && zdsbtm > csgbtm){
					var this_match = {
						'name'		: csgname+' - '+tool_name,
						'idhole'	: csgid,
						'odstring'	: dsod,
						'len'		: csgbtm - zdstop
					}
					if(this_match.len > 0){
						astable.push(this_match);	
					}
				}else if(zdstop > csgtop && zdsbtm < csgbtm){
					var this_match = {
						'name'		: csgname+' - '+tool_name,
						'idhole'	: csgid,
						'odstring'	: dsod,
						'len'		: longbha
					}
					if(this_match.len > 0){
						astable.push(this_match);	
					}
				}else if(zdstop < csgtop && zdsbtm > csgbtm){
					var this_match = {
						'name'		: csgname+' - '+tool_name,
						'idhole'	: csgid,
						'odstring'	: dsod,
						'len'		: csgbtm - csgtop
					}
					if(this_match.len > 0){
						astable.push(this_match);	
					}
				}else if(zdstop < csgtop && zdsbtm == csgbtm){
					var this_match = {
						'name'		: csgname+' - '+tool_name,
						'idhole'	: csgid,
						'odstring'	: dsod,
						'len'		: zdsbtm - csgtop
					}
					if(this_match.len > 0){
						astable.push(this_match);	
					}
				}else if(zdstop == csgtop && zdsbtm > csgbtm){
					var this_match = {
						'name'		: csgname+' - '+tool_name,
						'idhole'	: csgid,
						'odstring'	: dsod,
						'len'		: csgbtm - zdstop
					}
					if(this_match.len > 0){
						astable.push(this_match);	
					}
				}else if(zdstop > csgtop && zdsbtm == csgbtm){
					var this_match = {
						'name'		: csgname+' - '+tool_name,
						'idhole'	: csgid,
						'odstring'	: dsod,
						'len'		: longbha
					}
					if(this_match.len > 0){
						astable.push(this_match);	
					}
				}else if(zdstop == csgtop && zdsbtm < csgbtm){
					var this_match = {
						'name'		: csgname+' - '+tool_name,
						'idhole'	: csgid,
						'odstring'	: dsod,
						'len'		: longbha
					}
					if(this_match.len > 0){
						astable.push(this_match);	
					}
				}
			}
		});

		
		//repetir la accion, pero para open hole
		var ohbtm 	= fval('md');
		var ohtop 	= ohbtm - fval('longhoyo');
		var ohname	= 'OH';
		var ohid	= fval('zhole');

		if(ohbtm + ohtop !== 0){
			if(zdstop == ohtop && zdsbtm == ohbtm){
				var oh_match = {
					'name'		: ohname+' - '+tool_name,
					'idhole'	: ohid,
					'odstring'	: dsod,
					'len'		: longbha
				}
				if(oh_match.len > 0){
					astable.push(oh_match);
				}
			}else if(zdstop < ohtop && zdsbtm < ohbtm){
				var oh_match = {
					'name'		: ohname+' - '+tool_name,
					'idhole'	: ohid,
					'odstring'	: dsod,
					'len'		: zdsbtm - ohtop
				}
				if(oh_match.len > 0){
					astable.push(oh_match);
				}
			}else if(zdstop > ohtop && zdsbtm < ohbtm){
				var oh_match = {
					'name'		: ohname+' - '+tool_name,
					'idhole'	: ohid,
					'odstring'	: dsod,
					'len'		: longbha
				}
				if(oh_match.len > 0){
					astable.push(oh_match);
				}
			}else if(zdstop > ohtop && zdsbtm == ohbtm){
				var oh_match = {
					'name'		: ohname+' - '+tool_name,
					'idhole'	: ohid,
					'odstring'	: dsod,
					'len'		: longbha
				}
				if(oh_match.len > 0){
					astable.push(oh_match);
				}
			}else if(zdstop == ohtop && zdsbtm < ohbtm){
				var oh_match = {
					'name'		: ohname+' - '+tool_name,
					'idhole'	: ohid,
					'odstring'	: dsod,
					'len'		: longbha
				}
				if(oh_match.len > 0){
					astable.push(oh_match);
				}
			}
		}
		
		//top del siguiente elemento
		zdstop = zdsbtm;

	});
	var zascount 			= 0;
	var hidraulics_table 	= '';
	$(astable).each(function(){
		zascount = zascount + 1;
		
		hidraulics_table = hidraulics_table + '<tr>'
        hidraulics_table = hidraulics_table + '    <td><input type="text" style="width:100px;" value="'+this.name+'" /></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" id="idhole_'+zascount+'" name="idhole_'+zascount+'" class="idhole" style="margin-right: 0px; width: 70px;" value="'+this.idhole+'" disabled="disabled" /></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" id="odstring_'+zascount+'" name="odstring_'+zascount+'" class="odstring" style="margin-right: 0px; width: 70px;" value="'+this.odstring+'" disabled="disabled"/></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" id="longanular_'+zascount+'" name="longanular_'+zascount+'" class="longanular" style="margin-right: 0px; width: 70px;" value="'+this.len+'" disabled="disabled" /></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" disabled="disabled" id="capanul_'+zascount+'" name="capanul_'+zascount+'" class="capanul" style="margin-right: 0px; width: 70px;"/></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" id="zapowerloss_'+zascount+'" name="zapowerloss_'+zascount+'" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" id="zabinghloss_'+zascount+'" name="zabinghloss_'+zascount+'" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>';
        hidraulics_table = hidraulics_table + '</tr>';	
	});
	$('#hidraulics_table_content').html(hidraulics_table);


	// 3. DRILL STRING (TUBERIA)
	
	//drill_string_tools
	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//capbha
		var capbha = 0 
		capbha = Math.pow(parseFloat($('#idbha_'+id).val()),2)/1029.4
		completar_campo_val('capbha_'+id,capbha.toFixed(4));

		//capvbha
		var capvbha = 0;
		capvbha = parseFloat($('#capbha_'+id).val()) * $('#longbha_'+id).val();
		completar_campo_val('capvbha_'+id,capvbha.toFixed(2));

		//dispbha
		var dispbha = 0;
		dispbha = (parseFloat(Math.pow($('#odbha_'+id).val(),2)) - parseFloat(Math.pow($('#idbha_'+id).val(),2)))/1029.4;
		completar_campo_val('dispbha_'+id,dispbha.toFixed(4));

		//dispvbha
		var dispvbha = 0;
		dispvbha = parseFloat($('#dispbha_'+id).val()) * parseFloat($('#longbha_'+id).val());
		completar_campo_val('dispvbha_'+id,dispvbha.toFixed(2));

	});

	//totalbha
	var totalbha = 0;
	$('.longbha').each(function(){
		var id = $(this).attr('id');
		id = id.split('longbha_');
		id = id[1];
		if($('#select_drill_string_'+id).val() !== 'dp'){
			if($(this).val() !== ''){
				totalbha = totalbha + parseFloat($(this).val());	
			}
		}
		
	});
	completar_campo_val('totalbha',totalbha);

	//totalds
	var totalds = 0;
	$('.longbha').each(function(){
		if($(this).val() !== ''){
			totalds = totalds + parseFloat($(this).val());	
		}
	});
	completar_campo_val('totalds',totalds);
	completar_campo_val('bitdepth',totalds);

	//captotal
	var captotal = 0;
	$('.capvbha').each(function(){
		captotal = captotal + parseFloat($(this).val());
	});
	captotal = captotal + parseFloat($('#capvdp').val());
	completar_campo_val('captotal',captotal);

	//disptotal
	var disptotal = 0;
	$('.dispvbha').each(function(){
		disptotal = disptotal + parseFloat($(this).val());
	});
	disptotal = disptotal + parseFloat($('#dispvdp').val());
	completar_campo_val('disptotal',disptotal.toFixed(2));
	completar_campo_val('zdisptotal',disptotal.toFixed(2));

	//volwstring
	var volwstring = 0;
	volwstring = volholeempty - disptotal;
	completar_campo_val('volwstring',volwstring.toFixed(2));

	//zavgtemp
	var zavgtemp = 0
	var ztemp_pro = 0;
	$('.ztemp').each(function(){
		if($(this).val() !== '' && $(this).val() !== 0){
			ztemp_pro = ztemp_pro + 1;
			zavgtemp = zavgtemp + parseFloat($(this).val());
		}
	});

	zavgtemp = zavgtemp / ztemp_pro;
	completar_campo_val('zavgtemp',zavgtemp.toFixed(2));

	
	// 2. HIDRAULICA - POWER LOW
	//*************************************************************
	
	//veltubdp
	var veltubdp = 0;
	veltubdp = 0.408 * $('#qgaltotal').val() / power('iddp',2);
	completar_campo_val('veltubdp',veltubdp.toFixed(2));

	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//veltubbha
		var veltubbha = 0;
		veltubbha = 0.408 * parseFloat($('#qgaltotal').val()) / power('idbha_'+id,2);
		completar_campo_val('veltubbha_'+id,veltubbha.toFixed(2));	
	});


	//t_600
	var t_600 = 0;
	$('.t_600').each(function(){
		if($(this).val() !== ''){
			t_600 = $(this).val();
		}
	});
	completar_campo_val('t_600',t_600);

	//t_300
	var t_300 = 0;
	$('.t_300').each(function(){
		if($(this).val() !== ''){
			t_300 = $(this).val();
		}
	});
	completar_campo_val('t_300',t_300);

	//npt
	var npt = 0;
	npt = 3.32 * log10(t_600 / t_300);
	completar_campo_val('npt',npt.toFixed(2));

	//kpt
	var kpt = 0;
	kpt = (511 * t_300) / Math.pow(511,npt);
	completar_campo_val('kpt',kpt.toFixed(2));

	//retc
	var retc = 0;
	retc = 3470 - 1370 * npt;
	completar_campo_val('retc',retc.toFixed(2));

	//retdp
	var retdp = 0;
	retdp = (89100 * mw * Math.pow(veltubdp,(2-npt))) / kpt * Math.pow(0.0416 * parseFloat($('#iddp').val()) / (3 + 1 / npt),npt);
	completar_campo_val('retdp',retdp.toFixed(2));

	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//retbha
		var retbha = 0;
		retbha = (89100 * mw * power('veltubbha_'+id,(2-npt))) / kpt * Math.pow(0.0416 * parseFloat($('#idbha_'+id).val()) / (3 + 1 / npt),npt);
		completar_campo_val('retbha_'+id,retbha.toFixed(2));	
	});

	//at
	var at = 0;
	at = (log10(npt) + 3.93) / 50;
	completar_campo_val('at',at.toFixed(3));

	//bt
	var bt = 0;
	bt = (1.75 - log10(npt)) / 7;
	completar_campo_val('bt',bt.toFixed(3));

	//fft_dp_lami
	var fft_dp_lami = 0;
	fft_dp_lami = 16 / retdp;
	completar_campo_val('fft_dp_lami',fft_dp_lami.toFixed(6));

	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//fft_bha_lami
		var fft_bha_lami = 0;
		fft_bha_lami = 16 / parseFloat($('#retbha_'+id).val());
		completar_campo_val('fft_bha_lami_'+id,fft_bha_lami.toFixed(6));	
	});

	//fft_dp_tur
	var fft_dp_tur = 0;
	fft_dp_tur = at / Math.pow(retdp,bt);
	completar_campo_val('fft_dp_tur',fft_dp_tur.toFixed(6));


	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//fft_bha_tur
		var fft_bha_tur = 0;
		fft_bha_tur = parseFloat($('#at').val()) / power('retbha_'+id,parseFloat($('#bt').val()));
		completar_campo_val('fft_bha_tur_'+id,fft_bha_tur.toFixed(6));
	});

	//ptpldp
	var ptpldp = 0;
	ptpldp =  (kpt * Math.pow(veltubdp,npt) * Math.pow((( 3 + 1 / npt) / 0.0416 ),npt) / (144000 * power('iddp',(1 + npt)))) * parseFloat($('#longdp').val());
	completar_campo_val('ptpldp',ptpldp.toFixed(2));

	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//ptpl
		var ptpl = 0;
		ptpl =  (kpt * power('veltubbha_'+id,npt) * Math.pow((( 3 + 1 / npt) / 0.0416 ),npt) / (144000 * power('idbha_'+id,(1 + npt)))) * parseFloat($('#longbha_'+id).val());
		completar_campo_val('ptpl_'+id,ptpl.toFixed(2));
	});

	//ptptdp
	var ptptdp = 0;
	ptptdp = fft_dp_tur * mw * Math.pow(veltubdp,2) / (25.8 * parseFloat($('#iddp').val())) * parseFloat($('#longdp').val());
	completar_campo_val('ptptdp',ptptdp.toFixed(2));

	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//ptpt
		var ptpt = 0;
		ptpt = parseFloat($('#fft_bha_tur_'+id).val()) * mw * power('veltubbha_'+id,2) / (25.8 * parseFloat($('#idbha_'+id).val())) * parseFloat($('#longbha_'+id).val());
		completar_campo_val('ptpt_'+id,ptpt.toFixed(2));
	});

	//laminarlabeldp
	var laminarlabeldp = '';
	laminarlabeldp = retdp > retc ? laminarlabeldp = 'TURBULENTO' : laminarlabeldp = 'LAMINAR';
	$('#laminarlabeldp').val(laminarlabeldp);
	if(laminarlabeldp == 'TURBULENTO'){
		$('#powerlosspb').val($('#ptptdp').val());
	}else if(laminarlabeldp == 'LAMINAR'){
		$('#powerlosspb').val($('#ptpldp').val());
	}
	

	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//laminarlabelbha
		var laminarlabelbha = '';
		laminarlabelbha = parseFloat($('#retbha_'+id).val()) > retc ? laminarlabeldp = 'TURBULENTO' : laminarlabeldp = 'LAMINAR';
		$('#laminarlabelbha_'+id).val(laminarlabelbha);
		if(laminarlabelbha == 'TURBULENTO'){
			$('#powerlossbha_'+id).val($('#ptpt_'+id).val());
		}else if(laminarlabelbha == 'LAMINAR'){
			$('#powerlossbha_'+id).val($('#ptpl_'+id).val());
		}

	});


	//pv
	var pv = 0;
	$('.pv').each(function(){
		if($(this).val() !== '' && $(this).val() !== '0' && $(this).val() !== 0){
			pv = parseFloat($(this).val());
		}
	});

	//yp
	var yp = 0;
	$('.yp').each(function(){
		if($(this).val() !== '' && $(this).val() !== '0' && $(this).val() !== 0){
			yp = parseFloat($(this).val());
		}
	});

	//velcritdp
	var velcritdp = 0;
	velcritdp = (97 * pv + 97 * Math.sqrt( ( Math.pow(pv,2) + (8.2 * mw * power('iddp',2) * yp)))) / (mw * parseFloat($('#iddp').val()) * 60);
	completar_campo_val('velcritdp',velcritdp.toFixed(2));

	
	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//velcritbha
		var velcritbha = 0;
		velcritbha = (97 * pv + 97 * Math.sqrt( ( Math.pow(pv,2) + (8.2 * mw * power('idbha_'+id,2) * yp)))) / (mw * parseFloat($('#idbha_'+id).val()) * 60);
		completar_campo_val('velcritbha_'+id,velcritbha.toFixed(2));
	});


	//ptbldp
	var ptbldp = 0;
	ptbldp = ((pv * veltubdp) / (1500 * power('iddp',2)) + yp / (225 * parseFloat($('#iddp').val()))) * parseFloat($('#longdp').val());
	completar_campo_val('ptbldp',ptbldp.toFixed(2));

	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//ptblbha
		var ptblbha = 0;
		ptblbha = ((pv * parseFloat($('#veltubbha_'+id).val())) / (1500 * power('idbha_'+id,2)) + yp / (225 * parseFloat($('#idbha_'+id).val()))) * parseFloat($('#longbha_'+id).val());
		completar_campo_val('ptblbha_'+id,ptblbha.toFixed(2));
	});


	//ptbtdp
	var ptbtdp = 0;
	ptbtdp = ( Math.pow(mw,0.75) * Math.pow(veltubdp,1.75) * Math.pow(pv,0.25) / (1800 * power('iddp',1.25) ) ) * parseFloat($('#longdp').val());
	completar_campo_val('ptbtdp',ptbtdp.toFixed(2));

	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//ptbtbha
		var ptbtbha = 0;
		ptbtbha = ( Math.pow(mw,0.75) * power('veltubbha_'+id,1.75) * Math.pow(pv,0.25) / (1800 * power('idbha_'+id,1.25) ) ) * parseFloat($('#longbha_'+id).val());
		completar_campo_val('ptbtbha_'+id,ptbtbha.toFixed(2));
	});


	//zbinghamflujodp
	var zbinghamflujodp = '';
	if(veltubdp > velcritdp){
		zbinghamflujodp = 'TURBULENTO';	
	}else{
		zbinghamflujodp = 'LAMINAR';
	}
	completar_campo_val('zbinghamflujodp',zbinghamflujodp);

	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//zbinghamflujobha
		var zbinghamflujobha = '';
		if(parseFloat($('#veltubbha_'+id).val()) > parseFloat($('#velcritbha_'+id).val())){
			zbinghamflujobha = 'TURBULENTO';	
		}else{
			zbinghamflujobha = 'LAMINAR';
		}
		completar_campo_val('zbinghamflujobha_'+id,zbinghamflujobha);
	});

	//zbinglosspb
	var zbinglosspb = 0;
	if(veltubdp > velcritdp){
		zbinglosspb = ptbtdp;	
	}else{
		zbinglosspb = ptbldp;
	}
	completar_campo_val('zbinglosspb',zbinglosspb.toFixed(2));

	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		//zbinglossbha
		var zbinglossbha = '';
		if(parseFloat($('#veltubbha_'+id).val()) > parseFloat($('#velcritbha_'+id).val())){
			zbinglossbha = parseFloat($('#ptbtbha_'+id).val());	
		}else{
			zbinglossbha = parseFloat($('#ptblbha_'+id).val());
		}
		completar_campo_val('zbinglossbha_'+id,zbinglossbha.toFixed(2));
	});	


	//CALCULOS 'DATOS DE LA BOMBA'
	//*******************************************************

	//galstk_1
	var galstk_1 = 0;
	if($('#pump_1_type').val() == 'DUPLEX'){
		galstk_1 = ((2 * Math.pow(parseFloat($('#pump_1_diameter').val()),2) - Math.pow(parseFloat($('#pump_1_rod').val()),2)) * parseFloat($('#pump_1_stroke').val()) / 6176.4) * 42 * (parseFloat($('#eff_1').val()) / 100);
	}else if($('#pump_1_type').val() == 'TRIPLEX'){
		galstk_1 = power('pump_1_diameter',2) * 0.000243 * $('#pump_1_stroke').val() * 42 * ($('#eff_1').val() / 100);
	}
	completar_campo_val('galstk_1',galstk_1.toFixed(2));

	//qgal_1
	var qgal_1 = 0;
	qgal_1 = $('#spm_1').val() * galstk_1;
	completar_campo_val('qgal_1',qgal_1.toFixed(2));

	//galstk_2
	var galstk_2 = 0;
	if($('#pump_2_type').val() == 'DUPLEX'){
		galstk_2 = ((2 * Math.pow(parseFloat($('#pump_2_diameter').val()),2) - Math.pow(parseFloat($('#pump_2_rod').val()),2)) * parseFloat($('#pump_2_stroke').val()) / 6176.4) * 42 * (parseFloat($('#eff_2').val()) / 100);
	}else if($('#pump_2_type').val() == 'TRIPLEX'){
		galstk_2 = power('pump_2_diameter',2) * 0.000243 * $('#pump_2_stroke').val() * 42 * ($('#eff_2').val() / 100);
	}
	completar_campo_val('galstk_2',galstk_2.toFixed(2));

	//qgal_2
	var qgal_2 = 0;
	qgal_2 = $('#spm_2').val() * galstk_2;
	completar_campo_val('qgal_2',qgal_2.toFixed(2));

	//galstk_3
	var galstk_3 = 0;
	if($('#pump_3_type').val() == 'DUPLEX'){
		galstk_3 = ((2 * Math.pow(parseFloat($('#pump_3_diameter').val()),2) - Math.pow(parseFloat($('#pump_3_rod').val()),2)) * parseFloat($('#pump_3_stroke').val()) / 6176.4) * 42 * (parseFloat($('#eff_3').val()) / 100);
	}else if($('#pump_3_type').val() == 'TRIPLEX'){
		galstk_3 = power('pump_3_diameter',2) * 0.000243 * $('#pump_3_stroke').val() * 42 * ($('#eff_3').val() / 100);
	}
	completar_campo_val('galstk_3',galstk_3.toFixed(2));

	//qgal_3
	var qgal_3 = 0;
	qgal_3 = $('#spm_3').val() * galstk_3;
	completar_campo_val('qgal_3',qgal_3.toFixed(2));

	//qgaltotal
	var qgaltotal = 0;
	qgaltotal = qgal_1 + qgal_2 + qgal_3;
	completar_campo_val('qgaltotal',qgaltotal.toFixed(2));

	//CALCULOS INFORMACION OPERACIONAL

	//drillingtimetotal
	var drillingtimetotal = 0;
	$('.drillingt').each(function(){
		if($(this).val() !== ''){
			drillingtimetotal = drillingtimetotal + parseFloat($(this).val());
		}
	});
	completar_campo_val('drillingtimetotal',drillingtimetotal.toFixed(1));


	//CALCULOS SECCION ANULAR
	//-------------------------------------------------------------------------------------


	$('.velanular').each(function(){
		var id = $(this).attr('id');
		id = id.split('velanular_');
		id = id[1];

		//velanular
		var velanular = 0;
		velanular =  0.408 * qgaltotal / (power('idhole_'+id, 2) - power('odstring_'+id,2));
		completar_campo_val('velanular_'+id,velanular.toFixed(2));
	});

	//t_100
	var t_100 = 0;
	$('.t_100').each(function(){
		if($(this).val() !== ''){
			t_100 = $(this).val();
		}
	});
	completar_campo_val('t_100',t_100);

	//t_3
	var t_3 = 0;
	$('.t_3').each(function(){
		if($(this).val() !== ''){
			t_3 = $(this).val();
		}
	});
	completar_campo_val('t_3',t_3);

	var npa = 0;
	npa = 0.657 * log10(t_100/t_3);
	completar_campo_val('npa',npa.toFixed(2));

	var kpa = 0;
	kpa = 511 * t_3 / Math.pow(5.11,npa);
	completar_campo_val('kpa',kpa.toFixed(2));

	var apa = 0;
	apa = (log10(npa)+3.93) / 50;
	completar_campo_val('apa',apa.toFixed(3));

	var bpb = 0;
	bpb = (1.75 - (log10(npa))) / 7;
	completar_campo_val('bpb',bpb.toFixed(3));

	var reycritanular = 0;
	reycritanular=  3470 - 1370 * npa;
	completar_campo_val('reycritanular',reycritanular.toFixed(2));

	$('.reyanular').each(function(){
		var id = $(this).attr('id');
		id = id.split('reyanular_');
		id = id[1];

		//reyanular
		var reyanular = 0;
		reyanular =  (109100 * mw * power('velanular_'+id,(2 - npa)) / kpa) * Math.pow((0.0208*(parseFloat($('#idhole_'+id).val()) - parseFloat($('#odstring_'+id).val()))/(2+1/npa)),npa);
		completar_campo_val('reyanular_'+id,reyanular.toFixed(2));
	});

	$('.faclamianular').each(function(){
		var id = $(this).attr('id');
		id = id.split('faclamianular_');
		id = id[1];

		//faclamianular
		var faclamianular = 0;
		faclamianular =  16 / parseFloat($('#reyanular_'+id).val());
		completar_campo_val('faclamianular_'+id,faclamianular.toFixed(6));
	});

	$('.faclamiturb').each(function(){
		var id = $(this).attr('id');
		id = id.split('faclamiturb_');
		id = id[1];

		//faclamiturb
		var faclamiturb = 0;
		faclamiturb =  apa / power('reyanular_'+id,bpb);
		completar_campo_val('faclamiturb_'+id,faclamiturb.toFixed(6));
	});


	$('.ppowerturb').each(function(){
		var id = $(this).attr('id');
		id = id.split('ppowerturb_');
		id = id[1];

		//ppowerturb
		var ppowerturb = 0;
		ppowerturb =  parseFloat($('#faclamiturb_'+id).val()) * mw * power('velanular_'+id,2) * parseFloat($('#longanular_'+id).val()) / (21.1 * (parseFloat($('#idhole_'+id).val()) - parseFloat($('#odstring_'+id).val())));
		completar_campo_val('ppowerturb_'+id,ppowerturb.toFixed(2));
	});

	$('.ppowerlam').each(function(){
		var id = $(this).attr('id');
		id = id.split('ppowerlam_');
		id = id[1];

		//ppowerlam
		var ppowerlam = 0;
		ppowerlam =  kpa * parseFloat($('#longanular_'+id).val()) * power('velanular_'+id,npa) * Math.pow((2+1/npa)/0.0208,npa)/ (144000 * Math.pow((parseFloat($('#idhole_'+id).val()) - parseFloat($('#odstring_'+id).val())),(1 + npa)));
		completar_campo_val('ppowerlam_'+id,ppowerlam.toFixed(2));
	});

	$('.velcritanul').each(function(){
		var id = $(this).attr('id');
		id = id.split('velcritanul_');
		id = id[1];

		//velcritanul
		var velcritanul = 0;
		var raiz = Math.sqrt(Math.pow(pv,2) + 9.256 * Math.pow((fval('idhole_'+id) - fval('odstring_'+id)),2) * yp * mw);
		velcritanul = (1.078 * pv + 1.078 * raiz) / (mw * (fval('idhole_'+ id) - fval('odstring_'+id)));
		completar_campo_val('velcritanul_'+id,velcritanul.toFixed(2));
	});


	$('.qcritico').each(function(){
		var id = $(this).attr('id');
		id = id.split('qcritico_');
		id = id[1];

		//qcritico
		var qcritico = 0;
		qcritico = 2.45 * fval('velcritanul_'+id) * (power('idhole_'+id,2) - power('odstring_'+id,2));
		completar_campo_val('qcritico_'+id,qcritico.toFixed(2));
	});

	$('.pbinlam').each(function(){
		var id = $(this).attr('id');
		id = id.split('pbinlam_');
		id = id[1];

		//pbinlam
		var pbinlam = 0;
		pbinlam = (pv * fval('velanular_'+id) / (1000 * Math.pow((fval('idhole_'+id) - fval('odstring_'+id)),2)) + yp / (200*(fval('idhole_'+id) - fval('odstring_'+id)))) * fval('longanular_'+id);
		completar_campo_val('pbinlam_'+id,pbinlam.toFixed(2));
	});

	$('.pbintur').each(function(){
		var id = $(this).attr('id');
		id = id.split('pbintur_');
		id = id[1];

		//pbintur
		var pbintur = 0;
		pbintur = Math.pow(mw,0.75) * Math.pow(fval('velanular_'+id),1.75) * Math.pow(pv,0.25) * fval('longanular_'+id) / (1396 * Math.pow((fval('idhole_'+id) - fval('odstring_'+id)),1.25));
		completar_campo_val('pbintur_'+id,pbintur.toFixed(2));
	});

	$('.ztipoflujoanularp').each(function(){
		var id = $(this).attr('id');
		id = id.split('ztipoflujoanularp_');
		id = id[1];

		//ztipoflujoanularp
		var ztipoflujoanularp = '';
		if(fval('reyanular_'+id) > fval('reycritanular')){
			ztipoflujoanularp = 'TURBULENT';
			completar_campo_val('zapowerloss_'+id,fval('ppowerturb_'+id));
		}else{
			ztipoflujoanularp = 'LAMINAR';
			completar_campo_val('zapowerloss_'+id,fval('ppowerlam_'+id));	
		}
		completar_campo_val('ztipoflujoanularp_'+id,ztipoflujoanularp);	
	});

	$('.ztipoflujoanularb').each(function(){
		var id = $(this).attr('id');
		id = id.split('ztipoflujoanularb_');
		id = id[1];

		//ztipoflujoanularb
		var ztipoflujoanularb = '';
		if(fval('velanular_'+id) > fval('velcritanul_'+id)){
			ztipoflujoanularb = 'TURBULENT';
			completar_campo_val('zabinghloss_'+id,fval('pbintur_'+id));
		}else{
			ztipoflujoanularb = 'LAMINAR';
			completar_campo_val('zabinghloss_'+id,fval('pbinlam_'+id));
		}
		completar_campo_val('ztipoflujoanularb_'+id,ztipoflujoanularb);	
	});

	
	$('.capanul').each(function(){
		var id = $(this).attr('id');
		id = id.split('capanul_');
		id = id[1];
		
		//capanul
		var capanul = 0;
		capanul =  (power('idhole_'+id,2) - power('odstring_'+id,2)) * fval('longanular_'+id) / 1029.4
		completar_campo_val('capanul_'+id,capanul.toFixed(2));
	});

	//capanultotal
	var capanultotal = 0;
	$('.capanul').each(function(){
		if($(this).val() !== '' && $(this).val() !== 'NaN'){
			capanultotal = capanultotal + parseFloat($(this).val());
		}
	});
	completar_campo_val('capanultotal',capanultotal.toFixed(2));

	//totalanulpow
	var totalanulpow = 0;
	$('.zapowerloss').each(function(){
		if($(this).val() !== '' && $(this).val() !== 'NaN' && $(this).val() !== NaN){
			totalanulpow = totalanulpow + parseFloat($(this).val());
		}	
	});
	completar_campo_val('totalanulpow',totalanulpow.toFixed(2));
	completar_campo_val('ztotalanulpow',totalanulpow.toFixed(2));

	//totalanulbin
	var totalanulbin = 0;
	$('.zabinghloss').each(function(){
		if($(this).val() !== '' && $(this).val() !== 'NaN' && $(this).val() !== NaN){
			totalanulbin = totalanulbin + parseFloat($(this).val());
		}
	});
	completar_campo_val('totalanulbin',totalanulbin.toFixed(2));
	completar_campo_val('ztotalanulbin',totalanulbin.toFixed(2));

	//totalstringpow
	totalstringpow = 0;
	$('.powerlossbha').each(function(){
		if($(this).val() !== 'NaN' && $(this).val() !== ''){
			totalstringpow = totalstringpow + parseFloat($(this).val());
		}
	});
	completar_campo_val('totalstringpow',totalstringpow.toFixed(2));
	completar_campo_val('ztotalstringpow',totalstringpow.toFixed(2));
	
	//totalstringbing
	totalstringbing = 0;
	$('.zbinglossbha').each(function(){
		if($(this).val() !== 'NaN' && $(this).val() !== ''){
			totalstringbing = totalstringbing + parseFloat($(this).val());
		}
	});
	completar_campo_val('totalstringbing',totalstringbing.toFixed(2));
	completar_campo_val('ztotalstringbing',totalstringbing.toFixed(2));

	//CALCULOS HIDRAULICA, RESUMEN DE PERDIDAS DE PRESION
	
	//funelv
	var funelv = 0;
	$('.funelv').each(function(){
		if($(this).val() !== ''){
			funelv = $(this).val();
		}
	});

	//lossesurf
	var lossesurf = 0
	lossesurf = (mw / 9) * (funelv / 45 ) * (qgaltotal / 400) * 25;
	completar_campo_val('lossesurf',lossesurf.toFixed(2));
	completar_campo_val('zlossesurf',lossesurf.toFixed(2));

	totalmotor_1 = fval('totalmotor_1');
	if(totalmotor_1 == ''){totalmotor_1 = 0;}

	totalmotor_2 = fval('totalmotor_2');
	if(totalmotor_2 == ''){totalmotor_2 = 0;}

	//totallossespow
	var totallossespow = 0;
	totallossespow = lossesurf + totalstringpow + totalanulpow + totalmotor_1 + pdbit;
	completar_campo_val('totallossespow',totallossespow.toFixed(2));

	//totallossesbin
	var totallossesbin = 0;
	totallossesbin = lossesurf + totalstringbing + totalanulbin + totalmotor_2 + pdbit;
	completar_campo_val('totallossesbin',totallossesbin.toFixed(2));


	if(fval('bitdepth') > fval('md')){
		$('#geometria_pozo .warning').show();
	}else{
		$('#geometria_pozo .warning').hide();	
	}
}