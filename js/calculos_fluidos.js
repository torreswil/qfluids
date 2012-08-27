$(function(){
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
	if(!isNaN($('#'+selector).val()) && isFinite($('#'+selector).val())){
		return parseFloat($('#'+selector).val());
	}else{
		return 0;
	}
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

	//CALCULOS PERSONAL
	//***********************************************
	var zenginers_cost_today = 0;

	if(fval('zenginers_today') > fval('maximun_enginers')){
		zenginers_cost_today = fval('enginer_cost') * fval('maximun_enginers');	
	}else{
		zenginers_cost_today = fval('enginer_cost') * fval('zenginers_today');	
	}
	
	
	completar_campo_val('zenginers_cost_today',zenginers_cost_today);


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


	//validar que en la tabla del drill string el id no sea mayor que el od
	$('.select_drill_string').each(function(){
		var id_raw = $(this).attr('id');
		var id = id_raw.split('select_drill_string_');
		id = id[1];

		var odbha = fval('odbha_'+id);
		var idbha = fval('idbha_'+id);

		if(idbha >= odbha){
			$('#idbha_'+id).addClass('input_error').attr('title','The ID can not be equal or grater than the OD');
		}else{
			$('#idbha_'+id).removeClass('input_error').removeAttr('title');	
		}


	});

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
		var ohid	= fval('openhole');

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
	var zascount 				= 0;
	var hidraulics_table 		= '';
	var as_math_power_content 	= '';
	var as_math_bingham_content	= '';

	$(astable).each(function(){
		zascount = zascount + 1;
		
		hidraulics_table = hidraulics_table + '<tr>'
        hidraulics_table = hidraulics_table + '    <td><input type="text" style="width:100px;" value="'+this.name+'" /></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" id="idhole_'+zascount+'" name="idhole_'+zascount+'" class="idhole" style="margin-right: 0px; width: 70px;" value="'+this.idhole+'" disabled="disabled" /></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" id="odstring_'+zascount+'" name="odstring_'+zascount+'" class="odstring" style="margin-right: 0px; width: 70px;" value="'+this.odstring+'" disabled="disabled"/></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" id="longanular_'+zascount+'" name="longanular_'+zascount+'" class="longanular" style="margin-right: 0px; width: 70px;" value="'+this.len+'" disabled="disabled" /></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" disabled="disabled" id="capanul_'+zascount+'" name="capanul_'+zascount+'" class="capanul" style="margin-right: 0px; width: 70px;"/></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" disabled="disabled" id="zasvel_'+zascount+'" name="zasvel_'+zascount+'" class="zasvel" style="margin-right: 0px; width: 70px;"/></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" id="zapowerloss_'+zascount+'" name="zapowerloss_'+zascount+'" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" id="zabinghloss_'+zascount+'" name="zabinghloss_'+zascount+'" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>';
        hidraulics_table = hidraulics_table + '    <td><input type="text" disabled="disabled" id="zregime_'+zascount+'" name="zregime_'+zascount+'" class="zregime" style="margin-right: 0px; width: 70px;"/></td>';
        hidraulics_table = hidraulics_table + '</tr>';

        as_math_power_content = as_math_power_content +	'<tr class="group'+zascount+'">';
        as_math_power_content = as_math_power_content +		'<td class="label_m"><label>'+this.name+'</label></td>';
        as_math_power_content = as_math_power_content +	    '<td><input disabled="disabled" type="text" style="width:100px;" class="reyanular" id="reyanular_'+zascount+'" name="reyanular_'+zascount+'" /></td>';
        as_math_power_content = as_math_power_content +	    '<td><input disabled="disabled" type="text" style="width:100px;" id="faclamianular_'+zascount+'" name="faclamianular_'+zascount+'" class="faclamianular"></td>';
        as_math_power_content = as_math_power_content +	    '<td><input disabled="disabled" type="text" style="width:100px;" class="faclamiturb" id="faclamiturb_'+zascount+'" name="faclamiturb_'+zascount+'" /></td>';
        as_math_power_content = as_math_power_content +	    '<td><input disabled="disabled" type="text" style="width:100px;" class="ppowerlam" id="ppowerlam_'+zascount+'" name="ppowerlam_'+zascount+'"></td>';
        as_math_power_content = as_math_power_content +	    '<td><input disabled="disabled" type="text" style="width:100px;" class="ppowerturb" id="ppowerturb_'+zascount+'" name="ppowerturb_'+zascount+'"></td>';
        as_math_power_content = as_math_power_content +	    '<td><input disabled="disabled" type="text" style="width:100px;" class="ztipoflujoanularp" id="ztipoflujoanularp_'+zascount+'" name="ztipoflujoanularp_'+zascount+'" /></td>';
        as_math_power_content = as_math_power_content +	'</tr>';

        as_math_bingham_content = as_math_bingham_content + '<tr class="group_'+zascount+'">';
        as_math_bingham_content = as_math_bingham_content +     '<td class="label_m"><label>'+this.name+'</label></td>';
        as_math_bingham_content = as_math_bingham_content +     '<td><input disabled="disabled" type="text" style="width:100px;" id="velanular_'+zascount+'" class="velanular" name="velanular_'+zascount+'"></td>';
        as_math_bingham_content = as_math_bingham_content +     '<td><input disabled="disabled" type="text" style="width:100px;" class="velcritanul" id="velcritanul_'+zascount+'" name="velcritanul_'+zascount+'" /></td>';
        as_math_bingham_content = as_math_bingham_content +     '<td><input disabled="disabled" type="text" style="width:100px;" class="qcritico" id="qcritico_'+zascount+'" name="qcritico_'+zascount+'" /></td>';
        as_math_bingham_content = as_math_bingham_content +     '<td><input disabled="disabled" type="text" style="width:100px;" class="pbinlam" id="pbinlam_'+zascount+'" name="pbinlam_'+zascount+'" /></td>';
        as_math_bingham_content = as_math_bingham_content +     '<td><input disabled="disabled" type="text" style="width:100px;" class="pbintur" id="pbintur_'+zascount+'" name="pbintur_'+zascount+'" /></td>';
        as_math_bingham_content = as_math_bingham_content +     '<td><input disabled="disabled" type="text" style="width:100px;" class="ztipoflujoanularb" id="ztipoflujoanularb_'+zascount+'" name="ztipoflujoanularb_'+zascount+'" /></td>';
        as_math_bingham_content = as_math_bingham_content + '</tr>';
	});
	$('#hidraulics_table_content').html(hidraulics_table);
	$('#as_math_power_content').html(as_math_power_content);
	$('#as_math_bingham_content').html(as_math_bingham_content);


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
		completar_campo_val('zasvel_'+id,velanular.toFixed(2));
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
		completar_campo_val('zregime_'+id,ztipoflujoanularb);		
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
		if(!isNaN($(this).val()) && isFinite($(this).val())){
			capanultotal = capanultotal + parseFloat($(this).val());
		}
	});
	completar_campo_val('capanultotal',capanultotal.toFixed(2));

	//totalanulpow
	var totalanulpow = 0;
	$('.zapowerloss').each(function(){
		if(!isNaN($(this).val()) && isFinite($(this).val())){
			totalanulpow = totalanulpow + parseFloat($(this).val());
		}	
	});
	completar_campo_val('totalanulpow',totalanulpow.toFixed(2));
	completar_campo_val('ztotalanulpow',totalanulpow.toFixed(2));

	//totalanulbin
	var totalanulbin = 0;
	$('.zabinghloss').each(function(){
		if(!isNaN($(this).val()) && isFinite($(this).val())){
			totalanulbin = totalanulbin + parseFloat($(this).val());
		}
	});
	completar_campo_val('totalanulbin',totalanulbin.toFixed(2));
	completar_campo_val('ztotalanulbin',totalanulbin.toFixed(2));

	//totalstringpow
	totalstringpow = 0;
	$('.powerlossbha').each(function(){
		if(!isNaN($(this).val()) && isFinite($(this).val())){
			totalstringpow = totalstringpow + parseFloat($(this).val());
		}
	});
	completar_campo_val('totalstringpow',totalstringpow.toFixed(2));
	completar_campo_val('ztotalstringpow',totalstringpow.toFixed(2));
	
	//totalstringbing
	totalstringbing = 0;
	$('.zbinglossbha').each(function(){
		if(!isNaN($(this).val()) && isFinite($(this).val())){
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