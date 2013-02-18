
<?php 
    $this->load->view('header');  
	$today = getdate();
	$usr_id = $this->uri->segment(3);
	#@TODO definir nível de acesso
	$usr = new Usuario();
	$usr->where('id',$usr_id)->get();

	$tomorrow = date('Y-m-d', strtotime('tomorrow noon'));
	
?>
<style type="text/css">
.title {
	font-weight:bold;
	color:#555;
}
.left {
	text-align:left;
	padding-left:5px;
	padding-right:15px;
}
.right {
	text-align:right;
	padding-right:5px;
}
.center {
	text-align:center;
}


table td {
	padding-top:15px;
	padding-left:15px;
}
.tablepad {
	margin-top:30px;
	margin-left:87px;
	margin-bottom:30px;
}


.section {
	font-size:16px;
	text-transform:uppercase;
	font-weight:bold;
	text-align:center;
	width:100%;
	color:#333;
	padding-top:10px;
}

.section-pad {
	padding-top:50px;
}

.section hr { 
	background-color:#999;
	height: 2px;
}

.top-align {
	vertical-align:top;
	padding-top:15px;
}

#calendar {
		width: 900px;
		margin: 0 auto;
		}
.submit {
	text-align:right;
	margin-top:30px;
	margin-right:15px;
}


	
	
