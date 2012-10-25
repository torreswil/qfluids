<?php $reporte = $this->session->userdata('report'); ?>
<?php $reporte = $this->Api->get_where('reports', array('id'=>$reporte['id'])); ?>
<?php $reporte = isset($reporte[0]) ? $reporte[0] : null; ?>
<!-- FORMULARIO PARA EL TIPO DE REPORTE -->
<div class="overlay_wrapper" id="select_type_report">
	<div class="overlay_dialog_wrapper" style="margin-top:50px">
		<div class="overlay_dialog" style="width:320px;">
                        <h5>Tipo de reporte</h5>

                        <table style="margin-bottom:20px;">					                                       
                                <tr>						
                                        <td><a href="/main/report/<?= $project['id']; ?>/<?= $reporte['id']; ?>/" target="_blank" title="Print and Send Report">Reporte actual</a></td>
                                </tr>
                                <tr>
                                        <td><a href="#" id="report_mud_properties_list" class='close_link'>Reporte de las propiedades del lodo</a></td>
                                </tr>
                        </table>										
                        <a href="#close" class="close_link" style="display:block;float:left;margin-top:10px;">Cancel</a>
                </div>		
	</div>
</div>