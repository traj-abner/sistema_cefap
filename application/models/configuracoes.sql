INSERT INTO  `traj_cefap`.`configuracoes` (
`id` ,
`param` ,
`label` ,
`tipo_campo` ,
`opcoes` ,
`valor` ,
`valor_padrao` ,
`modified` ,
`autor_id`
)
VALUES (
'1',  'email_host',  'Email - host',  'text ', NULL , NULL ,  'smtp@gmail.com', NULL , NULL
), (
'2',  'email_username',  'Email - username',  'text', NULL , NULL , NULL , NULL , NULL
),(
'3',  'email_password',  'Email - senha',  'text', NULL , NULL , NULL , NULL , NULL
),(
'4',  'email_fromName',  'Email - nome no cmapo “De”',  'text', NULL , NULL , NULL , NULL , NULL
),(
'5',  'email_port',  'Email - porta',  'text', NULL , NULL , '465' , NULL , NULL
),(
'6',  'email_SMTPSecure',  'Email - SMTP Secure',  'text', NULL , NULL , 'ssl' , NULL , NULL
),(
'7',  'email_SMTPAuth',  'Email - SMTP Auth',  'radio', 'true,false' , NULL , 'true' , NULL , NULL
),(
'8',  'backup_path',  'Backup - local dos arquivos',  'text', NULL , NULL , '/backups' , NULL , NULL
),(
'9',  'backup_frequencia',  'Backup - frequencia',  'select', 'diário, cada 2 dias, cada 3 dias, cada 4 dias, cada 5 dias, cada 6 dias, semanal, cada 14 dias, mensal' , NULL , 'diario' , NULL , NULL
),(
'10',  'backup_qtde_manter',  'Backup - quantidade de cópias a manter no servidor',  'text', NULL , NULL , '10' , NULL , NULL
),(
'11',  'backup_email',  'Backup - e-mail a ser enviado',  'text', NULL , NULL , NULL , NULL , NULL
),(
'12',  'backup_split_arquivos',  'Backup - dividir arquivos a cada X megabytes (em branco para não dividir)',  'text', NULL , NULL , '5' , NULL , NULL
),(
'13',  'creditos_prazo',  'Créditos - dias para vencimentos dos boletos',  'text', NULL , NULL , '5' , NULL , NULL
),(
'14',  'creditos_projeto_fusp',  'Créditos - número do projeto FUSP (5 dígitos)',  'text', NULL , NULL , NULL , NULL , NULL
),(
'15',  'creditos_taxa_boleto',  'Créditos - taxa (R$) de cada boleto',  'text', NULL , NULL , NULL , NULL , NULL
),(
'16',  'creditos_agencia',  'Créditos - agência do cedente',  'text', NULL , NULL , NULL , NULL , NULL
),(
'17',  'creditos_agencia_dv',  'Créditos - dígito verificador da agência do cedente',  'text', NULL , NULL , NULL , NULL , NULL
),(
'18',  'creditos_conta',  'Créditos - conta corrente do cedente',  'text', NULL , NULL , NULL , NULL , NULL
),(
'19',  'creditos_conta_dv',  'Créditos - dígito verificador da conta corrente do cedente',  'text', NULL , NULL , NULL , NULL , NULL
),(
'20',  'creditos_banco',  'Créditos - banco de emissão dos boletos',  'select', 'Santander(033)' , NULL , 'Santander(033)' , NULL , NULL
),(
'21',  'creditos_cedente_nome',  'Créditos - nome ou razão social do cedente',  'text', NULL , NULL , NULL , NULL , NULL
),(
'22',  'creditos_cedente_cnpj',  'Créditos - CNPJ do cedente',  'text', NULL , NULL , NULL , NULL , NULL
),(
'23',  'creditos_cedente_endereco_linha1',  'Créditos - endereço do cedente (linha 1)',  'text', NULL , NULL , NULL , NULL , NULL
),(
'24',  'creditos_cedente_endereco_linha2',  'Créditos - endereço do cedente (linha 2)',  'text', NULL , NULL , NULL , NULL , NULL
),(
'25',  'creditos_texto_boleto',  'Créditos - texto das “Instruções” do boleto',  'textarea', NULL , NULL , NULL , NULL , NULL
),(
'26',  'rss_fonte1',  'RSS - endereço do primeiro quadro de feeds',  'text', NULL , NULL , NULL , NULL , NULL
),(
'27',  'rss_fonte2',  'RSS - endereço do segundo quadro de feeds',  'text', NULL , NULL , NULL , NULL , NULL
);