/*css seleção de quantidade de registros por página*/
 .select p {text-align: center; background-color: #FFFFFF; border: 0px #FFFFFF}
   .qntd_usuario_listar {float: right; margin-top:-32px;}
   #selectQntd {margin-top: 2px; margin-left:25%}
   .img-order{background-image: url(images/asc.png);}
   /*css modal*/
   #myModal {height:200px; width: 400px; margin-left: 0px; margin-top:40px;}
   .modal.fade.in {top:27%; bottom: 10%;}
   .modal-body {max-height:588px;}
   .modal {left: 41%;}
   .btn-right {margin-left: 550px;}
   .btn-right-creditos {margin-left: 257px; margin-top: -20px;}
   .modal th {background-color: #ccc}
   #btn-right-listar{float:right; margin-right: 20px;}}


  
</style>

<script type="text/javascript" src="<?php echo base_url('js/tiny_mce/tiny_mce.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/date.format.js'); ?>"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
<link rel='stylesheet' type='text/css' href='<?php echo base_url('js/fullcalendar-1.5.4'); ?>/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url('js/fullcalendar-1.5.4'); ?>/fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='<?php echo base_url('js/fullcalendar-1.5.4'); ?>/jquery/jquery-1.8.1.min.js'></script>
<script type='text/javascript' src='<?php echo base_url('js/fullcalendar-1.5.4'); ?>/jquery/jquery-ui-1.8.23.custom.min.js'></script>
<script type='text/javascript' src='<?php echo base_url('js/fullcalendar-1.5.4'); ?>/fullcalendar/fullcalendar.min.js'></script>
<script type='text/javascript'>

	$(document).ready(function() {
	
		$('#how2').click(function(){
			if($(this).attr('checked') == 'checked') $('#seletor-data').show();
		});
		
		$('#how1').click(function(){
			if($(this).attr('checked') == 'checked') $('#seletor-data').hide();
		});
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		
		var calendar = $('#calendar').fullCalendar({
			allDayDefault: false,
			defaultView: 'month',
			header: {
				left: 'prev,next today',
				center: 'title',
				//right: 'month,agendaWeek,agendaDay'
				right: 'month,agendaWeek,agendaDay'
			},
			selectable: true,
			disableDragging: true,
			selectHelper: true,
			dayClick: function(date, allDay, jsEvent, view) {
				if (allDay) {
					$("#dateField").val(date.format("yyyy-mm-dd"));
				}else{
					$("#hinicio").val(date.format("HH"));
					$("#minicio").val(date.format("MM"));
				}
			},
			select: function( startDate, endDate, allDay, jsEvent, view ) {
				if (!allDay) {
					$("#dateField").val(startDate.format("yyyy-mm-dd"));
					$("#hinicio").val(startDate.format("HH"));
					$("#minicio").val(startDate.format("MM"));
					$("#hfim").val(endDate.format("HH"));
					$("#mfim").val(endDate.format("MM"));
				}
			},
			editable: false,
			events: [
			<?php 
			date_default_timezone_set("UTC");
			foreach ($agn as $ag): 
				if ($ag->periodo_inicial_marcado == '0000-00-00 00:00:00'):
					$start = date("Y-m-d", strtotime($ag->periodo_inicial)) . 'T' . date("H:i:s",strtotime($ag->periodo_inicial)).'Z';
				else:
					$start = date("Y-m-d", strtotime($ag->periodo_inicial_marcado)) . 'T' . date("H:i:s",strtotime($ag->periodo_inicial_marcado)).'Z';
				endif;
				
				if ($ag->periodo_final_marcado == '0000-00-00 00:00:00'):
					$end = date("Y-m-d", strtotime($ag->periodo_final)) . 'T' . date("H:i:s",strtotime($ag->periodo_final)).'Z';
				else:
					$end = date("Y-m-d", strtotime($ag->periodo_final_marcado)) . 'T' . date("H:i:s",strtotime($ag->periodo_final_marcado)).'Z';
				endif;
				if ($ag->status == AGENDAMENTO_STATUS_SOLICITADO) $color = '#0000ff';
				if ($ag->status == AGENDAMENTO_STATUS_APROVADO or $ag->status == AGENDAMENTO_STATUS_COMPARECEU) $color = '#00ff00';
				if (!($ag->status == AGENDAMENTO_STATUS_SOLICITADO or $ag->status == AGENDAMENTO_STATUS_APROVADO or $ag->status == AGENDAMENTO_STATUS_COMPARECEU)) $color = '#ff0000';
			?>
				{
					title: '<?php echo $ag->usuario_nome . ' | ' . $ag->facility_nome . ' | ' . $ag->projeto_titulo; ?>',
					start: '<?php echo $start;  ?>',
					end: '<?php echo $end;  ?>'
					
					
				},
			<?php endforeach; ?>
				
			]
		});
			
		$('#seletor-data').hide();
			
	});


</script>



<div id="main_content">	
<?php 
	if ($msg != ''): ?>
    
    <div class="<?php echo $alert_class; ?>">
		<?php echo $msg; ?>
	</div>	
<?php	endif; ?>

<?php if (!$adminRights):?>
	<div class="alert alert-error">
  		<strong>Edi&ccedil;&atilde;o Desabilitada!</strong> Voc&ecirc; n&atilde;o &eacute; um administrador v&aacute;lido para esta facility!
	</div>
<?php endif; ?>

 <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
    <h2>Editar Agendamento</h2>
    
  
     <?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'projetos_inserir', 'name' => 'frmusuarios')
    );

        echo form_open_multipart('agendamentos/salvar/'.$this->uri->segment(3),$attributes['form']);
    ?>
    	<table>
            <tr>
            	<td class="right title">Projeto de Pesquisa</td>
                <td class="left" colspan="6"> 
                	<select style="width:500px;" name="projeto">
	                    	<?php foreach ($proj_all as $ur_1): ?>
	                			<option <?php if ($ag->projeto_id == $ur_1->id): echo 'selected="selected"'; endif;?> value="<?php echo $ur_1->id; ?>"><?php echo $ur_1->titulo . ' ' . $ur_1->sobrenome; ?></option>
	                        <?php endforeach; ?>
                    	</select>
                </td>
            </tr>		
        	<tr>
            	<td class="right title">Usuário</td>
                <td class="left" colspan="6">
                <?php if ($uRole == CREDENCIAL_USUARIO_SUPERADMIN):?>
                	<select style="width:500px;" name="usuario">
	                    	<?php foreach ($ur_all as $ur_1): ?>
	                			<option <?php if ($ag->usuario_id == $ur_1->id): echo 'selected="selected"'; endif;?> value="<?php echo $ur_1->id; ?>"><?php echo $ur_1->nome . ' ' . $ur_1->sobrenome; ?></option>
	                        <?php endforeach; ?>
                    	</select>
                <?php else: ?>
                	<?php echo $ur->nome . ' ' . $ur->sobrenome; ?> 
                <?php endif;?>
                </td>
            </tr>
        	<tr>
            	<td class="right title">Facility</td>
                <td class="left" colspan="6"> 
                	<select style="width:500px;" name="facility">
	                    	<?php foreach ($fcl_all as $ur_1): ?>
	                			<option <?php if ($ag->facility_id == $ur_1->id): echo 'selected="selected"'; endif;?> value="<?php echo $ur_1->id; ?>"><?php echo $ur_1->nome . ' ' . $ur_1->sobrenome; ?></option>
	                        <?php endforeach; ?>
                    	</select>
                </td>
            </tr>

            <tr>
            	<td class="right title">Data Requisitada</td>
                <td class="left" colspan="6"> <?php echo date('d/m/Y H:i',strtotime($ag->periodo_inicial)).' a '.date('H:i',strtotime($ag->periodo_final)); ?> </td>
            </tr>
            <?php if ($canApprove):?>
            <tr>
            	<td class="right title">Valor do Agendamento</td>
                <td class="left" colspan="6"><?php echo SIMBOLO_MOEDA_DEFAULT; ?> <input type="text" style="width:120px;" name="valor" value="<?php echo number_format($ag->valor_total,2,TS,DS); ?>" /> </td>
            </tr>
             <tr>
            	<td class="right title">Status do Pagamento</td>
                <td class="left"><input type="radio" name="pagto" <?php if ($ag->status_pagto == STATUS_PAGTO_NAO_PAGO) echo 'checked="checked"'; ?> value="<?php echo STATUS_PAGTO_PAGO; ?>" />Pendente</td>
                <td class="left" colspan="2"><input type="radio" <?php if ($ag->status_pagto == STATUS_PAGTO_PAGO) echo 'checked="checked"'; ?> name="pagto" value="<?php echo STATUS_PAGTO_PAGO; ?>" />Pago</td>
            </tr>
            <tr>
            	<td class="right title">Definir Status</td>
                <td class="left">
                   <input type="radio" name="status" <?php if ($ag->status == AGENDAMENTO_STATUS_SOLICITADO) echo 'checked="checked"'; ?> value="<?php echo AGENDAMENTO_STATUS_SOLICITADO; ?>" />Solicitado 
                   
                     
                </td>
                <td class="left">
                   
                    <input type="radio" name="status" <?php if ($ag->status == AGENDAMENTO_STATUS_APROVADO) echo 'checked="checked"'; ?> value="<?php echo AGENDAMENTO_STATUS_APROVADO; ?>" />Aprovado 
                     
                </td>
                <td class="left">
                	<input type="radio" name="status" <?php if ($ag->status == AGENDAMENTO_STATUS_NEGADO) echo 'checked="checked"'; ?> value="<?php echo AGENDAMENTO_STATUS_NEGADO; ?>" />Negado 
                       
                </td>
                <td class="left">
                	
                      <input type="radio" name="status" <?php if ($ag->status == AGENDAMENTO_STATUS_FALTOU) echo 'checked="checked"'; ?> value="<?php echo AGENDAMENTO_STATUS_FALTOU; ?>" />Faltou
                       
                </td>
                <td class="left">
                      
                       <input type="radio" name="status" <?php if ($ag->status == AGENDAMENTO_STATUS_COMPARECEU) echo 'checked="checked"'; ?> value="<?php echo AGENDAMENTO_STATUS_COMPARECEU; ?>" />Compareceu
                </td>
                <td class="left">
                    
                        <input type="radio" name="status" <?php if ($ag->status == AGENDAMENTO_STATUS_CANCELADO) echo 'checked="checked"'; ?> value="<?php echo AGENDAMENTO_STATUS_CANCELADO; ?>" />Cancelado
                </td>

            </tr>
            <tr>
            	<td class="right title">Agendamento</td>
                <td class="left" colspan="2"><input type="radio" name="how" id="how1" checked="checked" value="keep" />Manter data requisitada</td>
                <td class="left" colspan="2"><input type="radio" name="how" id="how2" value="change" />Usar data selecionada</td>
            </tr>
            <?php endif;?>
        </table>
		<div id="seletor-data">
			<table class="tablepad">
				<tr>
					<td class="title right">Data</td>
					<td class="left"><input type="date" name="dateField" id="dateField" style="width:130px;" value="<?php echo $tomorrow; ?>"></td>
					<td class="title right">Início</td>
					<td class="left"><input class="right" type="number" name="hinicio" id="hinicio" style="width:49px;" min="0" max="23" value="09">:<input class="left" type="number" name="minicio" id="minicio" style="width:49px;" min="0" max="59" value="00"></td>
					<td class="title right">Fim</td>
					<td class="left"><input class="right" type="number" name="hfim" id="hfim" style="width:49px;" min="0" max="23" value="17">:<input class="left" type="number" name="mfim" id="mfim" style="width:49px;" min="0" max="59" value="00"></td>
				</tr>
			</table>
			
			<br />
			<div id='calendar'></div>

        </div>
			<?php if ($adminRights):?>
				<div class="form-actions">
                    <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" />
                    
					<?php if ($uRole == CREDENCIAL_USUARIO_SUPERADMIN):?><input type="button" class="btn btn-danger" name="excluir" value="Excluir" onclick="confirmExclusion()"/><?php endif; ?>
					
					<input type="button" class="btn btn-link" name="cancelar" value="Cancelar" onclick="window.location.href='<?php echo base_url('agendamentos/listar'); ?>'"/>
                </div>
				
			<?php endif;?>
      </form>

<script>
	function confirmExclusion(){
		var r = confirm("Deseja realmente excluir este agendamento?");
		if (r)
		{
			document.location='<?php echo base_url('agendamentos/excluir/'.$ag->id);?>';
		}
	}

</script>
<?php
    $this->load->view('footer'); 
?>
