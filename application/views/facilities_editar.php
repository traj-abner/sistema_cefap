<?php
    $this->load->view('header');
	$tomorrow = date('Y-m-d', strtotime('tomorrow noon'));
?>
<style>
  .control-group {margin: 0 auto;}  
  .informacao p {font-size: 16px; text-align: center; margin: 30px 0 30px 0;}
  #text_long {width: 350px;}
  #textarea_long {width: 350px; height: 120px;}
  .selecionador_primeiro {display: block; padding: 0 5px 30px 120px;}
  .selecionador_segundo {display: block; float: right; margin: -215px 120px 0 0;}
  .selecionador_botoes{display: block;  margin: -150px 5px 80px 415px; width: 100px;}
</style>

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
    <div id="breadcrumbs"><?php echo set_breadcrumb(); ?> </div> 
    <?php
    if(isset($msg) && isset($msg_type)){ ?>
       <div class="alert <?php echo $msg_type?>" id="alert-success">
           <button type="button" class="close" data-dismiss="alert">×</button>
           <?php echo $msg; ?> 
       </div> 
    <?php 

    }else{
        echo ('');

    }

     ?>
    <div class="informacao">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum, risus a suscipit ultrices, velit velit blandit neque, non egestas elit urna at est. Pellentesque tincidunt orci erat, in blandit mauris. 
            Aliquam tellus lacus, iaculis ut vestibulum a, blandit tincidunt justo. Aliquam facilisis ante imperdiet massa feugiat ac gravida ipsum elementum. </p>
        <p id='size-medium'><strong>*Todos os campos são de preenchimento obrigatório</strong></p>
    </div>
    
    
    <div class="well">
        <h2>Informações Gerais</h2>
    </div>
    
    <?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'form_adicionar', 'name' => 'frmfacilities','onSubmit' => 'BeforeSubmit()')
    );

        echo form_open('facilities/editar/'.$fclt->id,$attributes['form']);
    ?>
            <div class="control-group">
                <label for="nomeabrev" class="control-label">Nome Abreviado</label>
                <div class="controls">
                    <input type="text" name="nomeabrev" id="nomeabrev" value="<?php echo $fclt->nome_abreviado; ?>">
                </div>
            </div>     
            <div class="control-group">
                <label for="nome_completo" class="control-label">Nome Completo</label>
                <div class="controls">
                    <input type="text" name="nome_completo" id="text_long" value="<?php echo $fclt->nome; ?>">
                </div>
            </div>
            <div class="control-group">
                <label for="desc" class="control-label">Descrição</label>
                <div class="controls">
                    <textarea id="textarea_long" name="descricao"><?php echo $fclt->descricao; ?></textarea>
                </div>    
            </div>
            <div class="control-group">
                <label for="status" class="control-label">Status</label>
                <div class="controls">
                    <input type="radio" value="<?php echo STATUS_FACILITIES_ATIVO; ?>" <?php if($fclt->status == STATUS_FACILITIES_ATIVO): ?> checked="checked" <?php endif; ?> name="status">Ativo
                    <input type="radio" value="<?php echo STATUS_FACILITIES_INATIVO; ?>" <?php if($fclt->status == STATUS_FACILITIES_INATIVO): ?> checked="checked" <?php endif; ?> name="status">Inativo
                    <?php if ($uRole == CREDENCIAL_USUARIO_SUPERADMIN):?>
                    	<input type="radio" value="<?php echo STATUS_FACILITIES_EXCLUIDO; ?>" <?php if($fclt->status == STATUS_FACILITIES_EXCLUIDO): ?> checked="checked" <?php endif; ?> name="status">Excluido
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group">
                <label for="tipoagendamento" class="control-label">Tipo de Agendamento</label>
                <div class="controls">
                    <input type="radio" value="<?php echo TIPO_AGENDAMENTO_AGENDA; ?>" <?php if($fclt->tipo_agendamento == TIPO_AGENDAMENTO_AGENDA): ?> checked="checked" <?php endif; ?> name="tipo_agendamento">Calendario
                    <input type="radio" value="<?php echo TIPO_AGENDAMENTO_INDIVIDUALIZADA; ?>" <?php if($fclt->tipo_agendamento == TIPO_AGENDAMENTO_INDIVIDUALIZADA): ?> checked="checked" <?php endif; ?> name="tipo_agendamento">Individualizado
                </div>
               <br />
        
                <div id='calendar'>
                
                </div>
            </div>
            

            <div class="well"><h2>Administradores</h2></div>
            <!-- 
                Jquery para text-area:
            -->
            
            <div class="selecionador" id="selecionador_administradores">
                
                <input type="hidden" name="hidden_selecionador_administradores" id="hidden_selecionador_administradores" value="">
                <input type="hidden" name="hidden_facility_id" id="hidden_facility_id" value="<?php echo $this->uri->segment(3); ?>">
                
                <div class="selecionador_primeiro">
                        <p>Administradores não selecionados</p>

                        <select name="administradores_1" id="administradores_1" multiple="" size="10">
                            <?php 
								$cd = new Usuario();
								$ft = new Facility();
								$cd->where('credencial',CREDENCIAL_USUARIO_ADMIN)->get();
								
								$i=0;
								foreach($cd as $ncd)
								{
									$ft->include_related('usuarios','*')->where('id',$fclt->id)->get();
									$j = false;
									foreach($ft as $fct)
									{
										if ($fct->usuario_nome == $ncd->nome) $j = true;
									}
									if (!$j) echo "<option value='" . $ncd->id . "'>" . $ncd->nome . "</option>";
									$i++;
								}
							?>
                        </select>
                </div>
                <div class="selecionador_botoes">
                        <input type="button" name="administradores_add" id="administradores_add" value="Adicionar »" onclick="AddItem_administradores()"><br><br>
                        <input type="button" name="administradores_del" id="administradores_del" value="« Remover" onclick="RemoveItem_administradores()">
                </div>

                <div class="selecionador_segundo">
                        <p>Administradores selecionados</p>
                        <select name="administradores_2" id="administradores_2" multiple="" size="10">
                        <?php 
								$cd = new Usuario();
								$ft = new Facility();
								$ft->include_related('usuarios','*')->where('id',$fclt->id)->get();
								$i=0;
								foreach($ft as $fct)
								{
									if ($fct->usuario_credencial == CREDENCIAL_USUARIO_ADMIN)
										echo "<option value='" . $fct->usuario_id . "'>" . $fct->usuario_nome . "</option>";
									$i++;
								}
							?>
                        </select>
                </div>
                <script type="text/javascript"><!--
                function AddItem_administradores(){
                var box1 = document.frmfacilities.administradores_1;
                if(box1.selectedIndex == -1) return
                var selection = box1.options[box1.selectedIndex].value;
                var box2 = document.frmfacilities.administradores_2;
                for(i=0;i<box1.length;i++){
                if(box1.options[i].selected){
                box2.options[box2.length] = new Option(box1.options[i].text, box1.options[i].value);
                box1.options[i] = null;
                i=-1;}
                }}
                function RemoveItem_administradores(){
                var box1 = document.frmfacilities.administradores_2;
                if(box1.selectedIndex == -1) return
                var selection = box1.options[box1.selectedIndex].value;
                var box2 = document.frmfacilities.administradores_1;
                for(i=0;i<box1.length;i++){
                if(box1.options[i].selected){
                box2.options[box2.length] = new Option(box1.options[i].text, box1.options[i].value);
                box1.options[i] = null;
                i=-1;}
                }}
                -->
                </script>
        </div>
            
            <!-- 
                END - Jquery para text-area:
            -->
            

        <div class="well"><h2>Arquivos</h2></div>
        <div>
            <p>Selecione os arquivos que deseja disponibilizar para download aos usuários que solicitarem o agendamente desta</p>

            <table id="dataTable" width="350px" border="1">
                <tr>
                    <td><INPUT type="checkbox" name="chk"/></td>
                    <td> <INPUT type="file" /> </td>
                    <td><INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" /></td>
                </tr>
            </table>
            
            <input type="button" value="Novo arquivo..." onclick="addRow('dataTable')" />
    
    
        </div>
        <div class="well"><h2>Formulários de requisição de agendamento</h2></div>
        
        <!-- BTN para envio do formulário -->
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" />
            <input type="button" class="btn" name="cancelar" value="Cancelar" onclick="window.location.href='../usuarios/listar'"/>
        </div>
    </form>
