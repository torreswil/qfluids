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
                        //Save hole geometry
                        save_hole_geometry();
                        //Save operational info
                        save_operational_info();
                        //Mud properties
                        save_mud_properties();
                        //Solids control equipment
                        save_solids_control(); 
                        //Save personal
                        save_personal();
                        //Save volumenes
                        save_volumenes();
                        //Save comments
                        save_comments();
                        //Correr calculos
                        correr_calculos();
                        setStatusReport('All data saved!', 'valid');
                                                                       
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
         * HOLE GEOMETRY
        */
        function save_hole_geometry() {
                //Armo la data casing
                var data_casing = [];                
                $('tr.casing_tool_row').each(function(j) {                                                                        
                    values = {
                            casing_id       : $(this).find('.pick_casing_id').val(),
                            type            : $(this).find('.pick_casing').val(),                                
                            top             : $(this).find('.top').val(),
                            bottom          : $(this).find('.bottom').val(),
                            capacity        : $(this).find('.volume').val(),
                            length          : $(this).find('.length').val()
                    }
                    data_casing.push(values);
                });
                //Save casing
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_hole_geometry/casing/',
                        data: $.toJSON(data_casing),
                        dataType: 'json',
                        async: false
                });                
                
                //Armo la data hole
                var data_hole = {                        
                        open_hole               : $('#zhole').val(),
                        rice_carbide_test       : $('#zrice').val(),                                
                        cuttings_caving_record  : $('#zcuttings').val(),
                        caliper                 : $('#zcaliper').val(),
                        washout                 : $('#zwashout').val(),
                        average_hole            : $('#openhole').val(),
                        open_hole_length        : $('#longhoyo').val()
                }                
                //Save hole                
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_hole_geometry/hole/',
                        data: data_hole,
                        dataType: 'json',
                        async: false
                });                
                
                //Armo la data drill string
                var data_drill_string = [];                
                $('tr.row_select_drill_string').each(function(j) {                                                                        
                        values = {
                                bha_name                : $(this).find('.select_drill_string').val(),
                                oddeci                  : $(this).find('.odbha').val(),
                                iddeci                  : $(this).find('.idbha').val(),
                                length                  : $(this).find('.longbha').val(),
                                capacity_vol            : $(this).find('.capvbha').val(),
                                displacement_vol        : $(this).find('.dispvbha').val(),
                                capacity_ft             : $(this).find('.capbha').val(),
                                displacement_ft         : $(this).find('.dispbha').val(),
                                pressure                : $(this).find('.powerlossbha').val(),
                                losses                  : $(this).find('.zbinglossbha').val()
                        }
                        data_drill_string.push(values);
                });
                //Save drillstring
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_hole_geometry/drill_string/',
                        data: $.toJSON(data_drill_string),
                        dataType: 'json',
                        async: false
                });
                
                //Armo la data pressure_loss_resume
                var data_pressure_loss = [];                
                $('tr.hpressure_loss_resume').each(function(j) { 
                        hydraulic = $(this).find('[name="hreporttoshow"]');
                        hydraulic_type = (hydraulic.is(":checked")) ? $('[name="hreporttoshow"]:checked').val() : ''; 
                        values = {
                                hydraulic_type  : hydraulic_type,
                                surface         : $(this).find('.hsurface').val(),
                                string          : $(this).find('.hstring').val(),
                                motor           : $(this).find('.hmotor').val(),
                                bit             : $(this).find('.hbit').val(),
                                annular         : $(this).find('.hannular').val(),
                                total           : $(this).find('.htotal').val()
                        }
                        data_pressure_loss.push(values);
                });
                //Save pressure_loss                
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_hole_geometry/pressure/',
                        data: $.toJSON(data_pressure_loss),
                        dataType: 'json',
                        async: false
                }); 
                
                //Armo la data de velocidades
                var data_velocity = {
                        casing1         : $("#zcdpvel").val(),
                        casing2         : $("#zcdpvelcrit").val(),
                        casing3         : $("#zcdpqc").val(),
                        dp1             : $("#zdpohvel").val(),
                        dp2             : $("#zdpohvelcrit").val(),
                        dp3             : $("#zdpohqc").val(),
                        dc11            : $("#zbhavel_1").val(),
                        dc12            : $("#zbhavelcrit_1").val(),
                        dc13            : $("#zbhagc_1").val(),
                        dc21            : $("#zbhavel_2").val(),
                        dc22            : $("#zbhavelcrit_2").val(),
                        dc23            : $("#zbhagc_2").val(),                        
                        bouyancy        : $("#bouyancy").val(),
                        ecd             : $("#ecd").val(),
                        w_out           : $("#zwout").val()
                }
                //Save data velocity
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_hole_geometry/velocity/',
                        data: data_velocity,
                        dataType: 'json',
                        async: false
                });                 
                
                //Armo la data annular section
                var data_annular_section = [];                
                $('#hidraulics_table_content').find('tr').each(function(j) {                                                                        
                        values = {
                                description     : $(this).find('.adescription').val(),
                                id_hole         : $(this).find('.idhole').val(),
                                od              : $(this).find('.odstring').val(),
                                length          : $(this).find('.longanular').val(),
                                capacity        : $(this).find('.capanul').val(),
                                vel_critical    : $(this).find('.zasvel').val(),
                                plp             : $(this).find('.zapowerloss').val(),
                                plb             : $(this).find('.zabinghloss').val(),
                                regime          : $(this).find('.zregime').val()
                        }
                        data_annular_section.push(values);
                });
                //Save annular section
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_hole_geometry/annular/',
                        data: $.toJSON(data_annular_section),
                        dataType: 'json',
                        async: false
                }); 
                
                //Guarda las propiedades del reporte
                var report_hole_geometry = {
                        depth_md: $('#md').val(), 
                        bit_depth: $("#bitdepth").val() ,
                        bha: $("#dsbha").val(),
                        bha_length: $("#totalbha").val(), 
                        hydraulic_type: $('[name="hreporttoshow"]:checked').val()
                }
                //Save report properties
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_report_settings',
                        data: report_hole_geometry,                        
                        async: false
                });                 
                
                setStatusReport('Hole Geometry saved!');
        }
       
       
        /**
         * OPERATIONAL INFO
         */                
        function save_operational_info() {                                            
                
                var bit_data = $('.operational_info_bit_data');                
                //Armo la data de los bit
                var data = [];                                                                        
                this_value = {
                        bit_number              : $('#bit_bitnumber').val(),
                        brocas_modelos_id       : $('#broca_bit_model_id').val(),
                        jets1                   : $('#j_1').val(),
                        jets2                   : $('#j_2').val(),
                        jets3                   : $('#j_3').val(),
                        jets4                   : $('#j_4').val(),
                        jets5                   : $('#j_5').val(),
                        jets6                   : $('#j_6').val(),
                        jets7                   : $('#j_7').val(),
                        jets8                   : $('#j_8').val(),
                        jets9                   : $('#j_9').val(),
                        jets10                  : $('#j_10').val(),
                        jets11                  : $('#j_11').val(),
                        jets12                  : $('#j_12').val(),
                        result_jets            : $('#jets_string').val(),
                        tfa                     : $('#tfa').val(),
                        vel_jets                : $('#veljet').val(),
                        pd1                     : $('#pdbit').val(),
                        pd2                     : $('#bitxcien').val(),
                        hhp                     : $('#hhp').val(),
                        hsi                     : $('#hsi').val()
                }
                data.push(this_value);                                                        
                //Save bit_data
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_operational_info/bit/',
                        data: $.toJSON(data),
                        dataType: 'json',
                        async: false
                });                
                
                //Armo la data de las bombas
                var data_pump = [];                                                                        
                pump_1 = {
                        bombas_id               : $('#pump_1_maker_id').val(),
                        efficiency              : $('#eff_1').val(),
                        spm                     : $('#spm_1').val(),                        
                        gal                     : $('#galstk_1').val(),
                        gpm                     : $('#qgal_1').val()
                }
                data_pump.push(pump_1);   
                pump_2 = {
                        bombas_id               : $('#pump_2_maker_id').val(),
                        efficiency              : $('#eff_2').val(),
                        spm                     : $('#spm_2').val(),                        
                        gal                     : $('#galstk_2').val(),
                        gpm                     : $('#qgal_2').val()
                }
                data_pump.push(pump_2);
                pump_3 = {
                        bombas_id               : $('#pump_3_maker_id').val(),
                        efficiency              : $('#eff_3').val(),
                        spm                     : $('#spm_3').val(),                        
                        gal                     : $('#galstk_3').val(),
                        gpm                     : $('#qgal_3').val()
                }
                data_pump.push(pump_3);                
                //Save pump_data
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_operational_info/pump/',
                        data: $.toJSON(data_pump),
                        dataType: 'json',
                        async: false
                });
                
                //Armo la data del drilling time
                var data_drilling_time = [];
                
                drilling_time = $('.operational_info_drilling_time');
                
                drilling_time.find('tr').each(function(j) {
                        drilling = $(this).find('.drilling_time_select').val();
                        time = $(this).find('.drillingt').val();
                        if(drilling!=undefined) {
                                values = {
                                        drilling        : drilling,
                                        time            : time
                                }
                                data_drilling_time.push(values);
                        }                        
                });
                //Save drilling time
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_operational_info/drillingtime/',
                        data: $.toJSON(data_drilling_time),
                        dataType: 'json',
                        async: false
                });                
                
                //Armo la data del drilling parameters
                var data_drilling_parameters = [];
                
                drilling_parameters = $('.operational_info_drilling_parameters');
                
                drilling_parameters.find('tr').each(function(j) {                        
                        values = {
                                parameter       : $(this).find('.drillingp_name').val(),
                                unit            : $(this).find('.drillingp_unit').val(),
                                value           : $(this).find('.drillingp_value').val()
                        }
                        data_drilling_parameters.push(values);                                                
                });
                //Save drilling parameters
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_operational_info/drillingparameters/',
                        data: $.toJSON(data_drilling_parameters),
                        dataType: 'json',
                        async: false
                });                 
                
                //Armo la data del drilling parameters
                var data_survey = [];
                
                survey = $('.operational_info_survey');
                
                survey.find('tr').each(function(j) {                        
                        values = {
                                parameter       : $(this).find('.survey_name').val(),
                                unit            : $(this).find('.survey_unit').val(),
                                value           : $(this).find('.survey_value').val()
                        }
                        data_survey.push(values);                                                
                });
                //Save survey
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_operational_info/survey/',
                        data: $.toJSON(data_survey),
                        dataType: 'json',
                        async: false
                });                 
                
                var report_pump = {
                        activity: $('#operational_info_activity').val(), 
                        formation: $("#operational_info_formation").val(),
                        bottoms_up: $('#bottomsup').val(),
                        bottoms_up_stk: $('#spmbottoms').val(),
                        lag_down: $('#lapdown').val(),
                        lag_down_stk: $('#spmdown').val(),
                        total_lag: $('#totallap').val(),
                        total_lag_stk: $('#spmtotallap').val(),
                        feet_drilling: $('.feet_drilling').val(),                        
                        daily_rop: $('.daily_rop').val(),
                        daily_avge_temp: $('.daily_avge_temp').val()
                        
                }
                
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_report_settings',
                        data: report_pump,
                        dataType: 'json',
                        async: false
                });                                 
                
                setStatusReport('Operational info saved!');
                
        }
        
        
        /**
         * MUD PROPERTIES
         */                        
        function save_mud_properties() {                                            
                //Save phisical and chemical properties
                var table = $('.mud_properties_data_pcp');
                
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
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_mud_properties',
                        data: $.toJSON(data),
                        dataType: 'json',
                        async: false
                });
                
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_report_settings',
                        data: { mud_type: $('.pick_mud').val() },
                        dataType: 'json',
                        async: false
                });
               
                setStatusReport('Mud properties saved!');               
                                
        }
        
        /**
         * SOLIDS CONTROL EQUIPMENT
         */                
        function save_solids_control() {                                            
                //Save shakers
                var table = $('.input_data_shakers');                
                //Armo la data de shakers
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

                //Save mud cleaner
                var mud_cleaner = $('.input_data_mud_cleaner');                
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
                
                
                //Save centrifugues
                var centrifugues = $('.input_data_centrifugues');                                
                //Armo la data
                var data3 = [];                
                centrifugues.each(function() {
                        var esta = $(this);                        
                        var project_centrifugues = esta.attr('data-centrifugues');                                                                                        
                        this_value = {
                                project_centrifugues_id  : project_centrifugues,
                                operational_hour         : hour,
                                speed                    : esta.find('.centrifugue_speed').val(),
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
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_solids_control/shakers/',
                        data: $.toJSON(data),
                        dataType: 'json',
                        async: false
                });                
                //Save mudcleaner         
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_solids_control/mudcleaner/',
                        data: $.toJSON(data2),
                        dataType: 'json',
                        async: false
                });                                
                //Save centrifugues                
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_solids_control/centrifugues/',
                        data: $.toJSON(data3),
                        dataType: 'json',
                        async: false
                }); 
                setStatusReport('Solids controls equipment saved!');
                
        }
        
        function save_personal() {
                var data = [];
                var engineers = $('.personal_engineers_data');
                engineers.each(function(j) {                        
                        this_data = {
                                personal_id             : $(this).find('.this_enginer').val(),                                 
                                turn                    : '',
                                cost                    : $(this).find('.this_enginer_cost').val()
                        }
                        data.push(this_data);
                       
                });
                var operators = $('.personal_operators_data');
                operators.each(function(j){
                        operator = $(this).find('.operator_checkbox');
                        if(operator.is(':checked')) {
                                id = operator.attr('id').split('operator_checkbox_')[1];                                
                                this_data = {
                                        personal_id     : id,
                                        turn            : '',
                                        cost            : $(this).find('.this_operator_cost').val()
                                }
                                data.push(this_data);
                        }
                });
                var yardworker = $('.personal_yardworkers_data');
                yardworker.each(function(j){
                        worker = $(this).find('.worker_checkbox');
                        if(worker.is(':checked')) {
                                id = worker.attr('id').split('worker_checkbox_')[1];                                
                                this_data = {
                                        personal_id     : id,
                                        turn            : $(this).find('.this_worker_turn').val(),
                                        cost            : $(this).find('.this_worker_cost').val()
                                }
                                data.push(this_data);
                        }
                });
                //Save personal
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_personal/',
                        data: $.toJSON(data),
                        dataType: 'json',
                        async: false
                });    
                setStatusReport('Perasonal saved!');                
        }
        
        /**
        * VOLUMENES
        */
        function save_volumenes() {
                //Armo la del resumen
                var resumen = {
                        total_act_circulate     : $('#totalcirculate').val(),
                        casing                  : $('#volcsgt').val(),
                        open_hole               : $('#volhole').val(),
                        total_empty_hole        : $('#volholeempty').val(),
                        string_displacement     : $('#zdisptotal').val(),
                        hole_w_string           : $('#volwstring').val(),
                        trip_tank               : $('#triptank').val(),
                        active_pits             : $('#activepits').val(),                        
                        pill                    : $('#pill').val(),
                        total_reserve           : $('#totalreserve').val(),
                        total_mud               : $('#totalmud').val()
                };                
                
                //Save resumen
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_volumen/resumen/',
                        data: resumen,
                        dataType: 'json',
                        async: false
                });                
                
                //Armo la data de losses
                var data_losses = {                        
                        sub_surface                     : $('#subsurf').val(),
                        surface                         : $('#surf').val(),
                        cavings                         : $('#caving').val(),                                
                        shakers                         : $('#shakes').val(),
                        mud_cleaner                     : $('#cleaner').val(),
                        centrifugues                    : $('#centri').val(),
                        dewatering                      : $('#dew').val(),
                        behind_casing                   : $('#becsg').val(),
                        others                          : $('#other').val(),
                        daily_surface_losses            : $('#dailysurface').val(),
                        cumulative_surface_losses       : $('#c_dailysurface').val(),
                        daily_sub_surface_losses        : $('#dailysubsurface').val(),
                        cumulative_sub_surface_losses   : $('#c_dailysubsurface').val(),
                        total_losses                    : $('#ztotallosses').val()
                }                
                //Save losses             
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_volumen/losses/',
                        data: data_losses,
                        dataType: 'json',
                        async: false
                }); 
                
                //Save report properties
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_report_settings',
                        data: { balance_fluido: $('#balancefluido').val() },
                        dataType: 'json',
                        async: false
                });
                
                setStatusReport('Volumenes saved!');
        }
        
        /**
         * COMMENTS
         */ 
        function save_comments() {
                var data = {
                        rig_activity            : $("#report_rig_activity").val(),
                        mud_activity            : $("#report_mud_activity").val(),
                        comments                : $("#report_comments").val(),
                        charla_hse              : $("#report_charla_hse").val(),
                        pusher                  : $("#report_pusher").val(),
                        company_man_1           : $("#report_company_man_1").val(),
                        company_man_2           : $("#report_company_man_2").val(),
                        mud_enginers_1          : $("#report_mud_enginers_1").val(),
                        mud_enginers_2          : $("#report_mud_enginers_2").val()
                }                
                //Save comments
                $.ajax({
                        type: 'POST',
                        url: '/rest/save_comments/',
                        data: data,
                        dataType: 'json',
                        async: false
                });    
                setStatusReport('Comments saved!');                
        }




	/*==========================================================================================================*/
	// PRINT AND SEND
	/*==========================================================================================================*/
        $('#btn_print_report').click(function(e){
		e.preventDefault();                
                $("#select_type_report").show();
		
	});
        
        $('#report_mud_properties_list').click(function(e){
		e.preventDefault();                
                $("#report_mud_properties_overlay").show();
		
	});
        
        //close the overlay on cancel
	$('#select_type_report .close_link').click(function(e){
		e.preventDefault();
		$("#select_type_report").hide();
	});
        
        $('#report_mud_properties_overlay .close_link').click(function(e){
		e.preventDefault();                
                $("#report_mud_properties_overlay").hide();
		
	});
        $("#btn_select_mud_properties_list").click(function(e){
                e.preventDefault();
                var contenedor = $("#report_mud_properties_overlay");
                var items = [];
                contenedor.find('input').each(function(j){
                        if($(this).is(':checked')) {
                                items.push($(this).val());
                        }
                });
                var url = '/reports/mud_properties/project/'+contenedor.attr('data-project')+'/';
                if(items.length>0) {
                        url = url+'?items='+items.join(',');
                }
                var reporte_xls = "height=200,width=200,scrollTo,resizable=1,scrollbars=1,location=0";
                popup = window.open(url, 'Popup', reporte_xls);
                return false;
        });        


	/*==========================================================================================================*/
	// REPORT ARCHIVE
	/*==========================================================================================================*/

	$('#btn_search_report').click(function(e){
		e.preventDefault();
                $.get('/rest/load_report/', function(data) {
                        $('#report_history_overlay tbody').html(data);                
                });
                $("#report_history_overlay").show();
		
	});
        //close the overlay on cancel
	$('#report_history_overlay .close_link').click(function(e){
		e.preventDefault();
		$("#report_history_overlay").hide();
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
                                inputs = $('body').find('.data-reset');
                                inputs.each(function(j){
                                        if($(this).is(":checked"))  { //Para los checbox
                                                $(this).attr("checked", false);
                                        } else if($(this).attr('data-reset')!=undefined) { //Si tiene algún reset por defecto
                                                $(this).val($(this).attr('data-reset'));
                                        } else { //Borro el resto
                                                $(this).val('');
                                        }
                                });
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
	$('#settings_btn').click(function(e){
		e.preventDefault();
		$('#project_settings').fadeIn('fast');
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