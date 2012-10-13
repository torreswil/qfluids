$(function(){	

	/*==========================================================================================================*/
	// SAVE REPORT
	/*==========================================================================================================*/
	$('#btn_save_report').click(function(e){
                
		e.preventDefault();
                
                //Muestro el overlay para el estado del save report
                $("#save_report_overlay").show();                
                
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
                        
                        //Se borra los textos de los trabajos registrados en el overlay
                        $("#save_report_jobs").empty();
                        
                        //Se validan los formularios antes de proceder a guardar
                        if(validate_mud_properties()) {                                
                                save_mud_properties();
                        }
                        
                        if(validate_solids_control()) {
                                save_solids_control();
                        }
                        
                        //alert('saving function trigger');                                
		}
	});
        
        //close the overlay on cancel
	$('#save_report_overlay .close_link').click(function(e){
		e.preventDefault();
		$('#save_report_overlay').hide();
	});
        
        //Funcion para mostrar el proceso que guarda del reporte
        function setStatusReport(job, status) {                
                if(status=='error') {
                        $("#save_report_jobs").append('<p style="color: red">'+job+'</p>');
                } else if(status=='valid') {
                        $("#save_report_jobs").append('<p style="color: green">'+job+'</p>');
                } else {
                        $("#save_report_jobs").append('<p>'+job+'</p>');
                }                
        }
        
        /**
         * MUD PROPERTIES
         */
        //Validacion
        function validate_mud_properties() {               
                //Save phisical and chemical properties
                var table = $('#propiedades_fluido').find('table');
                var fields = table.find('.data_value');                
                //Valido los datos
                eqty = 0;
                fields.each(function(){
                        var value       = $(this).val();			
                        if(value == null || value == '') {
                                eqty = eqty + 1;
                        }
                });                
		if(eqty > 0){
			setStatusReport('Some fields are empty in mud properties, please verify and try again.', 'error');
                        return false;
		}
                return true;
        }
        
        
        //Registro
        function save_mud_properties() {                                            
                //Save phisical and chemical properties
                var table = $('.mud_properties_data_pcp');
                //Verifico si está guardada
                if(table.hasClass('saved')) {                        
                        setStatusReport('Mud properties saved!', 'valid');
                        return true;
                }
                var hora = [];
                table.find('.data_clock').each(function(){
                        hora.push($(this).val());
                });               
                
                var rows = table.find('tbody tr');                                                
                var data = [];
                
                var report = $("#current_report").val();                
                
                rows.each(function() {
                        row = $(this);
                        $(this).find('.data_value').each(function(j, k) {                          
                                var test = row.attr('data-test');;
                                var program = row.attr('data-program');  
                                var value = $(this).val();                        
                                this_value = {                                                                                                      
                                        'test_id'	: test,
                                        'program_id'    : program,
                                        'hour'          : hora[j],
                                        'value'         : value
                                }
                                data.push(this_value);                        
                        });
                }); 
                
                //Save rehology
                var rehology = $('.mud_properties_data_rehology');
                //Verifico si está guardada
                if(rehology.hasClass('saved')) {                         
                        return true;
                }
                var hora2 = [];
                rehology.find('.data_clock').each(function(){
                        hora2.push($(this).text());
                });               
                
                rows = rehology.find('tbody tr');                                                
                
                rows.each(function() {
                        row = $(this);
                        $(this).find('.data_value').each(function(j, k) {                          
                                var test = row.attr('data-test');;
                                var program = row.attr('data-program');  
                                var value = $(this).val();                        
                                this_value = {                                
                                        'report_id'	: report,                                
                                        'test_id'	: test,
                                        'program_id'    : program,
                                        'hour'          : hora2[j],
                                        'value'         : value
                                }
                                data.push(this_value);                        
                        });
                });
                
                //Save solids math
                var solids = $('.mud_properties_data_solids');
                //Verifico si está guardada
                if(solids.hasClass('saved')) {                         
                        return true;
                }
                var hora3 = [];
                solids.find('.data_clock').each(function(){
                        hora3.push($(this).text());
                });               
                
                rows = solids.find('tbody tr');                                                
                
                rows.each(function() {
                        row = $(this);
                        $(this).find('.data_value').each(function(j, k) {                          
                                var test = row.attr('data-test');;
                                var program = row.attr('data-program');  
                                var value = $(this).val();                        
                                this_value = {                                
                                        'report_id'	: report,                                
                                        'test_id'	: test,
                                        'program_id'    : program,
                                        'hour'          : hora3[j],
                                        'value'         : value
                                }
                                data.push(this_value);                        
                        });
                });
                rs = false;
                $.post('/rest/save_mud_properties',$.toJSON(data),function(r){
                        if(r == true){    
                                rs = true;
                                //Para que no la vuelva a guardar
                                $('#propiedades_fluido').find('table').addClass('saved');                                                                 
                                setStatusReport('Mud properties saved!', 'valid');
                        }
                },'json');
                return rs;
                
        }
        
        /**
         * SOLIDS CONTROL EQUIPMENT
         */        
        //Validacion
        function validate_solids_control() {               
                //Valido shakers
                var table = $('#equipos_solidos').find('table');
                var fields = table.find('.validate_input');                
                //Valido los datos
                eqty = 0;
                fields.each(function(){
                        //Si es visible el elemento se valida
                        if($(this).is(':visible')) {
                                var value       = $(this).val();			
                                if(value == null || value == '') {
                                        eqty = eqty + 1;
                                }
                        }                        
                });                
		if(eqty > 0){
			setStatusReport('Some fields are empty in solids control equipment, please verify and try again.', 'error');
                        return false;
		}
                return true;
        }
        
        
        //Registro
        function save_solids_control() {                                            
                //Save shakers
                var table = $('.input_data_shakers');
                //Verifico si está guardada
                if(!table.hasClass('saved')) {                        
                        //Armo la data
                        var data = [];                
                        table.each(function() {
                                var esta = $(this);
                                var project_sharkers = esta.attr('data-sharker');                        
                                var hour = esta.find('.data_hour').val();
                                this_value = {
                                        project_sharkers_id      : project_sharkers,
                                        operational_hour         : hour,
                                        screens1                 : (esta.find('.screen_1').val()!=undefined) ? esta.find('.screen_1').val() : '',
                                        screens2                 : (esta.find('.screen_2').val()!=undefined) ? esta.find('.screen_2').val() : '',
                                        screens3                 : (esta.find('.screen_3').val()!=undefined) ? esta.find('.screen_3').val() : '',
                                        screens4                 : (esta.find('.screen_4').val()!=undefined) ? esta.find('.screen_4').val() : '',
                                        screens5                 : (esta.find('.screen_5').val()!=undefined) ? esta.find('.screen_5').val() : ''
                                }
                                data.push(this_value);
                        });                               
                        //Save shakers                
                        $.post('/rest/save_solids_control/shakers/',$.toJSON(data),function(r){
                                if(r == true){                                                                    
                                        //Para que no la vuelva a guardar
                                        $('.input_data_shakers').addClass('saved');
                                }
                        },'json');
                }                

                //Save mud cleaner
                var mud_cleaner = $('.input_data_mud_cleaner');
                //Verifico si está guardada
                if(!mud_cleaner.hasClass('saved')) {  
                        //Para que no la vuelva a guardar
                        mud_cleaner.each(function() {
                                $(this).addClass('saved');
                        });
                        //Armo la data del mud cleaner
                        var data2 = [];  
                        var project_mudcleaner = $('#data_mudcleaner').val();                        
                        var hour = mud_cleaner.find('.data_hour').val();                
                        this_value = {
                                project_mudcleaner_id   : project_mudcleaner,
                                desander_flow           : ($('#desander_flow').val()!=undefined) ? $("#desander_flow").val() : '',
                                desander_presure        : ($('#desander_presure').val()!=undefined) ? $("#desander_presure").val() : '',
                                desander_hours          : ($('#desander_hours').val()!=undefined) ? $("#desander_hours").val() : '',
                                destiler_flow           : ($('#destiler_flow').val()!=undefined) ? $("#destiler_flow").val() : '',
                                destiler_presure        : ($('#destiler_presure').val()!=undefined) ? $("#destiler_presure").val() : '',
                                destiler_hours          : ($('#destiler_hours').val()!=undefined) ? $("#destiler_hours").val() : '',
                                screens1                : (mud_cleaner.find('.screen_1').val()!=undefined) ? mud_cleaner.find('.screen_1').val() : '',
                                screens2                : (mud_cleaner.find('.screen_2').val()!=undefined) ? mud_cleaner.find('.screen_2').val() : '',
                                screens3                : (mud_cleaner.find('.screen_3').val()!=undefined) ? mud_cleaner.find('.screen_3').val() : '',
                                screens4                : (mud_cleaner.find('.screen_4').val()!=undefined) ? mud_cleaner.find('.screen_4').val() : '',
                                screens5                : (mud_cleaner.find('.screen_5').val()!=undefined) ? mud_cleaner.find('.screen_5').val() : '',
                                operational_hour        : hour
                        }   
                        data2.push(this_value);
                        //Save shakers                
                        $.post('/rest/save_solids_control/mudcleaner/',$.toJSON(data2),function(r){
                                if(r == true){                                                                    
                                        //Para que no la vuelva a guardar
                                        mud_cleaner.each(function() {
                                                $(this).addClass('saved');
                                        });                                        
                                }
                        },'json');
                }
                
                //Save centrifugues
                var centrifugues = $('.input_data_centrifugues');
                
                //Verifico si está guardada
                if(!centrifugues.hasClass('saved')) {                        
                        //Armo la data
                        var data3 = [];                
                        centrifugues.each(function() {
                                var esta = $(this);
                                //Para que no la vuelva a guardar
                                esta.addClass('saved');
                                var project_centrifugues = esta.attr('data-centrifugues');                                                                                        
                                this_value = {
                                        project_centrifugues_id  : project_centrifugues,
                                        operational_hour         : hour,
                                        speed                    : esta.find('.centrifugues_speed').val(),
                                        overflow                 : esta.find('.centrifugue_overflow').val(),
                                        underflow                : esta.find('.centrifugue_underflow').val(),
                                        feet_rate                : esta.find('.centrifugue_feet_rate').val(),
                                        operational_hours        : esta.find('.operational_hours').val(),
                                        bowl_diam                : (esta.find('.bowl_diam').val()!=undefined) ? esta.find('.bowl_diam').val() : '',
                                        bowl_pulley              : (esta.find('.bowl_pulley').val()!=undefined) ? esta.find('.bowl_pulley').val() : '',
                                        motor_pulley             : (esta.find('.motor_pulley').val()!=undefined) ? esta.find('.motor_pulley').val() : '',
                                        motor                    : (esta.find('.motor').val()!=undefined) ? esta.find('.motor').val() : '',
                                        speed_rpm                : (esta.find('.speed_rpm').val()!=undefined) ? esta.find('.speed_rpm').val() : '',
                                        g_force                  : (esta.find('.g_force').val()!=undefined) ? esta.find('.g_force').val() : '',
                                        type                     : (esta.find('.type').val()!=undefined) ? esta.find('.type').val() : ''
                                }
                                data3.push(this_value);
                        });                               
                        //Save shakers                
                        $.post('/rest/save_solids_control/centrifugues/',$.toJSON(data3),function(r){
                                if(r == true){                                         
                                        //Para que no la vuelva a guardar                                        
                                        centrifugues.addClass('saved');
                                }
                        },'json');
                }   
                
                setStatusReport('Solids controls equipment saved!', 'valid');

                
        }




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
                $('#continue_phase_overlay').show();                
	});
        
        //close the overlay on cancel
	$('#continue_phase_overlay .close_link').click(function(e){
		e.preventDefault();
		$('#continue_phase_overlay').hide();
	});
        
        //submit report 
	$('#continue_phase_overlay #continue_phase_btn').click(function(e){                
		e.preventDefault();                                
                var max_phase = parseInt($('#max_phase').val());                
		$('#continue_phase_overlay').hide();                
		var data = {
			'number'					: $('#current_report').val(),
			'date'						: $('#current_date').html(),
			'project_transactional_id'	: $('#transactional_id').val(),
                        'phase'                     : $('[name="phase"]:checked').val()                                                
		};

                if( parseInt(data.phase) > max_phase) {
                        /*
                         *@TODO 
                         *traducir
                         */
                        alert('Ha excedido el número de fases posibles para este proyecto. \nPor favor continúe con la fase actual.');
                        return false;
                }                
                
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