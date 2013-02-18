
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
.huge {
	font-size:30px;
	margin-top:20px;
	margin-bottom:20px;
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
			
	});


</script>



<div id="main_content">	
<?php 
	if ($msg != ''): ?>
    
    <div class="<?php echo $alert_class; ?>">
		<?php echo $msg; ?>
	</div>	
<?php	endif; ?>
<div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
		<h2>Calendário de Agendamentos Futuros</h2>
		<div id='calendar'></div>

</div>
<?php
    $this->load->view('footer'); 
?>
