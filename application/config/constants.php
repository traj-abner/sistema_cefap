<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	#DECIMAL SEPARATOR
	define("DS", ".");
	
	#THOUSAND SEPARATOR
	define("TS",",");

	define("URL_SITE_CEFAP", "http://cefap.trajettoria.com");
	
	define("BACKUP_ARQUIVOS_EXCLUIDOS", 0);
	define("BACKUP_ARQUIVOS_PRESENTES", 1);

	define("STATUS_AJUDA_NAO_PUBLICADO", 0);
	define("STATUS_AJUDA_PUBLICADO", 1);

	define("UNIDADE_VALOR_POR_HORA ", 0);
	define("UNIDADE_VALOR_POR_USO", 1);
	define("UNIDADE_VALOR_POR_MINUTO", 2);

	define("LANCAMENTO_DIRETO_NAO", 0);
	define("LANCAMENTO_DIRETO_SIM", 1);

	define("CAMPO_NAO_OBRIGATORIO", 0);
	define("CAMPO_OBRIGATORIO", 1);

	define("STATUS_PAGTO_PAGO", 0);
	define("STATUS_PAGTO_NAO_PAGO", 1);

	define("STATUS_MSG_NAO_LIDA", 0);
	define("STATUS_MSG_LIDA", 1);
	define("STATUS_MSG_EXCLUIDA", 2);

	define("TIPO_USUARIO_PROFESSOR", 0);
	define("TIPO_USUARIO_POSDOC", 1);
	define("TIPO_USUARIO_JOVEM_PESQUISADOR", 2);
	define("TIPO_USUARIO_MESTRANDO", 3);
	define("TIPO_USUARIO_DOUTORANDO", 4);
	define("TIPO_USUARIO_PESQUISADOR", 5);

	define("NEWSLETTER_NAO_RECEBE", 0);
	define("NEWSLETTER_RECEBE", 1);

	define("LANCAMENTO_CREDITO", 0);
	define("LANCAMENTO_DEBITO", 1);

	define("METODO_PAGTO_BOLETO", 0);
	define("METODO_PAGTO_DINHEIRO", 1);

	define("STATUS_LANCAMENTO_ATIVO", 0);
	define("STATUS_LANCAMENTO_INATIVO", 1);
	define("STATUS_LANCAMENTO_CANCELADO",2);

	define("STATUS_BOLETO_EM_ABERTO", 0);	// antes do vencimento E não pago
	define("STATUS_BOLETO_VENCIDO", 1);		// depois do vencimento E não pago
	define("STATUS_BOLETO_PAGO", 2);
	define("STATUS_BOLETO_CANCELADO", 3);

	define("STATUS_FACILITIES_ATIVO", 0);
	define("STATUS_FACILITIES_INATIVO", 1);
	define("STATUS_FACILITIES_EXCLUIDO", 2);

	define("STATUS_USUARIO_INATIVO", 0);
	define("STATUS_USUARIO_ATIVO", 1);
	define("STATUS_USUARIO_BLOQUEADO", 2);
	define("STATUS_USUARIO_EXCLUIDO", 3);
	
	define("STATUS_PROJETO_INATIVO", 0);
	define("STATUS_PROJETO_ATIVO", 1);
	define("STATUS_PROJETO_EXCLUIDO", 2);
	
	define("STATUS_CAMPO_PADRAO", 0);
	define("STATUS_CAMPO_EXCLUIDO", 1);

	define("CREDENCIAL_USUARIO_COMUM", 0);
	define("CREDENCIAL_USUARIO_ADMIN", 1);
	define("CREDENCIAL_USUARIO_SUPERADMIN", 10);

	define("LOG_LOGIN", 0);
	define("LOG_LOGOUT", 1);
	define("LOG_MUDANCA_SENHA", 2);
	define("LOG_MUDANCA_CADASTRO", 3);
	define("LOG_BACKUP_ENVIADO", 4);

	define("AGENDAMENTO_STATUS_SOLICITADO", 0);
	define("AGENDAMENTO_STATUS_APROVADO", 1);
	define("AGENDAMENTO_STATUS_NEGADO", 2);
	define("AGENDAMENTO_STATUS_FALTOU", 3);
	define("AGENDAMENTO_STATUS_COMPARECEU", 4);
	define("AGENDAMENTO_STATUS_CANCELADO", 5);
	define("AGENDAMENTO_STATUS_EXCLUIDO", 6);

	define("PERIODO_STATUS_DISPONIVEL", 0);
	define("PERIODO_STATUS_A_CONFIRMAR", 1);
	define("PERIODO_STATUS_INDISPONIVEL", 2);

	define("TIPO_AGENDAMENTO_AGENDA", 0);
	define("TIPO_AGENDAMENTO_INDIVIDUALIZADA", 1);

	define("TIPO_CAMPO_TEXT", 0);
	define("TIPO_CAMPO_RADIO", 1);
	define("TIPO_CAMPO_CHECKBOX", 2);
	define("TIPO_CAMPO_TEXTAREA", 3);
	define("TIPO_CAMPO_UPLOAD", 4);
	define("TIPO_CAMPO_SELECT", 5);
	define("TIPO_CAMPO_PASSWORD", 6);
	
	define("SIMBOLO_MOEDA","R$");
	define("SIMBOLO_MOEDA_ISO","BRL");
	define("SIMBOLO_MOEDA_DEFAULT",SIMBOLO_MOEDA);
	
	define("INSTITUICOES_FOMENTO", serialize(array("Fapesp", "CNPq", "CAPES", "FINEP", "Outros")));

        
        define("EMAIL_FROM", 'thais.dias@trajettoria.com');
        define("EMAIL_NAME",'Thais');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */

function dbDateTime()
{
	 $today = getdate();
	 return $today['year'].'-'.str_pad($today['mon'], 2, '0', STR_PAD_LEFT).'-'.str_pad($today['mday'], 2, '0', STR_PAD_LEFT).' '.str_pad($today['hours'], 2, '0', STR_PAD_LEFT).':'.str_pad($today['minutes'], 2, '0', STR_PAD_LEFT).':'.str_pad($today['seconds'], 2, '0', STR_PAD_LEFT);
}
function dbDate()
{
	 $today = getdate();
	 return $today['year'].'-'.str_pad($today['mon'], 2, '0', STR_PAD_LEFT).'-'.str_pad($today['mday'], 2, '0', STR_PAD_LEFT);
}
function dbTime()
{
	 $today = getdate();
	 
	 return str_pad($today['hours'], 2, '0', STR_PAD_LEFT).':'.str_pad($today['minutes'], 2, '0', STR_PAD_LEFT).':'.str_pad($today['seconds'], 2, '0', STR_PAD_LEFT);
}

define('CURRENT_DB_DATETIME',dbDateTime());
define('CURRENT_DB_DATE',dbDateTime());
define('CURRENT_DB_TIME',dbDateTime());