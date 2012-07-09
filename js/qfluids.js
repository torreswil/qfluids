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
	//************************************************
	$('.pick_bit').focus(function(){
		$('#select_bit_overlay').show();
		$(this).attr('disabled','disabled');
	});

	$('#bit_overlay_listabrocas').change(function(){
		var no_option = '<option value="" selected="selected">Seleccione...</option>';
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
		var no_option = '<option value="" selected="selected">Seleccione...</option>';
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
		var no_option = '<option value="" selected="selected">Seleccione...</option>';
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
		var no_option = '<option value="" selected="selected">Seleccione...</option>';
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
	$('.pick_casing').change(function(){
		if($(this).val() !== ''){
			$('#select_casing_overlay').show();
			$(this).attr('disabled','disabled');	
		}
	});

	function hide_casing_overlay(){
		$('#select_casing_overlay').hide();	
	}

	//clocks
	$('.clock_1,.clock_2,.clock_3').change(function(){
		var this_class = $(this).attr('class');
		var new_hour = $(this).val();
		$('.'+this_class+'_label').html(new_hour);
	});

	//CALCULOS TOTALES
	//************************************************
	$('#qfluids_form input').keyup(function(){
		correr_calculos();
	});
	$('#qfluids_form select').change(function(){
		correr_calculos();
	})
	$('#qfluids_form input[type="button"]').click(function(){
		correr_calculos();
	})

	function correr_calculos(){
		correr_calculos_broca();
		correr_calculos_propiedadeslodo();
		corregir_data();
	}

	function corregir_data(){
		$('#qfluids_form input').each(function(){
			if($(this).val() == 'NaN' || $(this).val() == 'Infinity'){
				log($(this).val());
				$(this).val(0);
			}
		});	
	}

	function completar_campo_val(nombre_campo,valor){
		if(valor == Infinity || valor == NaN){
			$('#'+nombre_campo).val(0);
			log(valor+'_error');
		}else{
			$('#'+nombre_campo).val(valor);	
		}
	}

	//CALCULOS 'BROCA'
	//************************************************
	function correr_calculos_broca(){
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
	}

	//CALCULOS 'PROPIEDADES DEL LODO'
	//************************************************
	function correr_calculos_propiedadeslodo(){
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
	}

});