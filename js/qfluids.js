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

	//CLICK EN UN ENLACE DE LA BARRA LATERAL
	$('.nav_links a').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
		$('.this_panel').hide();
		$(target).show();
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
				log(r[0].id);
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
		run_calculos_broca();	
	}


	//CUADRO DE DIALOGO SELECCION DE CASING
	//*************************************************************************************************************************
	$('.pick_casing').change(function(){
		if($(this).val() !== ''){
			$('#select_casing_overlay').show();
			$(this).attr('disabled','disabled');	
		}
	});

	function hide_casing_overlay(){
		$('#select_casing_overlay').hide();	
	}



	//CUADRO DE DIALOGO SELECCION DE BOMBAS
	//**************************************************************************************************************************
	$('.pick_pump').focus(function(e){
		e.preventDefault();
		$(this).attr('disabled','disabled');
		var pump_element = $(this).attr('id');
		pump_element = pump_element.split('_');
		pump_element = pump_element[1];
		$('#select_pump_overlay .current_pump_number').html(pump_element);
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
		if($(this).val() !== ''){
			var data = {
				'maker'			: $('#pump_picker_maker').val(),
				'type'			: $('#pump_picker_type').val(),
			};	
			$.post('/rest/get_pump_strokelength',data,function(r){
				log(r);
				var append_string = no_option;
				$(r).each(function(){
					append_string = append_string + '<option value="'+this.strokelength+'">'+this.strokelength+' in</option>';
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
					append_string = append_string + '<option value="'+this.linerdiameter+'">'+this.linerdiameter+' in</option>';
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
		if($(this).val() !== ''){	
			var data = {
				'maker'			: $('#pump_picker_maker').val(),
				'type'			: $('#pump_picker_type').val(),
				'strokelength'	: $('#pump_picker_stroke').val(),
				'linerdiameter'	: $('#pump_picker_diameter').val()
			};
			$.post('/rest/get_pump_rod',data,function(r){
				var append_string = no_option;
				$(r).each(function(){
					if(this.rod !== null){
						append_string = append_string + '<option value="'+this.rod+'">'+this.rod+' in</option>';
					}			
				});
				$('#pump_picker_rod').html(append_string);
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
		if($(this).val() !== ''){
			var data = {
				'maker'			: $('#pump_picker_maker').val(),
				'type'			: $('#pump_picker_type').val(),
				'strokelength'	: $('#pump_picker_stroke').val(),
				'linerdiameter'	: $('#pump_picker_diameter').val(),
				'rod'			: $('#pump_picker_rod').val(),
				'modelo'		: $('#pump_picker_model').val()
			};			
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
	});

	//PUMP PICKER: CONTINUE
	$('#btn_pump_selected').click(function(e){
		e.preventDefault();
		var pump_number = parseInt($('#select_pump_overlay .current_pump_number').html());
		$('#pump_'+pump_number+'_maker').val($('#pump_picker_maker').val());
		$('#pump_'+pump_number+'_type').val($('#pump_picker_type').val());
		$('#pump_'+pump_number+'_stroke').val($('#pump_picker_stroke').val());
		$('#pump_'+pump_number+'_diameter').val($('#pump_picker_diameter').val());
		$('#pump_'+pump_number+'_rod').val($('#pump_picker_rod').val());
		$('#pump_'+pump_number+'_model').val($('#pump_picker_model').val());
		$('#pump_'+pump_number+'_presure').val($('#pump_picker_presure').val());
	
		var no_option = '<option value="" selected="selected">Select...</option>';
		$('#pump_picker_maker').val('');
		$('#pump_picker_type').html(no_option);
		$('#pump_picker_stroke').html(no_option);
		$('#pump_picker_diameter').html(no_option);
		$('#pump_picker_rod').html(no_option);
		$('#pump_picker_model').html(no_option);
		$('#pump_picker_presure').html(no_option);
		$('#select_pump_overlay .current_pump_number').html('');
		$('#select_pump_overlay').hide();

		$('#pump_'+pump_number+'_maker').removeAttr('disabled');

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
		}else if(cantidad_completos == 8){
			alert('You can have maximum 8 Drill String tools in your system.');
		}else{
			$.post('/rest/new_drill_string_row',{'drillstring_qty' : first_id},function(r){
				$('.drill_string_pieces').prepend(r);
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
				$('#row_select_drill_string_' + id).remove();	
			}else{
				$('.row_select_drill_string select,.row_select_drill_string input').val('');
			}
			correr_calculos();	
		}else{
			return false;
		}
	});
	//********************************************************************************************************************************************
	//clocks
	$('.clock_1,.clock_2,.clock_3').change(function(){
		var this_class = $(this).attr('class');
		var new_hour = $(this).val();
		$('.'+this_class+'_label').html(new_hour);
	});



	//*******************************************************************************
	// CALCULOS 																	*
	//*******************************************************************************
	
	$('#qfluids_form input').live('keyup',function(){
		correr_calculos();
	});
	$('#qfluids_form select').live('change',function(){
		correr_calculos();
	})
	$('#qfluids_form input[type="button"]').live('click',function(){
		correr_calculos();
	})

	function correr_calculos(){
		calculos_raw();
		corregir_data();
	}

	function corregir_data(){
		$('#qfluids_form input').each(function(){
			if($(this).val() == 'NaN' || $(this).val() == 'Infinity'){
				$(this).val(0);
			}
		});	
	}

	function completar_campo_val(nombre_campo,valor){
		$('#'+nombre_campo).val(valor);	
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
		completar_campo_val('tfa',tfa);
		
		//VEL JETS
		var veljet = 0;
		veljet = 0.32 * parseFloat($('#qgaltotal').val()) / tfa;
		completar_campo_val('veljet',veljet);
		

		//PD BIT
		var pdbit = 0;
		var mw = 0;
		$('.mw').each(function(){
			if($(this).val() !== ''){
				mw = parseFloat($(this).val());
			}
		});
		pdbit = Math.pow(veljet,2) * mw / 1120;
		completar_campo_val('pdbit',pdbit);

		//HHPBIT
		var hhp = pdbit * $('#qgaltotal').val() / 1714;
		completar_campo_val('hhp',hhp);

		//HSI
		var hsi = hhp / (jets_sum * 0.000767);
		completar_campo_val('hsi',hsi);
	

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
		completar_campo_val('n_1',n_1);

		//n_2
		var n_2 = 0;
		n_2 = 1.44 * Math.log(((2*pv_2)+yp_2)/(pv_2 + yp_2));
		completar_campo_val('n_2',n_2);

		//n_3
		var n_3 = 0;
		n_3 = 1.44 * Math.log(((2*pv_3)+yp_3)/(pv_3 + yp_3));
		completar_campo_val('n_3',n_3);

		//k_1
		var k_1 = 0;
		k_1 = (Math.pow(511, n_1 * -1) * (pv_1 + yp_1));
		completar_campo_val('k_1',k_1);

		//k_2
		var k_2 = 0;
		k_2 = (Math.pow(511, n_2 * -1) * (pv_2 + yp_2));
		completar_campo_val('k_2',k_2);

		//k_3
		var k_3 = 0;
		k_3 = (Math.pow(511, n_3 * -1) * (pv_3 + yp_3));
		completar_campo_val('k_3',k_3);

		//sol_1
		var sol_1 = 0;
		sol_1 = 100 - $('#wa_1').val() - $('#oil_1').val();
		sol_1 = (sol_1 == 100) ? 0 : sol_1;
		completar_campo_val('sol_1',sol_1);

		//sol_2
		var sol_2 = 0;
		sol_2 = 100 - $('#wa_2').val() - $('#oil_2').val();
		sol_2 = (sol_2 == 100) ? 0 : sol_2;
		completar_campo_val('sol_2',sol_2);

		//sol_3
		var sol_3 = 0;
		sol_3 = 100 - $('#wa_3').val() - $('#oil_3').val();
		sol_3 = (sol_3 == 100) ? 0 : sol_3;
		completar_campo_val('sol_3',sol_3);

		//asg_1
		var asg_1 = 0;
		asg_1 = (($('#mw_1').val()/8.33) - (($('#wa_1').val() / 100) + ($('#oil_1').val() * 0.84/100))) / (sol_1 / 100);
		completar_campo_val('asg_1',asg_1);

		//asg_2
		var asg_2 = 0;
		asg_2 = (($('#mw_2').val()/8.33) - (($('#wa_2').val() / 100) + ($('#oil_2').val() * 0.84/100))) / (sol_2 / 100);
		completar_campo_val('asg_2',asg_2);

		//asg_3
		var asg_3 = 0;
		asg_3 = (($('#mw_3').val()/8.33) - (($('#wa_3').val() / 100) + ($('#oil_3').val() * 0.84/100))) / (sol_3 / 100);
		completar_campo_val('asg_3',asg_3);

		//lgspercent_1
		var lgspercent_1 = 0;
		lgspercent_1 = ((parseFloat($('#wa_1').val()) + (sol_1 * 4.2) + (parseFloat($('#oil_1').val()) * 0.84)) - (100 * (parseFloat($('#mw_1').val()) / 8.33))) / 1.6;
		completar_campo_val('lgspercent_1',lgspercent_1);

		//lgspercent_2
		var lgspercent_2 = 0;
		lgspercent_2 = ((parseFloat($('#wa_2').val()) + (sol_2 * 4.2) + (parseFloat($('#oil_2').val()) * 0.84)) - (100 * (parseFloat($('#mw_2').val()) / 8.33))) / 1.6;
		completar_campo_val('lgspercent_2',lgspercent_2);

		//lgspercent_3
		var lgspercent_3 = 0;
		lgspercent_3 = ((parseFloat($('#wa_3').val()) + (sol_3 * 4.2) + (parseFloat($('#oil_3').val()) * 0.84)) - (100 * (parseFloat($('#mw_3').val()) / 8.33))) / 1.6;
		completar_campo_val('lgspercent_3',lgspercent_3);

		//hgspercent_1
		var hgspercent_1 = 0;
		hgspercent_1 = (100 * (parseFloat($('#mw_1').val()) / 8.33 ) - (parseFloat($('#wa_1').val()) + (sol_1 * 2.6) + (parseFloat($('#oil_1').val()) * 0.84))) / 1.6;
		completar_campo_val('hgspercent_1',hgspercent_1);

		//hgspercent_2
		var hgspercent_2 = 0;
		hgspercent_2 = (100 * (parseFloat($('#mw_2').val()) / 8.33 ) - (parseFloat($('#wa_2').val()) + (sol_2 * 2.6) + (parseFloat($('#oil_2').val()) * 0.84))) / 1.6;
		completar_campo_val('hgspercent_2',hgspercent_2);

		//hgspercent_3
		var hgspercent_3 = 0;
		hgspercent_3 = (100 * (parseFloat($('#mw_3').val()) / 8.33 ) - (parseFloat($('#wa_3').val()) + (sol_3 * 2.6) + (parseFloat($('#oil_3').val()) * 0.84))) / 1.6;
		completar_campo_val('hgspercent_3',hgspercent_3);

		//lgsppb_1
		var lgsppb_1 = 0;
		lgsppb_1 = (lgspercent_1 / 100) * 909.7;
		completar_campo_val('lgsppb_1',lgsppb_1);

		//lgsppb_2
		var lgsppb_2 = 0;
		lgsppb_2 = (lgspercent_2 / 100) * 909.7;
		completar_campo_val('lgsppb_2',lgsppb_2);

		//lgsppb_3
		var lgsppb_3 = 0;
		lgsppb_3 = (lgspercent_3 / 100) * 909.7;
		completar_campo_val('lgsppb_3',lgsppb_3);

		//hgsppb_1
		var hgsppb_1 = 0;
		hgsppb_1 = (hgspercent_1 / 100) * 979;
		completar_campo_val('hgsppb_1',hgsppb_1);

		//hgsppb_2
		var hgsppb_2 = 0;
		hgsppb_2 = (hgspercent_2 / 100) * 979;
		completar_campo_val('hgsppb_2',hgsppb_2);

		//hgsppb_3
		var hgsppb_3 = 0;
		hgsppb_3 = (hgspercent_3 / 100) * 979;
		completar_campo_val('hgsppb_3',hgsppb_3);

		//capdp
		var capdp = 0;
		capdp = Math.pow(parseFloat($('#iddp').val()),2) / 1029.4;
		completar_campo_val('capdp',capdp);

		//capvdp
		var capvdp = 0;
		capvdp = capdp * parseFloat($('#longdp').val());
		completar_campo_val('capvdp',capvdp);

		//dispdp
		var dispdp = 0;
		dispdp = (Math.pow(parseFloat($('#oddp').val()),2) - Math.pow(parseFloat($('#iddp').val()),2)) / 1029.4;
		completar_campo_val('dispdp',dispdp);

		//dispvdp
		var dispvdp = 0;
		dispvdp = dispdp * parseFloat($('#longdp').val());
		completar_campo_val('dispvdp',dispvdp);

		//drill_string_tools
		$('.select_drill_string').each(function(){
			var id_raw = $(this).attr('id');
			var id = id_raw.split('select_drill_string_');
			id = id[1];

			//capbha
			var capbha = 0 
			capbha = Math.pow(parseFloat($('#idbha_'+id).val()),2)/1029.4
			completar_campo_val('capbha_'+id,capbha);

			//capvbha
			var capvbha = 0;
			capvbha = parseFloat($('#capbha_'+id).val()) * $('#longbha_'+id).val();
			completar_campo_val('capvbha_'+id,capvbha);

			//dispbha
			var dispbha = 0;
			dispbha = (parseFloat(Math.pow($('#odbha_'+id).val(),2)) - parseFloat(Math.pow($('#idbha_'+id).val(),2)))/1029.4;
			completar_campo_val('dispbha_'+id,dispbha);

			//dispvbha
			var dispvbha = 0;
			dispvbha = parseFloat($('#dispbha_'+id).val()) * parseFloat($('#longbha_'+id).val());
			completar_campo_val('dispvbha_'+id,dispvbha);
		});

		//totalbha
		var totalbha = 0;
		$('.longbha').each(function(){
			totalbha = totalbha + parseFloat($(this).val());
		});
		completar_campo_val('totalbha',totalbha);

		//totalds
		var totalds = 0;
		totalds = totalbha + parseFloat($("#longdp").val());
		completar_campo_val('totalds',totalds);

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
		completar_campo_val('disptotal',disptotal);

		//CALCULOS 'DATOS DE LA BOMBA'
		//*******************************************************

		

	}

});