</div>
<?php
    $this->load->view('footer');
?>

<script type="text/javascript">
<!--
function BeforeSubmit()
{
var temp_administradores = "";
var box_administradores = document.frmfacilities.administradores_2;
for(i=0;i<box_administradores.length;i++)
{
temp_administradores += box_administradores.options[i].value + ",";
}
document.frmfacilities.hidden_selecionador_administradores.value = temp_administradores;

var temp_alunos = "";
var box_alunos = document.frmfacilities.alunos_2;
for(i=0;i<box_alunos.length;i++)
{
temp_alunos += box_alunos.options[i].value + ",";
}
document.frmfacilities.hidden_selecionador_alunos.value = temp_alunos;

var temp_pesquisas = "";
var box_pesquisas = document.frmfacilities.pesquisas_2;
for(i=0;i<box_pesquisas.length;i++)
{
temp_pesquisas += box_pesquisas.options[i].value + ",";
}
document.frmfacilities.hidden_selecionador_pesquisas.value = temp_pesquisas;

}

-->
</script>

<script language="javascript">
        function addRow(tableID) {
 
            var row = '<tr><td><input type="checkbox" name="chk"/></td><td><input type="file" /></td><td><input type="button" value="Delete Row" onclick="' + "deleteRow('dataTable')" + '" /></td></tr>', 
        
            $row = $(row), 
            // resort table using the current sort; set to false to prevent resort, otherwise  
            // any other value in resort will automatically trigger the table resort.  
            resort = true; 
          $('table') 
            .find('tbody').append($row) 
            .trigger('addRows', [$row, resort]);
 
 
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
</script>
