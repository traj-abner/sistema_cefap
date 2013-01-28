-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Jan 28, 2013 as 04:32 PM
-- Versão do Servidor: 5.0.51
-- Versão do PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Banco de Dados: `traj_cefap`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `agendamentos`
-- 

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `facility_id` int(11) default NULL,
  `projeto_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `aprovado_por_id` int(11) default NULL,
  `status` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `periodo_inicial` varchar(45) default NULL,
  `periodo_final` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `unidade` varchar(45) default NULL,
  `valor_total` varchar(45) default NULL,
  `status_pagto` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `facility_id` (`facility_id`),
  KEY `projeto_id` (`projeto_id`),
  KEY `aprovado_por_id` (`aprovado_por_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `agendamentos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `ajudas`
-- 

CREATE TABLE `ajudas` (
  `id` int(11) NOT NULL,
  `created` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `conteudo` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `ajudas`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `backups`
-- 

CREATE TABLE `backups` (
  `id` int(11) NOT NULL,
  `datetime` varchar(45) default NULL,
  `tamanho_total` varchar(45) default NULL,
  `tamanho_split` varchar(45) default NULL,
  `filenames` varchar(45) default NULL,
  `arquivos_presentes` varchar(45) default NULL,
  `path` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `backups`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `backups_emails`
-- 

CREATE TABLE `backups_emails` (
  `id` int(11) NOT NULL,
  `backup_id` int(11) default NULL,
  `datetime` varchar(45) default NULL,
  `email_to` varchar(45) default NULL,
  `anexo` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `backup_id` (`backup_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `backups_emails`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `boletos`
-- 

