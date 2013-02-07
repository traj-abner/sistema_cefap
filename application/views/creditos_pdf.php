<?php
require_once("dompdf_config.inc.php");

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
		
		
		.empty_line { 
			height: 5mm;
			border:none;
		}
		.title {
			font-weight:bold;
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
    	<td colspan="12" class="thick" id="header">Lista de Lançamentos - Sistema CEFAP</td>
    </tr>
    <tr>
    	<td colspan="12" class="empty_line">&nbsp;</td>
    </tr>
    <tr>
    	<td class="title margin-top-medium margin-left-medium margin-right-thin right margin-bottom-thin">Nome Completo</td>
        <td colspan="7" class="margin-top-medium left">' . $usr->nome . ' ' . $usr->sobrenome . '</td>
        <td class="title margin-top-medium margin-right-thin margin-left-thin right">CPF</td>
        <td colspan="3" class="margin-top-medium margin-right-medium left">'. substr($usr->cpf,0,3).'.'.substr($usr->cpf,3,3).'.'.substr($usr->cpf,6,3).'-'.substr($usr->cpf,9,2) .'</td>
    </tr>
    <tr>
    	<td class="title right margin-left-medium margin-top-thin margin-right-thin right">Endereço</td>
        <td colspan="11" class="left margin-top-thin margin-right-medium">'. $usr->endereco.'</td>
    </tr>
    <tr>
    	<td class="title right margin-left-medium margin-top-thin">Cidade</td>
        <td colspan="2" class="left margin-top-thin margin-left-thin">'. $usr->cidade.'</td>
        <td class="title right margin-top-thin margin-left-thin">UF</td>
        <td class="center margin-top-thin margin-left-thin">'.$usr->uf.'</td>
        <td class="title right margin-top-thin margin-left-thin">Instituição</td>
        <td colspan="6" class="left margin-top-thin margin-left-thin margin-right-medium">'.$usr->instituicao.'</td>
    </tr>
    <tr>
    	<td class="title right margin-left-medium margin-bottom-medium margin-top-thin">CEP</td>
        <td colspan="2" class="left margin-top-thin margin-bottom-medium margin-right-thin margin-left-thin">'.substr(str_replace('-','',$usr->cep),0,5).'-'.substr(str_replace('-','',$usr->cep),5,3).'</td>
        <td colspan="2" class="title right margin-top-thin margin-bottom-medium margin-right-thin" >e-mail</td>
        <td colspan="7" class="left margin-top-thin margin-right-medium margin-bottom-medium">'. $usr->email.'</td>
    </tr>
     <tr>
    	<td colspan="12" class="empty_line">&nbsp;</td>
    </tr>
    </table>
<table class="list">
    <tr>
    	<td colspan="2" class="title center margin-top-medium margin-left-medium margin-right-thin">Data / Hora</td>
        <td class="title center margin-top-medium margin-right-thin">Tipo de Lançamento</td>
        <td colspan="1" class="title center margin-top-medium margin-right-thin">Método de Pagamento</td>
        <td colspan="2" class="title center margin-top-medium margin-right-thin">Valor</td>
        <td colspan="2" class="title center margin-top-medium margin-right-thin">Status</td>
        <td colspan="4" class="title center margin-top-medium margin-right-medium">Obs</td>
    </tr>';
     foreach ($lcn as $lc):
	 $html .= '
    <tr>
    	<td colspan="2"  class="center margin-left-medium margin-top-thin margin-right-thin">
        ';
					$dvc = explode(' ',$lc->modified);
					$dvc_d = explode('-',$dvc[0]);
					$dvc_h = explode(':',$dvc[1]);
					$html .= $dvc_d[2] . '/' . $dvc_d[1] . '/' . $dvc_d[0] . ' ' . $dvc_h[0] . ':' . $dvc_h[1];
		$html .='
        </td>
        <td class="center margin-top-thin margin-right-thin">';
			switch ($lc->tipo):
				case LANCAMENTO_CREDITO: $html .= 'Crédito'; break;
				case LANCAMENTO_DEBITO: $html .= 'Débito'; break;
			endswitch;
		$html .='
        </td>
        <td colspan="1" class="center margin-top-thin margin-right-thin">';
			switch ($lc->metodo_pagto):
				case METODO_PAGTO_DINHEIRO: $html .= 'Dinheiro'; break;
				case METODO_PAGTO_BOLETO: $html .= 'Boleto'; break;
			endswitch;
		$html .='
        </td>
        <td colspan="2" class="center margin-top-thin margin-right-thin">';
		if ($lc->tipo == LANCAMENTO_DEBITO) $html .= '- '; 
		$html .= SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($lc->valor,2,TS,DS);
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
        <td colspan="4" class="center margin-top-thin margin-right-medium">';
			if ($lc->metodo_pagto == METODO_PAGTO_BOLETO):
				$html .= 'Nosso Numero: ' . $config->valor.str_pad($lc->boleto_id, 7, '0', STR_PAD_LEFT);
				if (!empty($lc->obs)):
					$html .= '<br>'.$lc->obs;
				endif;
			else:
				$html .= $lc->obs;
			endif;
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
        <td colspan="2" class="left margin-bottom-medium margin-top-medium margin-right-thin">'.SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($credit,2,TS,DS).'</td>
        <td colspan="2" class="title right margin-bottom-medium margin-top-medium margin-right-thin">Total de Debitos</td>
        <td colspan="2" class="left margin-bottom-medium margin-top-medium margin-right-thin">'.SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($debit,2,TS,DS).'</td>
        <td colspan="2" class="title right margin-bottom-medium margin-top-medium margin-right-thin">Saldo</td>
        <td colspan="2" class="left margin-bottom-medium margin-top-medium margin-right-medium">'. SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($cashout,2,TS,DS).'</td>
    </tr>
</table>
</body>
</html>

';
$today = getdate();
//echo $html;
$temp = "
<body>TESTE</body>


";
//echo $temp;
$dompdf = new DOMPDF();
//$dompdf->load_html($html);
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("extratoUI".$usr->id."at".$today['mday'].$today['mon'].$today['year']."_".$today['hours'].$today['minutes'].$today['seconds'].".pdf");
?>
