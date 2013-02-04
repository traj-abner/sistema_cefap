<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>         |
// | Desenvolvimento Boleto Santander-Banespa : Fabio R. Lenharo                |
// +----------------------------------------------------------------------------+


// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE
//$dias_de_prazo_para_pagamento = 5;
//$taxa_boleto = 2.95;
//$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
//$valor_cobrado = "2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal



// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 2.95;

$dadosboleto["nosso_numero"] = str_pad($bol->id, 7, '0', STR_PAD_LEFT); // Nosso numero sem o DV - REGRA: Máximo de 7 caracteres!
$dadosboleto["numero_documento"] = "";	// Num do pedido ou nosso numero
$dadosboleto["data_vencimento"] = $data_vencimento; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = $data_emissao; // Data de emissão do Boleto
$dadosboleto["data_processamento"] = $data_emissao; // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = number_format($bol->valor_total, 2, ',', ''); 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $usr->nome . ' ' . $usr->sobrenome . ' - CPF:' . substr($usr->cpf,0,3).'.'.substr($usr->cpf,3,3).'.'.substr($usr->cpf,6,3).'-'.substr($usr->cpf,9,2);
$dadosboleto["endereco1"] = $usr->endereco;
$dadosboleto["endereco2"] = $usr->cidade . ', ' . strtoupper($usr->uf) . ' - CEP:' . $usr->cep;

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = $demonstrativo1; 
$dadosboleto["demonstrativo2"] = "Valor l&iacute;quido dos cr&eacute;ditos: R$ ".number_format($bol->valor_creditos, 2, ',', '') . "<br>Taxa banc&aacute;ria: R$ ".number_format($bol->taxa, 2, ',', '');
$dadosboleto["demonstrativo3"] = $bol->obs;
$dadosboleto["instrucoes1"] = "- Sr. Caixa, não receber após o vencimento";
$dadosboleto["instrucoes2"] = "";
$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: cefap@icb.usp.br";
$dadosboleto["instrucoes4"] = "";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = SIMBOLO_MOEDA;
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS PERSONALIZADOS - SANTANDER BANESPA
$dadosboleto["codigo_cliente"] = '3909220'; // Código do Cliente (PSK) (Somente 7 digitos)
$dadosboleto["codigo_projeto"] = $codigo_projeto; // Código do Cliente (PSK) (Somente 7 digitos)
$dadosboleto["ponto_venda"] = $agencia; // Ponto de Venda = Agencia
$dadosboleto["carteira"] = "102";  // Cobrança Simples - SEM Registro
$dadosboleto["carteira_descricao"] = "COBRANÇA SIMPLES - CSR";  // Descrição da Carteira

// SEUS DADOS
$dadosboleto["identificacao"] = "";
$dadosboleto["cpf_cnpj"] = "";
$dadosboleto["endereco"] = "";
$dadosboleto["cidade_uf"] = "";
$dadosboleto["cedente"] = "CEFAP-USP";

// NÃO ALTERAR!
include("funcoes_santander_banespa.php"); 
include("layout_santander_banespa.php");

?>