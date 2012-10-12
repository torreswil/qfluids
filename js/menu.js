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
                                        'report_id'	: report,                                
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
                                setStatusReport('Mud properties');
                        }
                },'json');
                return rs;
                
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