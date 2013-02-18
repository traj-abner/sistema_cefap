<style type="text/css">
.form-actions { margin-left:30px; }

table {
	width:100%;
}

.resumo {
	width:94%;
	margin-left:3%;
	height:400px;
	border:1px solid;
	padding: 3px 3px 3px 3px;
	border-color:#CCC;
	border-radius:5px;
	-moz-border-radius:5px;
	overflow:scroll;
}

.resumo p {
	padding-top:12px;
	line-height:200%;
}

.title {
	font-weight:bold;
	color:#555;
}
.left {
	text-align:left;
	padding-left:5px;
}
.right {
	text-align:right;
	padding-right:5px;
}
.center {
	text-align:center;
}

.local {
	width:20%;
}
.local-thin {
	width:10%;
}
.remainder-thick {
	width:87%;
}
.remainder {
	width:77%;
}


table td {
	padding-top:10px;
}

.section {
	font-size:16px;
	text-transform:uppercase;
	font-weight:bold;
	text-align:center;
	width:100%;
	color:#333;
}

.section-pad {
	padding-top:50px;
}

.section hr { 
	background-color:#999;
	height: 2px;
	padding-top:-10px;
	margin-bottom:10px;
}

.top-align {
	vertical-align:top;
	padding-top:15px;
}
</style>

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h1>Agendamento</h1>
        <div class="btn-right"></div>    

        <div class="user_info">

            
            <br>
       </div>
    </div>
    <div class="modal-body">

       <table align="center">

        <tr>
        	<td class="title right" >Solicitado por</td>
            <td class="left " ><?php echo $ur->nome . ' ' . $ur->sobrenome; ?></td>
        </tr>
        <tr>
        	<td class="title right">Facilidade</td>
            <td class="left " ><?php echo $fcl->nome; ?></td>
        </tr>
        <tr>
        	<td class="title right">Data Requisitada</td>
            <td class="left " ><?php echo date('d/m/Y H:i',strtotime($ag->periodo_inicial)).' a '.date('H:i',strtotime($ag->periodo_final)); ?></td>
        </tr>
        <?php if ($ag->periodo_inicial_marcado != '0000-00-00 00:00:00'):?>
        <tr>
       		 <td class="title right" >Per&iacute;odo Marcado</td>
            <td class="left " ><?php echo date('d/m/Y H:i',strtotime($ag->periodo_inicial_marcado)).' a '.date('H:i',strtotime($ag->periodo_final_marcado)); ?></td>
        </tr>
        <?php endif; ?>
        <tr>
       		 <td class="title right" >Status do Agendamento</td>
            <td class="left " >
            <?php 
            	switch ($ag->status):
					case AGENDAMENTO_STATUS_SOLICITADO: echo 'Solicitado'; break;
					case AGENDAMENTO_STATUS_APROVADO: echo 'Aprovado'; break;
					case AGENDAMENTO_STATUS_NEGADO: echo 'Negado'; break;
					case AGENDAMENTO_STATUS_FALTOU: echo 'Faltou'; break;
					case AGENDAMENTO_STATUS_COMPARECEU: echo 'Compareceu'; break;
					case AGENDAMENTO_STATUS_CANCELADO: echo 'Cancelado'; break;
				endswitch;
            ?>
            </td>
        </tr>
        <tr>
       		 <td class="title right" >Valor</td>
            <td class="left " ><?php echo SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($ag->valor_total,2,TS,DS);?></td>
        </tr>
        <tr>
       		 <td class="title right" >Status do Pagamento</td>
            <td class="left" >
            <?php 
            	switch ($ag->status_pagto):
					case STATUS_PAGTO_PAGO: echo "Pago"; break;
					case STATUS_PAGTO_NAO_PAGO: echo "Pendente"; break;
            	endswitch;
            ?>
            </td>
        </tr>
        
        
    </table>
    	
        
    </div>
    <div class="modal-footer"><br /><br />
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>