CREATE TABLE `boletos` (
  `id` int(11) NOT NULL auto_increment,
  `nosso_numero` varchar(45) default NULL,
  `chave` varchar(45) default NULL,
  `data_emissao` datetime default NULL,
  `data_vencimento` date default NULL,
  `valor_creditos` float default NULL,
  `taxa` float default NULL,
  `valor_total` float default NULL,
  `status` int(11) default NULL,
  `usuario_id` int(11) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Extraindo dados da tabela `boletos`
-- 

INSERT INTO `boletos` VALUES (1, '198491591', 'ASDSARWQASD', '2013-01-21 14:46:31', '2013-01-30', 239.95, NULL, 239.95, 2, 69, NULL);
INSERT INTO `boletos` VALUES (2, '78178871574774445', '5ASKDUAHSI', '2013-01-01 16:25:51', '2013-01-19', 318.15, NULL, 318.15, 2, 69, NULL);
INSERT INTO `boletos` VALUES (3, '984194165456', 'sadsadsa', '2013-01-22 10:00:51', '2013-01-24', 2278.95, NULL, 2278.95, 2, 68, NULL);
INSERT INTO `boletos` VALUES (4, '5548948941191987894', NULL, '2013-01-28 11:51:26', '2013-01-31', 512, 1, 513, 0, 69, NULL);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `campos`
-- 

CREATE TABLE `campos` (
  `id` int(11) NOT NULL,
  `label` varchar(45) default NULL,
  `tipo_campo` varchar(45) default NULL,
  `opcoes` varchar(45) default NULL,
  `valor_padrao` varchar(45) default NULL,
  `obrigatorio` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `campos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `configuracoes`
-- 

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL,
  `param` varchar(45) default NULL,
  `label` varchar(45) default NULL,
  `tipo_campo` varchar(45) default NULL,
  `opcoes` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `valor_padrao` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `configuracoes`
-- 

INSERT INTO `configuracoes` VALUES (20, 'creditos_banco', 'Créditos - banco de emissão dos boletos', 'select', 'Santander(033)', 'Santander(033)', 'Santander(033)', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (19, 'creditos_conta_dv', 'Créditos - dígito verificador da conta corren', 'text', NULL, '25', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (18, 'creditos_conta', 'Créditos - conta corrente do cedente', 'text', NULL, '1234587', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (16, 'creditos_agencia', 'Créditos - agência do cedente', 'text', NULL, '0108', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (17, 'creditos_agencia_dv', 'Créditos - dígito verificador da agência do c', 'text', NULL, '9', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (15, 'creditos_taxa_boleto', 'Créditos - taxa (R$) de cada boleto', 'text', NULL, 'R$ 50,00', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (13, 'creditos_prazo', 'Créditos - dias para vencimentos dos boletos', 'text', NULL, '10', '5', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (14, 'creditos_projeto_fusp', 'Créditos - número do projeto FUSP (5 dígitos)', 'text', NULL, '12345', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (11, 'backup_email', 'Backup - e-mail a ser enviado', 'text', NULL, 'teste@teste.com.br', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (12, 'backup_split_arquivos', 'Backup - dividir arquivos a cada X megabytes ', 'text', NULL, '5', '5', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (10, 'backup_qtde_manter', 'Backup - quantidade de cópias a manter no ser', 'text', NULL, '10', '10', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (9, 'backup_frequencia', 'Backup - frequencia', 'select', 'diário, cada 2 dias, cada 3 dias, cada 4 dias', 'diario', 'diario', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (8, 'backup_path', 'Backup - local dos arquivos', 'text', NULL, '/backups', '/backups', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (7, 'email_SMTPAuth', 'Email - SMTP Auth', 'radio', '1,0', '1', '1', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (6, 'email_SMTPSecure', 'Email - SMTP Secure', 'text', NULL, 'teste@teste.com.br', 'ssl', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (5, 'email_port', 'Email - porta', 'text', NULL, '465', '465', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (4, 'email_fromName', 'Email - nome no cmapo “De”', 'text', NULL, 'teste@teste.com.br', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (2, 'email_username', 'Email - username', 'text', NULL, 'Thais', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (3, 'email_password', 'Email - senha', 'text', NULL, 'K8g$fwa53', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (1, 'email_host', 'Email - host', 'text ', NULL, 'thais.dias@trajettoria.com', 'smtp@gmail.com', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (21, 'creditos_cedente_nome', 'Créditos - nome ou razão social do cedente', 'text', NULL, 'Nome', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (22, 'creditos_cedente_cnpj', 'Créditos - CNPJ do cedente', 'text', NULL, '025.124.524/0001-25', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (23, 'creditos_cedente_endereco_linha1', 'Créditos - endereço do cedente (linha 1)', 'text', NULL, 'Rua teste, 02', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (24, 'creditos_cedente_endereco_linha2', 'Créditos - endereço do cedente (linha 2)', 'text', NULL, 'Rua teste, 03', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (25, 'creditos_texto_boleto', 'Créditos - texto das “Instruções” do boleto', 'textarea', NULL, 'teste            ', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (26, 'rss_fonte1', 'RSS - endereço do primeiro quadro de feeds', 'text', NULL, 'www.teste.com.br', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (27, 'rss_fonte2', 'RSS - endereço do segundo quadro de feeds', 'text', NULL, 'www.teste.com.br', NULL, '2012-12-19 15:34:35 -0200', NULL);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `contas`
-- 

CREATE TABLE `contas` (
  `id` int(11) NOT NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `saldo` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_contas_usuarios1` (`usuarios_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `contas`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `facilities`
-- 

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(45) default NULL,
  `nome_abreviado` varchar(45) default NULL,
  `descricao` varchar(200) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `tipo_agendamento` varchar(45) default NULL,
  `arquivos` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `unidade_valor` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

-- 
-- Extraindo dados da tabela `facilities`
-- 

INSERT INTO `facilities` VALUES (4, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'Habitabilis cetera, aquae consistere deus corpora diremit magni nullo origo rerum otia sive terra possedit tepescunt di obsistitur adhuc homo subdita persidaque foret frigida auroram fuerant tegi prim', 'timecreated', '2013-01-18 15:09:43 -0200', '0', '0', 'teste', '5000', '10');
INSERT INTO `facilities` VALUES (1, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', '2013-01-17 16:22:04 -0200', '2013-01-21 10:29:14 -0200', '1', '1', 'arquivos', '50', '10');
INSERT INTO `facilities` VALUES (2, 'BIOMASS', 'Mass Spectometry and Proteome Research', 'Mass Spectometry and Proteome Research', NULL, '2013-01-16 11:59:30 -0200', '0', '2', 'arquivos', '50', '10');
INSERT INTO `facilities` VALUES (3, 'FLUIR', 'Flow Cytometry and Imaging Research', 'Flow Cytometry and Imaging Research', '2013-01-21 10:11:22 -0200', '2013-01-21 10:11:24 -0200', '0', '2', 'arquivos', '50', '10');
INSERT INTO `facilities` VALUES (12, ' Nome Completo23', 'Nome abreviado2', 'um dois três', '2013-01-03 12:47:17 -0200', '2013-01-18 14:34:24 -0200', '0', '1', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (75, 'Bla bla bla', 'TesteBlá', 'blablabla', '2013-01-18 14:16:16 -0200', NULL, '0', 'individualizado', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (69, 'teste', 'Tteste', '10010010001001001010', '2013-01-17 15:35:30 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (60, 'nomecompleto', 'nomeabreviado', 'descrição', '2013-01-17 12:55:41 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (61, 'teste', 'Teste', 'teste', '2013-01-17 14:05:55 -0200', NULL, '0', 'individualizado', NULL, NULL, NULL);
INSERT INTO `facilities` VALUES (59, 'nomecompleto', 'nomeabreviado', 'descrição', '2013-01-17 12:54:23 -0200', NULL, '0', 'calendario', NULL, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `facilities_formularios`
-- 

CREATE TABLE `facilities_formularios` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) default NULL,
  `formulario_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `facility_id` (`facility_id`),
  KEY `formulario_id` (`formulario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `facilities_formularios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `facilities_usuarios`
-- 

CREATE TABLE `facilities_usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `usuario_id` int(11) default NULL,
  `facility_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `fk_facilities_usuarios_facilities1` (`facility_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

-- 
-- Extraindo dados da tabela `facilities_usuarios`
-- 

INSERT INTO `facilities_usuarios` VALUES (2, 68, 2);
INSERT INTO `facilities_usuarios` VALUES (3, 68, 3);
INSERT INTO `facilities_usuarios` VALUES (106, 37, 1);
INSERT INTO `facilities_usuarios` VALUES (6, 69, 2);
INSERT INTO `facilities_usuarios` VALUES (7, 69, 3);
INSERT INTO `facilities_usuarios` VALUES (104, 37, 4);
INSERT INTO `facilities_usuarios` VALUES (105, 70, 4);
INSERT INTO `facilities_usuarios` VALUES (93, 70, 75);
INSERT INTO `facilities_usuarios` VALUES (92, 39, 75);
INSERT INTO `facilities_usuarios` VALUES (96, 70, 12);
INSERT INTO `facilities_usuarios` VALUES (91, 37, 75);
INSERT INTO `facilities_usuarios` VALUES (107, 70, 1);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `formularios`
-- 

CREATE TABLE `formularios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `formularios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `formulario_campos`
-- 

CREATE TABLE `formulario_campos` (
  `id` int(11) NOT NULL,
  `formulario_id` int(11) default NULL,
  `campo_id` int(11) default NULL,
  `secao` varchar(45) default NULL,
  `ordem` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `formulario_id` (`formulario_id`),
  KEY `campo_id` (`campo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `formulario_campos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `lancamentos`
-- 

CREATE TABLE `lancamentos` (
  `id` int(11) NOT NULL auto_increment,
  `usuario_id` int(11) default NULL,
  `facility_id` int(11) NOT NULL,
  `chave` varchar(45) default NULL,
  `valor` float default NULL,
  `tipo` tinyint(4) default NULL,
  `autor_id` int(11) default NULL,
  `obs` varchar(550) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `status` tinyint(4) default NULL,
  `metodo_pagto` tinyint(4) default NULL,
  `descricao` varchar(550) default NULL,
  `cancelamento_justificativa` varchar(45) default NULL,
  `cancelamento_autor_id` int(11) default NULL,
  `cancelamento_datetime` datetime default NULL,
  `lancamento_direto` varchar(45) default NULL,
  `boleto_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `autor_id` (`autor_id`),
  KEY `cancelamento_autor_id` (`cancelamento_autor_id`),
  KEY `fk_lancamentos_boletos1` (`boleto_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Extraindo dados da tabela `lancamentos`
-- 

INSERT INTO `lancamentos` VALUES (1, 69, 0, NULL, 239.95, 0, NULL, NULL, '2013-01-23 10:37:37', '2013-01-28 10:29:20', 0, 0, NULL, '', 0, '2013-01-24 15:23:25', NULL, 1);
INSERT INTO `lancamentos` VALUES (2, 69, 0, NULL, 318.15, 0, NULL, NULL, '2013-01-23 11:23:04', '2013-01-28 10:26:50', 0, 0, NULL, 'Boleto não pago', 68, '2013-01-24 15:24:15', NULL, 2);
INSERT INTO `lancamentos` VALUES (3, 69, 1, NULL, 216.73, 1, 68, 'Utilização facility', '2013-01-23 12:21:46', '2013-01-28 11:41:40', 0, NULL, NULL, 'facility inativada', 68, '2013-01-24 16:05:09', NULL, 0);
INSERT INTO `lancamentos` VALUES (4, 68, 0, NULL, 2278.95, 0, NULL, NULL, '2013-01-23 14:00:30', '2013-01-28 10:14:44', 1, 0, NULL, NULL, NULL, NULL, NULL, 3);
INSERT INTO `lancamentos` VALUES (5, 69, 0, NULL, 513, 0, NULL, NULL, '2013-01-28 11:52:34', '2013-01-28 11:55:19', 1, 0, NULL, NULL, NULL, NULL, NULL, 4);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `logs`
-- 

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `facility_id` int(11) default NULL,
  `ip` varchar(45) default NULL,
  `acao` varchar(45) default NULL,
  `datetime` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `facility_id` (`facility_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `logs`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `mensagens`
-- 

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL auto_increment,
  `from_id` int(11) default NULL,
  `conteudo` text,
  `assunto` varchar(250) default NULL,
  `data_envio` datetime default NULL,
  `data_ultima_leitura` datetime default NULL,
  `cont_leituras` int(11) default NULL,
  `status` tinyint(4) default NULL,
  PRIMARY KEY  (`id`),
  KEY `from_id` (`from_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Extraindo dados da tabela `mensagens`
-- 

INSERT INTO `mensagens` VALUES (3, 68, '<p><span  line-through;">Mensagem</span>&nbsp;nh&eacute;</p>', 'Assunto', '2013-01-28 15:56:23', NULL, 0, 0);
INSERT INTO `mensagens` VALUES (2, 68, '<p><span  underline;">This is the first paragraph.</span></p>\r\n<p><em>This is the second paragraph.</em></p>\r\n<p><strong>This is the third paragraph.</strong></p>', 'Outro Assunto', '2013-01-28 15:48:57', NULL, 0, 0);
INSERT INTO `mensagens` VALUES (4, 68, '<p>Mensagem&nbsp;</p>', 'Outro Assunto', '2013-01-28 16:10:39', NULL, 0, 0);
INSERT INTO `mensagens` VALUES (5, 68, '<p>This is the first paragraph.</p>\r\n<p>This is the second paragraph.</p>\r\n<p>This is the third paragraph.</p>', 'nhé', '2013-01-28 16:14:22', NULL, 0, 0);
INSERT INTO `mensagens` VALUES (6, 68, '<p>\r\n<p>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 36px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 48px; color: #333333;">Dennis the Peasant</h1>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">It''s only a model. The nose? The swallow may fly south with the sun, and the house martin or the plover may seek warmer climes in winter, yet these are not strangers to our land. I have to push the pram a lot. Well, what do you want? Well, what do you want?</p>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 28px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 48px; color: #333333;">Sets The Cinema Back 900 Years!</h2>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Well, she turned me into a newt. Ni! Ni! Ni! Ni! You don''t frighten us, English pig-dogs! Go and boil your bottoms, sons of a silly person! I blow my nose at you, so-called Ah-thoor Keeng, you and all your silly English K-n-n-n-n-n-n-n-niggits! Well, she turned me into a newt.</p>\r\n<ul  0px 0px 1.5em; padding: 0px 0px 0px 2em; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; list-style-position: initial; list-style-image: initial; line-height: 1.5em; color: #333333;">\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Oh, ow!</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Knights of Ni, we are but simple travelers who seek the enchanter who lives beyond these woods.</li>\r\n</ul>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 24px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 48px; color: #333333;">Am I right?</h3>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">And this isn''t my nose. This is a false one. On second thoughts, let''s not go there. It is a silly place. The Lady of the Lake, her arm clad in the purest shimmering samite, held aloft Excalibur from the bosom of the water, signifying by divine providence that I, Arthur, was to carry Excalibur. That is why I am your king.</p>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 20px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 24px; color: #333333;">The Knights Who Say Ni demand a sacrifice!</h4>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Why do you think that she is a witch? Oh, ow! How do you know she is a witch?</p>\r\n<ol  0px 0px 1.5em; padding: 0px 0px 0px 2em; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Look, my liege!</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">What a strange person.</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">The Knights Who Say Ni demand a sacrifice!</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">The Knights Who Say Ni demand a sacrifice!</li>\r\n</ol>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 24px; color: #333333;">First shalt thou take out the Holy Pin</h5>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">What a strange person. And this isn''t my nose. This is a false one. Bloody Peasant! Well, I didn''t vote for you.</p>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 24px; color: #333333;">First shalt thou take out the Holy Pin</h6>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Found them? In Mercia?! The coconut''s tropical! Why do you think that she is a witch? Well, what do you want?</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Shut up! You can''t expect to wield supreme power just ''cause some watery tart threw a sword at you! And this isn''t my nose. This is a false one.</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Oh! Come and see the violence inherent in the system! Help, help, I''m being repressed! And this isn''t my nose. This is a false one. Well, I didn''t vote for you. Burn her anyway!</p>\r\n<p  0px; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Well, I didn''t vote for you. It''s only a model. Burn her anyway! Ni! Ni! Ni! Ni! Well, Mercia''s a temperate zone! I dunno. Must be a king.</p>\r\n</p>\r\n</p>', 'Assunto', '2013-01-28 16:24:55', NULL, 0, 0);
INSERT INTO `mensagens` VALUES (7, 68, '<p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Why do you think that she is a witch? You don''t vote for kings. We want a shrubbery!! &hellip;Are you suggesting that coconuts migrate? On second thoughts, let''s not go there. It is a silly place. Bring her forward!</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">And this isn''t my nose. This is a false one. What a strange person. The Knights Who Say Ni demand a sacrifice! Well, I didn''t vote for you. We found them.</p>\r\n<ul  0px 0px 1.5em; padding: 0px 0px 0px 2em; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; list-style-position: initial; list-style-image: initial; line-height: 1.5em; color: #333333;">\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">But you are dressed as one&hellip;</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">It''s only a model.</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">&hellip;Are you suggesting that coconuts migrate?</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Knights of Ni, we are but simple travelers who seek the enchanter who lives beyond these woods.</li>\r\n</ul>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Oh! Come and see the violence inherent in the system! Help, help, I''m being repressed! A newt? Shut up! Will you shut up?! Shut up! Will you shut up?!</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">The Lady of the Lake, her arm clad in the purest shimmering samite, held aloft Excalibur from the bosom of the water, signifying by divine providence that I, Arthur, was to carry Excalibur. That is why I am your king. The Knights Who Say Ni demand a sacrifice! Listen. Strange women lying in ponds distributing swords is no basis for a system of government. Supreme executive power derives from a mandate from the masses, not from some farcical aquatic ceremony.</p>\r\n<ol  0px 0px 1.5em; padding: 0px 0px 0px 2em; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Did you dress her up like this?</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Oh! Come and see the violence inherent in the system! Help, help, I''m being repressed!</li>\r\n</ol>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">You can''t expect to wield supreme power just ''cause some watery tart threw a sword at you! I dunno. Must be a king. He hasn''t got shit all over him. But you are dressed as one&hellip; We want a shrubbery!! The swallow may fly south with the sun, and the house martin or the plover may seek warmer climes in winter, yet these are not strangers to our land.</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Look, my liege! Oh! Come and see the violence inherent in the system! Help, help, I''m being repressed! Ni! Ni! Ni! Ni! Ah, now we see the violence inherent in the system!</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">The swallow may fly south with the sun, and the house martin or the plover may seek warmer climes in winter, yet these are not strangers to our land. What a strange person. Shh! Knights, I bid you welcome to your new home. Let us ride to Camelot! We want a shrubbery!!</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">We found them. Well, Mercia''s a temperate zone! &hellip;Are you suggesting that coconuts migrate? No, no, no! Yes, yes. A bit. But she''s got a wart. Oh! Come and see the violence inherent in the system! Help, help, I''m being repressed!</p>\r\n<p  0px; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">&hellip;Are you suggesting that coconuts migrate? You don''t frighten us, English pig-dogs! Go and boil your bottoms, sons of a silly person! I blow my nose at you, so-called Ah-thoor Keeng, you and all your silly English K-n-n-n-n-n-n-n-niggits! I don''t want to talk to you no more, you empty-headed animal food trough water! I fart in your general direction! Your mother was a hamster and your father smelt of elderberries! Now leave before I am forced to taunt you a second time! Did you dress her up like this? What a strange person.</p>\r\n</p>', 'shrubbery', '2013-01-28 16:26:51', NULL, 0, 0);
INSERT INTO `mensagens` VALUES (8, 68, '<p>&nbsp;</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 36px; vertical-align: baseline; line-height: 48px;">King Arthur</h1>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: 1.5em;">You don''t frighten us, English pig-dogs! Go and boil your bottoms, sons of a silly person! I blow my nose at you, so-called Ah-thoor Keeng, you and all your silly English K-n-n-n-n-n-n-n-niggits! Now, look here, my good man. Well, how''d you become king, then?</p>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 28px; vertical-align: baseline; line-height: 48px;">What a strange person</h2>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: 1.5em;">The Knights Who Say Ni demand a sacrifice! Oh! Come and see the violence inherent in the system! Help, help, I''m being repressed! But you are dressed as one&hellip; Burn her anyway! Knights of Ni, we are but simple travelers who seek the enchanter who lives beyond these woods.</p>\r\n<ul  0px 0px 1.5em; padding: 0px 0px 0px 2em; border: 0px; outline: 0px; vertical-align: baseline; list-style-position: initial; list-style-image: initial; line-height: 1.5em;">\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Well, we did do the nose.</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Oh! Come and see the violence inherent in the system! Help, help, I''m being repressed!</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">I''m not a witch.</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">And this isn''t my nose. This is a false one.</li>\r\n</ul>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 24px; vertical-align: baseline; line-height: 48px;">We want a shrubbery!!</h3>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: 1.5em;">I dunno. Must be a king. Bloody Peasant! Why do you think that she is a witch? Shut up! Will you shut up?! Bring her forward!</p>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 20px; vertical-align: baseline;">How do you know she is a witch?</h4>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: 1.5em;">We found them. We found them. The swallow may fly south with the sun, and the house martin or the plover may seek warmer climes in winter, yet these are not strangers to our land. The Lady of the Lake, her arm clad in the purest shimmering samite, held aloft Excalibur from the bosom of the water, signifying by divine providence that I, Arthur, was to carry Excalibur. That is why I am your king.</p>\r\n<ol  0px 0px 1.5em; padding: 0px 0px 0px 2em; border: 0px; outline: 0px; vertical-align: baseline; line-height: 1.5em;">\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">It''s only a model.</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Why do you think that she is a witch?</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">We shall say ''Ni'' again to you, if you do not appease us.</li>\r\n</ol>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 16px; vertical-align: baseline;">What&hellip; is your quest?</h5>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: 1.5em;">Ah, now we see the violence inherent in the system! On second thoughts, let''s not go there. It is a silly place. He hasn''t got shit all over him.</p>\r\n<h   0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline;">Am I right?</h6>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: 1.5em;">Well, we did do the nose. Burn her! I dunno. Must be a king.</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: 1.5em;">Oh! Come and see the violence inherent in the system! Help, help, I''m being repressed! Shut up! On second thoughts, let''s not go there. It is a silly place. Burn her! I don''t want to talk to you no more, you empty-headed animal food trough water! I fart in your general direction! Your mother was a hamster and your father smelt of elderberries! Now leave before I am forced to taunt you a second time!</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: 1.5em;">Why do you think that she is a witch? You don''t vote for kings. Why? What a strange person.</p>\r\n<p  0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: 1.5em;">Bloody Peasant! The nose? Oh! Come and see the violence inherent in the system! Help, help, I''m being repressed! &hellip;Are you suggesting that coconuts migrate? We found them.</p>\r\n</p>\r\n<p>&nbsp;</p>', 'shrubbery', '2013-01-28 16:28:17', NULL, 0, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `mensagens_usuarios`
-- 

CREATE TABLE `mensagens_usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `mensagem_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- Extraindo dados da tabela `mensagens_usuarios`
-- 

INSERT INTO `mensagens_usuarios` VALUES (1, 2, 68);
INSERT INTO `mensagens_usuarios` VALUES (2, 2, 69);
INSERT INTO `mensagens_usuarios` VALUES (3, 3, 69);
INSERT INTO `mensagens_usuarios` VALUES (4, 4, 69);
INSERT INTO `mensagens_usuarios` VALUES (5, 5, 69);
INSERT INTO `mensagens_usuarios` VALUES (6, 6, 68);
INSERT INTO `mensagens_usuarios` VALUES (7, 6, 69);
INSERT INTO `mensagens_usuarios` VALUES (8, 6, 70);
INSERT INTO `mensagens_usuarios` VALUES (9, 7, 68);
INSERT INTO `mensagens_usuarios` VALUES (10, 7, 69);
INSERT INTO `mensagens_usuarios` VALUES (11, 7, 70);
INSERT INTO `mensagens_usuarios` VALUES (12, 8, 68);
INSERT INTO `mensagens_usuarios` VALUES (13, 8, 69);
INSERT INTO `mensagens_usuarios` VALUES (14, 8, 70);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `periodos`
-- 

CREATE TABLE `periodos` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `periodo` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `obs` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `facility_id` (`facility_id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `periodos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `projetos`
-- 

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) default NULL,
  `responsavel` varchar(45) default NULL,
  `telefone1` varchar(45) default NULL,
  `telefone2` varchar(45) default NULL,
  `celular` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `departamento` varchar(45) default NULL,
  `instituicao` varchar(45) default NULL,
  `inst_fomento` varchar(45) default NULL,
  `numero_processo` varchar(45) default NULL,
  `tipo_responsavel` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `created_by` int(11) default NULL,
  `modified` varchar(45) default NULL,
  `arquivos` varchar(45) default NULL,
  `resumo` varchar(45) default NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_projetos_usuarios1` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `projetos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `projetos_usuarios`
-- 

CREATE TABLE `projetos_usuarios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `projeto_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `projeto_id` (`projeto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `projetos_usuarios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `relatorios`
-- 

CREATE TABLE `relatorios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `slug` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `relatorios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `respostas`
-- 

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `formulario_id` int(11) default NULL,
  `valores` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `formulario_id` (`formulario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `respostas`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `senha` varchar(45) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `nome` varchar(45) default NULL,
  `sobrenome` varchar(45) default NULL,
  `endereco` varchar(45) default NULL,
  `cidade` varchar(45) default NULL,
  `uf` varchar(45) default NULL,
  `instituicao` varchar(45) default NULL,
  `departamento` varchar(45) default NULL,
  `data_nascimento` varchar(45) default NULL,
  `key` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `credencial` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `celular` varchar(45) default NULL,
  `telefone` varchar(45) default NULL,
  `cpf` varchar(45) default NULL,
  `tipo` varchar(45) default NULL,
  `newsletter` varchar(45) default NULL,
  `cep` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

-- 
-- Extraindo dados da tabela `usuarios`
-- 

INSERT INTO `usuarios` VALUES (28, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2012-11-29 16:17:07 -0200', '2013-01-22 11:20:18 -0200', 'Thais', 'Dias', 'Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', '5C3E9956-43B4-43EC-C432-C6FB40D21A3F', '0', NULL, '1', 'thais.dias123@trajettoria.com', '(11) 9-5391-0081', '1124218095', '381.162.908-51', '3', '0', '07052000');
INSERT INTO `usuarios` VALUES (31, 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', '2012-11-29 16:27:32 -0200', '2013-01-22 11:20:18 -0200', 'superadmin', 'superadmin', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Departamento', '22/08/1989', '7C971362-EDDB-2D3D-65C4-D9C304B95996', '0', NULL, '10', 'thais.dia31s@trajettoria.com', '(11) 9-5391-0081', '1124218095', '12548962537', NULL, '1', '07052000');
INSERT INTO `usuarios` VALUES (36, 'thais6', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-03 11:47:37 -0200', '2012-12-05 16:50:15 -0200', 'thais6', 'teste123', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'departamentoteste2das', '22/08/1989', '2E8AC375-75A7-7179-CB48-887376B7EC4C', '1', NULL, '10', 'tha12321321is.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2514585269', '4', '0', '07052000');
INSERT INTO `usuarios` VALUES (37, 'thais7', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-03 14:59:00 -0200', '2012-12-20 10:41:14 -0200', 'Thais7', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', 'F30E0D90-0993-8ECF-FD38-EA68733C5DC4', '2', NULL, '1', 'thaiasdas.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '51428596352', '5', '1', '07052000');
INSERT INTO `usuarios` VALUES (38, 'Marjori', 'dfa47c34ebe821ef106dc26fefae309c', '2012-12-03 14:59:56 -0200', '2013-01-17 15:37:51 -0200', 'Marjori2', 'Tamise', 'Rua pacheco jordão, 239 - Casa 1', 'São Paulo', 'ac', 'USP', 'Imunologia', '10/03/1994', '6A9D26B6-B9D6-FC18-BA6B-847A3766E4F6', '1', NULL, '0', 'marjori@trajettoria.com', '(11)91234-5623', '(11) 2280-0848', '408160638-26', '2', '1', '03675-020');
INSERT INTO `usuarios` VALUES (39, 'thais8', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-03 15:41:45 -0200', '2012-12-06 14:48:30 -0200', 'thais8', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '09/11/1994', 'A127F466-3C62-A704-9508-84DB39D2222E', '0', NULL, '1', 'thaasdadadqweis.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '256352152488', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (40, 'thais10', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-04 15:58:15 -0200', '2012-12-05 16:50:15 -0200', 'Thais10', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '2C5C7C2F-F0AC-68FD-8023-4FDCD2C1FC10', '1', NULL, '0', 'th31dasd123ais.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25815932688', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (41, 'teste13', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-05 14:20:42 -0200', '2012-12-20 10:41:14 -0200', 'teste13', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', 'BACFC9C2-0B08-CD32-C539-362A0C8AC4CF', '2', NULL, '0', 'thaasd1231is.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25698365147', '1', '1', '07052000');
INSERT INTO `usuarios` VALUES (42, 'thais14', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-06 14:46:56 -0200', '2012-12-06 14:47:19 -0200', 'thais14', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', 'A9FAA1C7-7795-B98B-06BB-F48F457A21CE', '1', NULL, '10', 'tasdahais.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '15427845968', '5', '1', '07052000');
INSERT INTO `usuarios` VALUES (43, 'thais15', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-06 14:52:37 -0200', '2012-12-06 14:53:18 -0200', 'thais15', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'sc', 'USP', 'Imunologia', '22/08/1989', 'DEA0B40F-7C4B-0AF0-4D0F-1C0D31A48AC9', '1', NULL, '10', 'thasadqwis.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25145236585', '1', '1', '07052000');
INSERT INTO `usuarios` VALUES (44, 'thais116', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:46:37 -0200', '2012-12-20 10:41:14 -0200', 'thais16', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'pb', 'USP', 'Departamento', '22/08/1989', 'C75ADDAF-0B68-A1FF-41D3-26E985D2BF90', '2', NULL, '0', 'thais123131.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25184575899', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (45, 'thais17', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:48:03 -0200', '2012-12-20 10:40:50 -0200', 'thais16', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'pa', 'USP', 'Departamento', '22/08/1989', 'F1C2861E-BB57-F178-7733-51EC80B21190', '3', NULL, '0', 'thais.dasd123ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '85478596855', '0', '0', '07052000');
INSERT INTO `usuarios` VALUES (46, 'thais18', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:49:07 -0200', NULL, 'thais18', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', '334BD5BF-1694-D3D5-1C72-594CA906F6B5', '0', NULL, '0', 'thais.d2142141ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25418569585', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (47, 'thais181', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:50:17 -0200', NULL, 'thais181', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', 'BC0F7969-7A82-9BD1-C7BF-6F182BFF9DC2', '0', NULL, '0', 'thais.diaasdas123131@trajettoria.com', '(11) 9-5391-0081', '1124218095', '12413212421', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (48, 'Anderson', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 12:43:51 -0200', '2012-12-20 10:41:14 -0200', 'Anderson', 'teste', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '2FBA3DAF-E84A-83A8-FFDA-E83B711E7B36', '2', NULL, '0', 'anderson.martins@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2514526539', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (49, 'usuario', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 15:52:28 -0200', NULL, 'usuario', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '7C471F6B-A31A-C674-E7D6-FF69CBA1B134', '0', NULL, '0', 'thaasd131is.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25885225895', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (50, 'usuario1', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 15:56:46 -0200', NULL, 'usuario', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '01F20358-DB99-5F1C-7DBE-E7A172A9C441', '0', NULL, '0', 'thais.dia1111s@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25885225895123131', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (51, 'usuario11', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:01:10 -0200', NULL, 'usuario', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '2E43F0E8-F78C-A01F-4CD2-4E575043DC9A', '0', NULL, '0', 'thaiasdsadas.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25885225895123131123', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (52, 'usuario111', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:04:42 -0200', NULL, 'usuario', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '4A8F0012-C180-EAA4-0704-CD9CC3942A8B', '0', NULL, '0', 'thai123123131s.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '258852258951231311231', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (53, 'usuario1111', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:07:45 -0200', '2012-12-20 10:41:14 -0200', 'usuario', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '3936F6EB-95EB-DF0F-2407-F61A93E9E089', '2', NULL, '0', 'thais123sdfs.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2588522589512313112311', '2', '1', '07052000');
INSERT INTO `usuarios` VALUES (54, 'usuario2', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:15:00 -0200', NULL, 'usuario2', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '24075494-0791-CC34-DD49-DA6103037D57', '0', NULL, '0', 'thais.dia2321ass@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25415935785', '1', '1', '07052-200');
INSERT INTO `usuarios` VALUES (55, 'usuario22', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:17:46 -0200', NULL, 'usuario2', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'es', 'USP', 'Imunologia', '22/08/1989', '7A98756D-13C8-A6E5-7698-BD0555A2339E', '0', NULL, '0', 'thais.di1231asdas@trajettoria.com', '(11) 9-5391-0081', '1124218095', '254159357852', '1', '1', '07052-200');
INSERT INTO `usuarios` VALUES (56, 'usuario222', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:19:02 -0200', NULL, 'usuario2', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'pa', 'USP', 'Imunologia', '22/08/1989', '24083CBC-4D64-789D-B710-252337141E59', '0', NULL, '0', 'thais.di12321231as@trajettoria.com', '(11) 9-5391-0081', '1124218095', '254159357852323213', '1', '1', '07052-200');
INSERT INTO `usuarios` VALUES (57, 'usuario2321313', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:40:04 -0200', '2012-12-20 10:41:14 -0200', 'usuario2', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '629D5B1B-7ACB-DCB9-CE7A-19640E98B2C0', '2', NULL, '0', 'thais.d1312321321ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2541593578532131', '1', '1', '07052-200');
INSERT INTO `usuarios` VALUES (58, 'usuario23213132', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-18 16:48:49 -0200', NULL, 'usuario2', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'al', 'USP', 'Imunologia', '22/08/1989', '1C05BB76-85CE-7C33-DAA7-B7ED3E9E1A1C', '0', NULL, '0', 'thais.dia123321s@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25415935785321321', '1', '1', '07052-200');
INSERT INTO `usuarios` VALUES (59, 'chico', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-19 13:20:14 -0200', '2012-12-21 15:13:10 -0200', 'chico', 'teste', 'rua de teste', 'são paulo', 'ms', 'USP', 'Departamento', '12/12/2012', 'AC0E3931-1BA6-4842-24E2-333EA545A1E3', '1', NULL, '0', 'thais.dias@trajettoria.com', '859632514', '251452653', '25145215422', '3', '1', '08745958');
INSERT INTO `usuarios` VALUES (60, 'jose', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-19 16:23:09 -0200', NULL, 'José', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'rj', 'USP', 'Imunologia', '22/08/1989', '229ADA30-3AE7-2537-8DC7-2F10B73E9F3C', '0', NULL, '0', 'thaisas@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25148569853', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (61, 'jose1', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-19 16:25:28 -0200', '2012-12-20 10:52:54 -0200', 'José', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', 'BAE47886-C036-5B91-BD27-5289353E7B1F', '3', NULL, '0', 'thasd@trajettoria.com', '(11) 9-5391-0081', '1124218095', '251485698531', '1', '1', '07052000');
INSERT INTO `usuarios` VALUES (62, 'jose12', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-19 16:26:40 -0200', NULL, 'José', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'es', 'USP', 'Imunologia', '22/08/1989', 'B31BCC11-575D-1BC9-07E0-8F08DF2A1FC3', '0', NULL, '0', 'thais.dia32s@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2514856985311', '1', '0', '07052000');
INSERT INTO `usuarios` VALUES (63, 'jose122', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-19 16:27:54 -0200', '2012-12-19 16:35:37 -0200', 'José', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', 'pb', 'USP', 'Imunologia', '22/08/1989', '6A8481CD-958B-3CB2-D1FD-183431A7ED57', '1', NULL, '0', 'ths@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25148569853112', '1', '0', '07052000');
INSERT INTO `usuarios` VALUES (64, 'maria', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-20 10:32:04 -0200', NULL, 'Maria', 'Dias', 'Rua Catuipe, 93', 'São Paulo', 'se', 'USP', 'Imunologia', '22/08/1989', 'B06E338F-38B1-D1E2-DD8F-6D9C1EA55D95', '0', NULL, '0', 'thais.di2@trajettoria.com', '(11) 9-5391-0081', '1124218095', '36985214785', '5', '0', '07052200');
INSERT INTO `usuarios` VALUES (65, 'maria2', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-20 10:34:25 -0200', NULL, 'Maria2', 'Dias', 'Rua Catuipe, 93', 'São Paulo', 'ce', 'USP', 'Imunologia', '22/08/1989', 'E7C4A362-237B-DD43-5498-2DB7EEC71C5D', '0', NULL, '0', 'thais.dias2321@trajettoria.com', '(11) 9-5391-0081', '1124218095', '369852147851', '1', '0', '07052200');
INSERT INTO `usuarios` VALUES (66, 'maria22', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-20 10:35:25 -0200', '2012-12-20 10:37:01 -0200', 'Maria2', 'Dias', 'Rua Catuipe, 93', 'São Paulo', 'pr', 'USP', 'Imunologia', '22/08/1989', '4D410BBD-D366-34BC-4062-417F5E065866', '1', NULL, '0', 'thais.d12ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '3698521478512', '1', '0', '07052200');
INSERT INTO `usuarios` VALUES (67, 'maria222', '7b6a20130d66ecc497039412e1d1a0b0', '2012-12-20 10:36:45 -0200', '2012-12-20 14:36:22 -0200', 'Maria222', 'Dias', 'Rua Catuipe, 93', 'São Paulo', 'am', 'ABC', 'Imunologia', '22/08/1989', 'F1872C87-01CD-E724-60ED-FCB083E9362F', '1', NULL, '0', 'thais.d1232131ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '36985214785121', '1', '0', '07052200');
INSERT INTO `usuarios` VALUES (68, 'almeida', '37e5c47bbeaccd88523b94bd73aaf659', '2013-01-15 13:09:01 -0200', '2013-01-15 13:33:38 -0200', 'Abner', 'Almeida', 'Rua dos Mellos, 300', 'Jandira', 'sp', 'USJT', 'FTCE', '20/01/1992', '584EEE32-C64F-1EF7-ACB3-CD6F270BE423', '1', NULL, '10', 'almeida@apendcity.com', '11997433501', '1147072865', '40115475818', '2', '0', '06602-100');
INSERT INTO `usuarios` VALUES (69, 'almeida2', '37e5c47bbeaccd88523b94bd73aaf659', '2013-01-16 12:17:38 -0200', '2013-01-21 10:09:52 -0200', 'Abner2', 'Almeida', 'Rua dos Mellos 300', 'JANDIRA', 'sp', 'USJT', 'FTCE', '20/01/1992', '3BB7BC67-750B-41EA-426D-B33870E2EBD2', '1', NULL, '0', 'abneralmeida92@gmail.com', '11997433501', '1147072865', '12345678911', '2', '0', '06602-100');
INSERT INTO `usuarios` VALUES (70, 'almeida3', '37e5c47bbeaccd88523b94bd73aaf659', '2013-01-16 14:25:37 -0200', '2013-01-16 14:32:29 -0200', 'Abner3', 'Almeida', 'Rua dos Mellos 300', 'JANDIRA', 'sp', 'USJT', 'FTCE', '20/01/1992', '47A8B038-E073-4E65-8F3F-FA6D43597138', '1', NULL, '1', 'abneralmeida@saojudas.br', '11997433501', '1147072865', '98765432198', '2', '0', '06602-100');
