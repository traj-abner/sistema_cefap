<?php
require_once("dompdf_config.inc.php");
$today = getdate();
$html = '


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    
    <style type="text/css">
		table {
			width:188mm;
			font-family:Arial, Helvetica, sans-serif;
			font-size:12px;
			border-collapse:collapse;
		}
		#header { 
			font-size:25px;
			font-weight:bold;
			text-align:center;
			height:20mm;
		}
		hr {
			border:0;
			border-bottom: 1px dashed #ccc;
			background: #999;
			}
		
		
		.empty_line { 
			height: 5mm;
			border:none;
		}
		.title {
			font-weight:bold;
		}
		.head-title {
			width:35mm;
		}
		
		.list td {
			padding: 1mm 1mm 1mm 1mm;
		}
		
		/*text aligns*/
		.center { text-align:center; }
		.left { 
			text-align:left;
			padding-left:2mm; 
		}
		.right { 
			text-align:right ;
			padding-right:2mm; 
		}
		
		/*box*/
		.thick {
			border-color: #000;
			border-style:solid;
			border-width:medium;
		}
		
		/*medium margins*/
		.margin-top-medium {
			border-top: #000;
			border-top-style:solid;
			border-top-width:medium;
		}
		.margin-bottom-medium {
			border-bottom: #000;
			border-bottom-style:solid;
			border-bottom-width:medium;
		}
		.margin-right-medium {
			border-right: #000;
			border-right-style:solid;
			border-right-width:medium;
		}
		.margin-left-medium {
			border-left: #000;
			border-left-style:solid;
			border-left-width:medium;
		}
		
		/*thin margins*/
		.margin-top-thin {
			border-top: #000;
			border-top-style:solid;
			border-top-width:thin;
		}
		.margin-bottom-thin {
			border-bottom: #000;
			border-bottom-style:solid;
			border-bottom-width:thin;
		}
		.margin-right-thin {
			border-right: #000;
			border-right-style:solid;
			border-right-width:thin;
		}
		.margin-left-thin {
			border-left: #000;
			border-left-style:solid;
			border-left-width:thin;
		}

	</style>
</head>

<body>
<table>
	<tr>
    	<td colspan="12" class="thick" id="header">Extrato da Facility - Sistema CEFAP</td>
    </tr>
    <tr>
    	<td colspan="12" class="empty_line">&nbsp;</td>
    </tr>
    <tr>
    	<td class="title head-title margin-top-medium margin-left-medium margin-right-thin right margin-bottom-thin">Nome Abreviado</td>
        <td colspan="11" class="margin-top-medium margin-right-medium left">' . $fcl->nome_abreviado . '</td>
    </tr>
    <tr>
    	<td class="title right margin-left-medium margin-top-thin margin-right-thin right">Nome Completo</td>
        <td colspan="11" class="left margin-top-thin margin-right-medium">'. $fcl->nome .'</td>
    </tr>
    <tr>
    	<td class="title right margin-left-medium margin-top-thin margin-right-thin right">Administradores</td>
        <td colspan="11" class="left margin-top-thin margin-right-medium">'. $admins .'</td>
    </tr>
    <tr>
    	<td class="title right margin-left-medium margin-bottom-medium margin-top-thin">Descri&ccedil;&atilde;o</td>
        <td colspan="11" class="left margin-top-thin margin-right-medium margin-bottom-medium margin-left-thin">'. $fcl->descricao.'</td>
    </tr>
     <tr>
    	<td colspan="12" class="empty_line">&nbsp;</td>
    </tr>
    </table>
<table class="list">
    <tr>
    	<td colspan="2" class="title center margin-top-medium margin-left-medium margin-right-thin">Data / Hora</td>
        <td colspan="2" class="title center margin-top-medium margin-right-thin">Tipo de Lançamento</td>
        <td colspan="2" class="title center margin-top-medium margin-right-thin">Valor</td>
        <td colspan="2" class="title center margin-top-medium margin-right-thin">Status</td>
        <td colspan="2" class="title center margin-top-medium margin-right-thin">Usu&aacute;rio</td>
        <td colspan="2" class="title center margin-top-medium margin-right-medium">Projeto</td>
    </tr>';
     foreach ($lcn as $lc):
	 $html .= '
    <tr>
    	<td colspan="2"  class="center margin-left-medium margin-top-thin margin-right-thin">' . date("d/m/Y H:i",strtotime($lc->modified)).'
        ';
					
		$html .='
        </td>
        <td colspan="2" class="center margin-top-thin margin-right-thin">';
			switch ($lc->tipo):
				case LANCAMENTO_DEBITO: $html .= 'Cr&eacute;dito'; break;
				case LANCAMENTO_CREDITO: $html .= 'D&eacute;bito'; break;
			endswitch;
		$html .='
        </td>
        <td colspan="2" class="center margin-top-thin margin-right-thin">'.SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($lc->valor,2,TS,DS);
		$html .='
        </td>
        <td colspan="2" class="center margin-top-thin margin-right-thin">';
			switch ($lc->status):
				case STATUS_LANCAMENTO_ATIVO: $html .= 'Ativo'; break;
				case STATUS_LANCAMENTO_INATIVO: $html .= 'Inativo'; break;
				case STATUS_LANCAMENTO_CANCELADO: $html .= 'Cancelado'; break;
			endswitch;
		$html .='
        </td>
        <td colspan="2" class="center margin-top-thin margin-right-thin">'.$lc->usuario_username;
			
		$html .='
        </td>
        <td colspan="4" class="center margin-top-thin margin-right-medium">';
			$agn->include_related('projetos')->where('chave',$lc->chave)->get();
			$html .= $agn->projeto_titulo;
		$html .='
        </td>
    </tr>';
    endforeach;
	$html .='
    <tr>
    	<td colspan="12" class="margin-top-medium empty_line">&nbsp;</td>
    </tr>
</table>
<table class="list">
    <tr>
    	<td colspan="2" class="title right margin-bottom-medium margin-top-medium margin-left-medium margin-right-thin">Total de Créditos</td>
        <td colspan="2" class="left margin-bottom-medium margin-top-medium margin-right-thin">'.SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($credit,2,TS,DS) .'</td>
        <td colspan="2" class="title right margin-bottom-medium margin-top-medium margin-right-thin">Total de Debitos</td>
        <td colspan="2" class="left margin-bottom-medium margin-top-medium margin-right-thin">'.SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($debit,2,TS,DS).'</td>
        <td colspan="2" class="title right margin-bottom-medium margin-top-medium margin-right-thin">Saldo</td>
        <td colspan="2" class="left margin-bottom-medium margin-top-medium margin-right-medium">'. SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($cashout,2,TS,DS).'</td>
    </tr>
</table>
</body>
</html>

';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("extratoUI".$usr->id."at".$today['mday'].$today['mon'].$today['year']."_".$today['hours'].$today['minutes'].$today['seconds'].".pdf");
?>
