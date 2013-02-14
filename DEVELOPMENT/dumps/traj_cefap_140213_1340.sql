-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Fev 14, 2013 as 01:37 PM
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
  `id` int(11) NOT NULL auto_increment,
  `usuario_id` int(11) default NULL,
  `facility_id` int(11) default NULL,
  `projeto_id` int(11) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `aprovado_por_id` int(11) default NULL,
  `status` tinyint(4) default NULL,
  `obs` varchar(500) default NULL,
  `periodo_inicial` datetime default NULL,
  `periodo_final` datetime default NULL,
  `periodo_inicial_marcado` datetime NOT NULL,
  `periodo_final_marcado` datetime NOT NULL,
  `valor` double default NULL,
  `unidade` float default NULL,
  `valor_total` double default NULL,
  `status_pagto` tinyint(4) default NULL,
  `chave` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `facility_id` (`facility_id`),
  KEY `projeto_id` (`projeto_id`),
  KEY `aprovado_por_id` (`aprovado_por_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Extraindo dados da tabela `agendamentos`
-- 

INSERT INTO `agendamentos` VALUES (1, 70, 1, 5, '2013-02-06 10:51:01', '2013-02-07 15:20:31', 70, 1, NULL, '2013-02-07 10:51:10', '2013-02-07 15:51:13', '2013-02-08 11:00:00', '2013-02-08 18:00:59', 699, 0, 677, 0, '5PJgTKw1C45Rm3fLGnocIik81up2IcuS');
INSERT INTO `agendamentos` VALUES (3, NULL, NULL, NULL, '2013-02-07 12:18:13', '2013-02-14 09:51:03', 68, 1, NULL, '2013-02-09 10:30:00', '2013-02-09 16:30:59', '2013-02-09 10:30:00', '2013-02-09 16:30:59', NULL, NULL, 350, 0, 'SaEAkDtaJkCadtXwmNOJgv2KwjY2dssA');
INSERT INTO `agendamentos` VALUES (4, 68, 60, 9, '2013-02-07 13:32:01', NULL, NULL, 0, NULL, '2013-02-16 08:30:00', '2013-02-16 16:30:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 1, '');
INSERT INTO `agendamentos` VALUES (5, 70, 3, 9, '2013-02-14 09:44:55', '2013-02-14 09:58:06', 68, 2, NULL, '2013-02-15 09:00:00', '2013-02-15 19:00:59', '2013-02-15 09:00:00', '2013-02-15 19:00:59', NULL, NULL, 0, 0, 'xGlM1EuFt9k8I9rT76Xbv0qGdjYE7ZbM');
INSERT INTO `agendamentos` VALUES (6, 70, 2, 9, '2013-02-14 09:45:55', NULL, NULL, 0, NULL, '2013-02-18 08:30:00', '2013-02-18 18:30:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 1, 'OacKOmZVrscRaz2pXgfUgF2e4m6GQqH8');
INSERT INTO `agendamentos` VALUES (7, 69, 3, 8, '2013-02-14 09:57:41', '2013-02-14 12:34:17', 70, 1, NULL, '2013-02-15 11:00:00', '2013-02-15 16:30:59', '2013-02-18 09:30:00', '2013-02-18 15:30:59', NULL, NULL, 95, 0, 'a8IroaucKBaeGyYnbBEYIQpTeSWreMvt');

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
  `valor_creditos` double default NULL,
  `taxa` double default NULL,
  `valor_total` double default NULL,
  `status` int(11) default NULL,
  `usuario_id` int(11) default NULL,
  `obs` varchar(250) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=257 ;

-- 
-- Extraindo dados da tabela `boletos`
-- 

INSERT INTO `boletos` VALUES (1, '198491591', 'ASDSARWQASD', '2013-01-21 14:46:31', '2013-01-30', 239.949996948242, 1.5, 241.449996948242, 0, 69, 'Projeto super legal');
INSERT INTO `boletos` VALUES (2, '78178871574774445', '5ASKDUAHSI', '2013-01-01 16:25:51', '2013-01-19', 318.149993896484, 1.5, 319.649993896484, 0, 69, NULL);
INSERT INTO `boletos` VALUES (3, '984194165456', 'sadsadsa', '2013-01-22 10:00:51', '2013-01-24', 2278.94995117188, 1.5, 2280.44995117188, 1, 68, NULL);
INSERT INTO `boletos` VALUES (4, '5548948941191987894', NULL, '2013-01-28 11:51:26', '2013-01-31', 512, 1.5, 513.5, 0, 69, NULL);
INSERT INTO `boletos` VALUES (7, NULL, 'PCp9YF1eFEkbxjFuFRQ6D1fux0HCZxyY', '2013-01-31 14:42:29', '2013-02-10', 358.959991455078, 1.5, 360.459991455078, 2, 70, 'Projeto do barulho');
INSERT INTO `boletos` VALUES (6, NULL, '3TN33tY2UvcdRQpbAQ52kkcmODeffC7i', '2013-01-31 14:26:57', '2013-02-10', 150, 1.5, 151.5, 2, 70, NULL);
INSERT INTO `boletos` VALUES (8, NULL, '5PDvoCjH05pwyZhq5wMoepdT4TtTcERR', '2013-01-31 14:48:29', '2013-02-10', 358.980010986328, 1.5, 360.480010986328, 2, 70, 'Projeto do barulho 2');
INSERT INTO `boletos` VALUES (9, NULL, 'lDmBkwULVBeSlKjvjhBM334hgqc5bdXO', '2013-01-31 15:01:07', '2013-02-10', 12658.3203125, 1.5, 12659.8203125, 2, 70, 'Muito Dinheiro!');
INSERT INTO `boletos` VALUES (10, NULL, '0wPPUsL97xFPPBvvM1KebBmDKIOMHb4i', '2013-02-01 11:33:01', '2013-02-11', 150, 0, 150, 2, 69, '');
INSERT INTO `boletos` VALUES (11, NULL, 'wOp7fwRQNh46Trt0KQ575Pkz7fdUAqbg', '2013-02-01 14:36:44', '2013-02-11', 650, 0, 650, 0, 69, 'Projeto x');
INSERT INTO `boletos` VALUES (12, NULL, 'LmCea6pdBJVki67aYytPRVWTFA0tCmD9', '2013-02-01 14:40:51', '2013-02-11', 956, 1, 957, 0, 69, 'Taxa');
INSERT INTO `boletos` VALUES (13, NULL, 'unqx9GdIhIQNZI9KQnt3YVFEW533R4wb', '2013-02-01 14:45:02', '2013-02-11', 10000.919921875, 1, 10001.919921875, 0, 69, 'Dez mil reais e noventa e dois centavos');
INSERT INTO `boletos` VALUES (14, NULL, 'jBmxoTs4HF7gk9e5R36ZpAAXyt2snWhs', '2013-02-01 14:45:32', '2013-02-11', 9999.919921875, 1, 10000.919921875, 0, 69, 'Dez mil reais e noventa e dois centavos');
INSERT INTO `boletos` VALUES (15, NULL, 'vIGq0Z4juvMC2sGifB6Od7T8wKnKhHqB', '2013-02-01 14:46:10', '2013-02-11', 10002.9501953125, 0, 10002.95, 2, 69, 'Dez mil reais e noventa e dois centavos');
INSERT INTO `boletos` VALUES (256, NULL, 'ffffff', '2013-01-30 14:59:41', '2013-02-04', 10000, 2.95, 10002.95, 0, 70, 'Projeto XYZ');

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
  `id` int(11) NOT NULL auto_increment,
  `param` varchar(45) default NULL,
  `label` varchar(45) default NULL,
  `tipo_campo` varchar(45) default NULL,
  `opcoes` varchar(45) default NULL,
  `valor` text,
  `valor_padrao` text,
  `modified` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- 
-- Extraindo dados da tabela `configuracoes`
-- 

INSERT INTO `configuracoes` VALUES (20, 'creditos_banco', 'Créditos - banco de emissão dos boletos', 'select', 'Santander(033)', 'Santander(033)', 'Santander(033)', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (19, 'creditos_conta_dv', 'Créditos - dígito verificador da conta corren', 'text', NULL, '4', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (18, 'creditos_conta', 'Créditos - conta corrente do cedente', 'text', NULL, '13000379', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (16, 'creditos_agencia', 'Créditos - agência do cedente', 'text', NULL, '3831', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (17, 'creditos_agencia_dv', 'Créditos - dígito verificador da agência do c', 'text', NULL, '9', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (15, 'creditos_taxa_boleto', 'Créditos - taxa (R$) de cada boleto', 'text', NULL, '0', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (13, 'creditos_prazo', 'Créditos - dias para vencimentos dos boletos', 'text', NULL, '10', '5', '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (14, 'creditos_projeto_fusp', 'Créditos - número do projeto FUSP (5 dígitos)', 'text', NULL, '02561', NULL, '2012-12-19 15:34:35 -0200', NULL);
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
INSERT INTO `configuracoes` VALUES (21, 'creditos_cedente_nome', 'Créditos - nome ou razão social do cedente', 'text', NULL, 'CEFAP', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (22, 'creditos_cedente_cnpj', 'Créditos - CNPJ do cedente', 'text', NULL, '025.124.524/0001-25', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (23, 'creditos_cedente_endereco_linha1', 'Créditos - endereço do cedente (linha 1)', 'text', NULL, 'Rua teste, 02', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (24, 'creditos_cedente_endereco_linha2', 'Créditos - endereço do cedente (linha 2)', 'text', NULL, 'Rua teste, 03', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (25, 'creditos_texto_boleto', 'Créditos - texto das “Instruções” do boleto', 'textarea', NULL, '', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (26, 'rss_fonte1', 'RSS - endereço do primeiro quadro de feeds', 'text', NULL, 'www.teste.com.br', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (27, 'rss_fonte2', 'RSS - endereço do segundo quadro de feeds', 'text', NULL, 'www.teste.com.br', NULL, '2012-12-19 15:34:35 -0200', NULL);
INSERT INTO `configuracoes` VALUES (28, 'creditos_codigo_cedente', 'Código do Cedente', 'text', NULL, '3909220', NULL, NULL, NULL);
INSERT INTO `configuracoes` VALUES (29, 'creditos_demonstrativo1', 'Créditos -> Demonstrativo Linha 1', 'text', NULL, 'Créditos CEFAP-USP', NULL, NULL, NULL);

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
INSERT INTO `facilities` VALUES (3, 'FLUIR', 'Flow Cytometry and Imaging Research', 'Flow Cytometry and Imaging Research', '2013-01-21 10:11:22 -0200', '2013-02-14 12:33:11 -0200', '0', NULL, 'arquivos', '50', '10');
INSERT INTO `facilities` VALUES (12, 'Nome Completo23', 'Nome abreviado2', 'um dois três', '2013-01-03 12:47:17 -0200', '2013-01-18 14:34:24 -0200', '0', '1', NULL, NULL, NULL);
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

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
INSERT INTO `facilities_usuarios` VALUES (108, 70, 3);

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
  `lancamento_direto` tinyint(4) default NULL,
  `boleto_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `autor_id` (`autor_id`),
  KEY `cancelamento_autor_id` (`cancelamento_autor_id`),
  KEY `fk_lancamentos_boletos1` (`boleto_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- Extraindo dados da tabela `lancamentos`
-- 

INSERT INTO `lancamentos` VALUES (27, 70, 1, '7Iymg4qr04BeaHIr6qOiEcwvavVhtjBm', 677, 1, 70, 'Agendamento da Facility GENIAL', '2013-02-07 15:20:31', '2013-02-07 15:20:30', 0, 1, NULL, NULL, NULL, NULL, 1, 0);
INSERT INTO `lancamentos` VALUES (26, 70, 1, 'DesQ58G8y4O8bgGPvsEGFPwEe8GdjAWl', 677, 1, 70, 'Agendamento da Facility GENIAL', '2013-02-07 15:20:10', '2013-02-07 15:20:10', 0, 1, NULL, NULL, NULL, NULL, 1, 0);
INSERT INTO `lancamentos` VALUES (4, 68, 0, NULL, 2278.95, 0, NULL, NULL, '2013-01-23 14:00:30', '2013-02-01 12:23:23', 2, 0, NULL, 'Boleto Vencido', 68, '2013-02-01 12:23:23', NULL, 3);
INSERT INTO `lancamentos` VALUES (25, 70, 1, 'crgc65srGjsbyPBUOQJy27cBkPR1iH1i', 666, 1, 70, 'Agendamento da Facility GENIAL', '2013-02-07 15:01:57', '2013-02-07 15:18:30', 0, 1, NULL, NULL, NULL, NULL, 1, 0);
INSERT INTO `lancamentos` VALUES (8, 70, 0, 'PCp9YF1eFEkbxjFuFRQ6D1fux0HCZxyY', 358.96, 0, 70, NULL, '2013-01-31 14:42:29', '2013-02-01 12:09:29', 0, 0, NULL, NULL, NULL, NULL, NULL, 7);
INSERT INTO `lancamentos` VALUES (7, 70, 0, '3TN33tY2UvcdRQpbAQ52kkcmODeffC7i', 150, 0, 70, NULL, '2013-01-31 14:26:57', '2013-01-31 15:42:57', 0, 0, NULL, NULL, NULL, NULL, NULL, 6);
INSERT INTO `lancamentos` VALUES (9, 70, 0, '5PDvoCjH05pwyZhq5wMoepdT4TtTcERR', 358.98, 0, 70, NULL, '2013-01-31 14:48:29', '2013-02-01 12:09:29', 0, 0, NULL, NULL, NULL, NULL, NULL, 8);
INSERT INTO `lancamentos` VALUES (10, 70, 0, 'lDmBkwULVBeSlKjvjhBM334hgqc5bdXO', 12658.3, 0, 70, NULL, '2013-01-31 15:01:07', '2013-02-01 12:09:29', 0, 0, NULL, NULL, NULL, NULL, NULL, 9);
INSERT INTO `lancamentos` VALUES (11, 69, 0, '0wPPUsL97xFPPBvvM1KebBmDKIOMHb4i', 150, 0, 69, NULL, '2013-02-01 11:33:01', '2013-02-01 13:48:07', 0, 0, NULL, NULL, NULL, NULL, NULL, 10);
INSERT INTO `lancamentos` VALUES (12, 69, 0, 'XwF8MSRBzrotqt6HXFlMefWGRWfQVX6g', 152, 0, 68, 'direto', '2013-02-01 12:58:05', '2013-02-01 13:07:20', 2, 1, NULL, 'Lançamento teste', 68, '2013-02-01 13:07:20', NULL, 0);
INSERT INTO `lancamentos` VALUES (13, 70, 0, 'XwF8MSRBzrotqt6HXFlMefWGRWfQVX6g', 152, 0, 68, 'direto', '2013-02-01 12:58:05', '2013-02-01 12:58:05', 0, 1, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `lancamentos` VALUES (20, 69, 0, 'wOp7fwRQNh46Trt0KQ575Pkz7fdUAqbg', 650, 0, 69, NULL, '2013-02-01 14:36:44', '2013-02-01 14:36:44', 1, 0, NULL, NULL, NULL, NULL, 0, 11);
INSERT INTO `lancamentos` VALUES (19, 70, 0, 'NRlsyQpcb8jx1daIU2yqc5zUJjOSQbnx', 150, 1, 68, 'unworth', '2013-02-01 13:41:59', '2013-02-01 13:41:59', 0, 1, NULL, NULL, NULL, NULL, 1, 0);
INSERT INTO `lancamentos` VALUES (18, 69, 0, 'NRlsyQpcb8jx1daIU2yqc5zUJjOSQbnx', 150, 1, 68, 'unworth', '2013-02-01 13:41:59', '2013-02-01 13:41:59', 0, 1, NULL, NULL, NULL, NULL, 1, 0);
INSERT INTO `lancamentos` VALUES (21, 69, 0, 'LmCea6pdBJVki67aYytPRVWTFA0tCmD9', 956, 0, 69, NULL, '2013-02-01 14:40:51', '2013-02-01 14:40:51', 1, 0, NULL, NULL, NULL, NULL, 0, 12);
INSERT INTO `lancamentos` VALUES (22, 69, 0, 'unqx9GdIhIQNZI9KQnt3YVFEW533R4wb', 10000.9, 0, 69, NULL, '2013-02-01 14:45:02', '2013-02-01 14:45:02', 1, 0, NULL, NULL, NULL, NULL, 0, 13);
INSERT INTO `lancamentos` VALUES (23, 69, 0, 'jBmxoTs4HF7gk9e5R36ZpAAXyt2snWhs', 9999.92, 0, 69, NULL, '2013-02-01 14:45:32', '2013-02-01 14:45:32', 1, 0, NULL, NULL, NULL, NULL, 0, 14);
INSERT INTO `lancamentos` VALUES (24, 69, 0, 'vIGq0Z4juvMC2sGifB6Od7T8wKnKhHqB', 10000.9, 0, 69, NULL, '2013-02-01 14:46:10', '2013-02-05 13:53:45', 0, 0, NULL, NULL, NULL, NULL, 0, 15);
INSERT INTO `lancamentos` VALUES (28, NULL, 0, 'SaEAkDtaJkCadtXwmNOJgv2KwjY2dssA', 350, 1, 68, 'Agendamento da Facility Genome Investigation and Analysis Laboratory', '2013-02-14 09:48:42', '2013-02-14 09:51:02', 0, 1, NULL, NULL, NULL, NULL, 1, 0);
INSERT INTO `lancamentos` VALUES (29, 70, 3, 'xGlM1EuFt9k8I9rT76Xbv0qGdjYE7ZbM', 0, 1, 68, 'Agendamento da Facility FLUIR', '2013-02-14 09:58:06', '2013-02-14 09:58:05', 0, 1, NULL, NULL, NULL, NULL, 1, 0);
INSERT INTO `lancamentos` VALUES (30, 69, 3, 'a8IroaucKBaeGyYnbBEYIQpTeSWreMvt', 95, 1, 70, 'Agendamento da Facility FLUIR', '2013-02-14 12:34:17', '2013-02-14 12:34:17', 0, 1, NULL, NULL, NULL, NULL, 1, 0);

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
  `to_id` int(11) NOT NULL,
  `keygen` varchar(45) NOT NULL,
  `conteudo` text,
  `assunto` varchar(250) default NULL,
  `data_envio` datetime default NULL,
  `data_ultima_leitura` datetime default NULL,
  `cont_leituras` int(11) default NULL,
  `status` tinyint(4) default NULL,
  PRIMARY KEY  (`id`),
  KEY `from_id` (`from_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- 
-- Extraindo dados da tabela `mensagens`
-- 

INSERT INTO `mensagens` VALUES (32, 69, 68, 'whX9oauO2PFVzwkuAWPWai0hUldWUghV', '<p>tete<br /><br /></p>\r\n<hr />\r\n<p><strong>De:</strong> Abner<br /> <strong>Para:</strong> Abner2, Abner<br /> <strong>Assunto:</strong> Ahoy!<br /> <strong>Enviado em:</strong> 30/01/2013 15:21<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<p>Large bet on myself in round one. I care. So, what do you think of her, Han? Your eyes can deceive you. Don''t trust them. I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Kid, I''ve flown from one side of this galaxy to the other. I''ve seen a lot of strange stuff, but I''ve never seen anything to make me believe there''s one all-powerful Force controlling everything. There''s no mystical energy field that controls my destiny. It''s all a lot of simple tricks and nonsense.</p>\r\n<p>You are a part of the Rebel Alliance and a traitor! Take her away! Tell her you just want to talk. It has nothing to do with mating. It''s toe-tappingly tragic! No! Don''t jump!</p>\r\n<ul>\r\n<li>But with the blast shield down, I can''t even see! How am I supposed to fight?</li>\r\n<li>No! Don''t jump!</li>\r\n<li>Alright, let''s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>\r\n<p>I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Don''t act so surprised, Your Highness. You weren''t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. I don''t know what you''re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- Enough about your promiscuous mother, Hermes! We have bigger problems. No! Alderaan is peaceful. We have no weapons. You can''t possibly&hellip; You are a part of the Rebel Alliance and a traitor! Take her away!</p>\r\n<p>You don''t believe in the Force, do you? Don''t underestimate the Force. Kids have names?</p>\r\n<ol>\r\n<li>Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you''re going.</li>\r\n<li>Don''t be too proud of this technological terror you''ve constructed. The ability to destroy a planet is insignificant next to the power of the Force.</li>\r\n<li>Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head."</li>\r\n<li>Large bet on myself in round one.</li>\r\n</ol>\r\n<p>He is here. You''re all clear, kid. Let''s blow this thing and go home! With a warning label this big, you know they gotta be fun! Partially, but it also obeys your commands.</p>\r\n<p>No! The cat shelter''s on to me. Spare me your space age technobabble, Attila the Hun! You don''t know how to do any of those.</p>\r\n<p>&nbsp;</p>', 'RE: Ahoy!', '2013-01-30 15:54:59', '2013-02-14 13:33:33', 12, 1);
INSERT INTO `mensagens` VALUES (36, 68, 69, 'EflSYytqa9rAyymz1GO6R2ToXzcaCLPE', '<p>forward test<br /><br /></p>\r\n<hr />\r\n<p><strong>De:</strong> Abner<br /> <strong>Para:</strong> Abner2, Abner<br /> <strong>Assunto:</strong> Ahoy!<br /> <strong>Enviado em:</strong> 30/01/2013 15:21<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<p>Large bet on myself in round one. I care. So, what do you think of her, Han? Your eyes can deceive you. Don''t trust them. I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Kid, I''ve flown from one side of this galaxy to the other. I''ve seen a lot of strange stuff, but I''ve never seen anything to make me believe there''s one all-powerful Force controlling everything. There''s no mystical energy field that controls my destiny. It''s all a lot of simple tricks and nonsense.</p>\r\n<p>You are a part of the Rebel Alliance and a traitor! Take her away! Tell her you just want to talk. It has nothing to do with mating. It''s toe-tappingly tragic! No! Don''t jump!</p>\r\n<ul>\r\n<li>But with the blast shield down, I can''t even see! How am I supposed to fight?</li>\r\n<li>No! Don''t jump!</li>\r\n<li>Alright, let''s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>\r\n<p>I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Don''t act so surprised, Your Highness. You weren''t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. I don''t know what you''re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- Enough about your promiscuous mother, Hermes! We have bigger problems. No! Alderaan is peaceful. We have no weapons. You can''t possibly&hellip; You are a part of the Rebel Alliance and a traitor! Take her away!</p>\r\n<p>You don''t believe in the Force, do you? Don''t underestimate the Force. Kids have names?</p>\r\n<ol>\r\n<li>Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you''re going.</li>\r\n<li>Don''t be too proud of this technological terror you''ve constructed. The ability to destroy a planet is insignificant next to the power of the Force.</li>\r\n<li>Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head."</li>\r\n<li>Large bet on myself in round one.</li>\r\n</ol>\r\n<p>He is here. You''re all clear, kid. Let''s blow this thing and go home! With a warning label this big, you know they gotta be fun! Partially, but it also obeys your commands.</p>\r\n<p>No! The cat shelter''s on to me. Spare me your space age technobabble, Attila the Hun! You don''t know how to do any of those.</p>\r\n<p>&nbsp;</p>', 'FW: Ahoy!', '2013-01-30 16:11:35', '2013-02-14 12:13:24', 2, 1);
INSERT INTO `mensagens` VALUES (34, 68, 68, 'CzPTEtLPXGQJEoVzjlkN3KUprj1SBgu8', '<p>Very funy, don''t''ya think?<br /><br /></p>\r\n<hr />\r\n<p><strong>De:</strong> Abner2<br /> <strong>Para:</strong> Abner, Abner<br /> <strong>Assunto:</strong> RE: Ahoy!<br /> <strong>Enviado em:</strong> 30/01/2013 15:54<br /><br /></p>\r\n<p>tete<br /><br /></p>\r\n<hr />\r\n<p><strong>De:</strong> Abner<br /> <strong>Para:</strong> Abner2, Abner<br /> <strong>Assunto:</strong> Ahoy!<br /> <strong>Enviado em:</strong> 30/01/2013 15:21<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<p>Large bet on myself in round one. I care. So, what do you think of her, Han? Your eyes can deceive you. Don''t trust them. I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Kid, I''ve flown from one side of this galaxy to the other. I''ve seen a lot of strange stuff, but I''ve never seen anything to make me believe there''s one all-powerful Force controlling everything. There''s no mystical energy field that controls my destiny. It''s all a lot of simple tricks and nonsense.</p>\r\n<p>You are a part of the Rebel Alliance and a traitor! Take her away! Tell her you just want to talk. It has nothing to do with mating. It''s toe-tappingly tragic! No! Don''t jump!</p>\r\n<ul>\r\n<li>But with the blast shield down, I can''t even see! How am I supposed to fight?</li>\r\n<li>No! Don''t jump!</li>\r\n<li>Alright, let''s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>\r\n<p>I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Don''t act so surprised, Your Highness. You weren''t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. I don''t know what you''re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- Enough about your promiscuous mother, Hermes! We have bigger problems. No! Alderaan is peaceful. We have no weapons. You can''t possibly&hellip; You are a part of the Rebel Alliance and a traitor! Take her away!</p>\r\n<p>You don''t believe in the Force, do you? Don''t underestimate the Force. Kids have names?</p>\r\n<ol>\r\n<li>Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you''re going.</li>\r\n<li>Don''t be too proud of this technological terror you''ve constructed. The ability to destroy a planet is insignificant next to the power of the Force.</li>\r\n<li>Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head."</li>\r\n<li>Large bet on myself in round one.</li>\r\n</ol>\r\n<p>He is here. You''re all clear, kid. Let''s blow this thing and go home! With a warning label this big, you know they gotta be fun! Partially, but it also obeys your commands.</p>\r\n<p>No! The cat shelter''s on to me. Spare me your space age technobabble, Attila the Hun! You don''t know how to do any of those.</p>\r\n<p>&nbsp;</p>', 'RE: RE: Ahoy!', '2013-01-30 16:08:54', '2013-01-31 10:58:46', 2, 1);
INSERT INTO `mensagens` VALUES (30, 69, 68, 'WNI5ItpECJd4Y0czChZSV2EbIdMdliud', '<p>Lebre sem patas<br /><br /></p>\r\n<hr />\r\n<p><strong>De:</strong> Abner<br /> <strong>Para:</strong> Abner2, Abner<br /> <strong>Assunto:</strong> Ahoy!<br /> <strong>Enviado em:</strong> 30/01/2013 15:21<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<p>Large bet on myself in round one. I care. So, what do you think of her, Han? Your eyes can deceive you. Don''t trust them. I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Kid, I''ve flown from one side of this galaxy to the other. I''ve seen a lot of strange stuff, but I''ve never seen anything to make me believe there''s one all-powerful Force controlling everything. There''s no mystical energy field that controls my destiny. It''s all a lot of simple tricks and nonsense.</p>\r\n<p>You are a part of the Rebel Alliance and a traitor! Take her away! Tell her you just want to talk. It has nothing to do with mating. It''s toe-tappingly tragic! No! Don''t jump!</p>\r\n<ul>\r\n<li>But with the blast shield down, I can''t even see! How am I supposed to fight?</li>\r\n<li>No! Don''t jump!</li>\r\n<li>Alright, let''s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>\r\n<p>I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Don''t act so surprised, Your Highness. You weren''t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. I don''t know what you''re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- Enough about your promiscuous mother, Hermes! We have bigger problems. No! Alderaan is peaceful. We have no weapons. You can''t possibly&hellip; You are a part of the Rebel Alliance and a traitor! Take her away!</p>\r\n<p>You don''t believe in the Force, do you? Don''t underestimate the Force. Kids have names?</p>\r\n<ol>\r\n<li>Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you''re going.</li>\r\n<li>Don''t be too proud of this technological terror you''ve constructed. The ability to destroy a planet is insignificant next to the power of the Force.</li>\r\n<li>Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head."</li>\r\n<li>Large bet on myself in round one.</li>\r\n</ol>\r\n<p>He is here. You''re all clear, kid. Let''s blow this thing and go home! With a warning label this big, you know they gotta be fun! Partially, but it also obeys your commands.</p>\r\n<p>No! The cat shelter''s on to me. Spare me your space age technobabble, Attila the Hun! You don''t know how to do any of those.</p>\r\n<p>&nbsp;</p>', 'RE: Ahoy!', '2013-01-30 15:53:16', '2013-01-30 16:14:41', 3, 1);
INSERT INTO `mensagens` VALUES (31, 69, 68, 'whX9oauO2PFVzwkuAWPWai0hUldWUghV', '<p>tete<br /><br /></p>\r\n<hr />\r\n<p><strong>De:</strong> Abner<br /> <strong>Para:</strong> Abner2, Abner<br /> <strong>Assunto:</strong> Ahoy!<br /> <strong>Enviado em:</strong> 30/01/2013 15:21<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<p>Large bet on myself in round one. I care. So, what do you think of her, Han? Your eyes can deceive you. Don''t trust them. I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Kid, I''ve flown from one side of this galaxy to the other. I''ve seen a lot of strange stuff, but I''ve never seen anything to make me believe there''s one all-powerful Force controlling everything. There''s no mystical energy field that controls my destiny. It''s all a lot of simple tricks and nonsense.</p>\r\n<p>You are a part of the Rebel Alliance and a traitor! Take her away! Tell her you just want to talk. It has nothing to do with mating. It''s toe-tappingly tragic! No! Don''t jump!</p>\r\n<ul>\r\n<li>But with the blast shield down, I can''t even see! How am I supposed to fight?</li>\r\n<li>No! Don''t jump!</li>\r\n<li>Alright, let''s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>\r\n<p>I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Don''t act so surprised, Your Highness. You weren''t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. I don''t know what you''re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- Enough about your promiscuous mother, Hermes! We have bigger problems. No! Alderaan is peaceful. We have no weapons. You can''t possibly&hellip; You are a part of the Rebel Alliance and a traitor! Take her away!</p>\r\n<p>You don''t believe in the Force, do you? Don''t underestimate the Force. Kids have names?</p>\r\n<ol>\r\n<li>Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you''re going.</li>\r\n<li>Don''t be too proud of this technological terror you''ve constructed. The ability to destroy a planet is insignificant next to the power of the Force.</li>\r\n<li>Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head."</li>\r\n<li>Large bet on myself in round one.</li>\r\n</ol>\r\n<p>He is here. You''re all clear, kid. Let''s blow this thing and go home! With a warning label this big, you know they gotta be fun! Partially, but it also obeys your commands.</p>\r\n<p>No! The cat shelter''s on to me. Spare me your space age technobabble, Attila the Hun! You don''t know how to do any of those.</p>\r\n<p>&nbsp;</p>', 'RE: Ahoy!', '2013-01-30 15:54:59', NULL, 0, 0);
INSERT INTO `mensagens` VALUES (25, 68, 69, 'BcsaQhJKrbmrKlqsBLxvmTMQRIK9qHwE', '<p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Large bet on myself in round one. I care. So, what do you think of her, Han? Your eyes can deceive you. Don''t trust them. I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Kid, I''ve flown from one side of this galaxy to the other. I''ve seen a lot of strange stuff, but I''ve never seen anything to make me believe there''s one all-powerful Force controlling everything. There''s no mystical energy field that controls my destiny. It''s all a lot of simple tricks and nonsense.</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">You are a part of the Rebel Alliance and a traitor! Take her away! Tell her you just want to talk. It has nothing to do with mating. It''s toe-tappingly tragic! No! Don''t jump!</p>\r\n<ul  0px 0px 1.5em; padding: 0px 0px 0px 2em; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; list-style-position: initial; list-style-image: initial; line-height: 1.5em; color: #333333;">\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">But with the blast shield down, I can''t even see! How am I supposed to fight?</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">No! Don''t jump!</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Alright, let''s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Don''t act so surprised, Your Highness. You weren''t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. I don''t know what you''re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- Enough about your promiscuous mother, Hermes! We have bigger problems. No! Alderaan is peaceful. We have no weapons. You can''t possibly&hellip; You are a part of the Rebel Alliance and a traitor! Take her away!</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">You don''t believe in the Force, do you? Don''t underestimate the Force. Kids have names?</p>\r\n<ol  0px 0px 1.5em; padding: 0px 0px 0px 2em; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you''re going.</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Don''t be too proud of this technological terror you''ve constructed. The ability to destroy a planet is insignificant next to the power of the Force.</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head."</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Large bet on myself in round one.</li>\r\n</ol>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">He is here. You''re all clear, kid. Let''s blow this thing and go home! With a warning label this big, you know they gotta be fun! Partially, but it also obeys your commands.</p>\r\n<p  0px; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">No! The cat shelter''s on to me. Spare me your space age technobabble, Attila the Hun! You don''t know how to do any of those.</p>\r\n</p>', 'Ahoy!', '2013-01-30 15:21:30', '2013-01-30 15:54:46', 2, 1);
INSERT INTO `mensagens` VALUES (24, 68, 68, 'BcsaQhJKrbmrKlqsBLxvmTMQRIK9qHwE', '<p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">Large bet on myself in round one. I care. So, what do you think of her, Han? Your eyes can deceive you. Don''t trust them. I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Kid, I''ve flown from one side of this galaxy to the other. I''ve seen a lot of strange stuff, but I''ve never seen anything to make me believe there''s one all-powerful Force controlling everything. There''s no mystical energy field that controls my destiny. It''s all a lot of simple tricks and nonsense.</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">You are a part of the Rebel Alliance and a traitor! Take her away! Tell her you just want to talk. It has nothing to do with mating. It''s toe-tappingly tragic! No! Don''t jump!</p>\r\n<ul  0px 0px 1.5em; padding: 0px 0px 0px 2em; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; list-style-position: initial; list-style-image: initial; line-height: 1.5em; color: #333333;">\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">But with the blast shield down, I can''t even see! How am I supposed to fight?</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">No! Don''t jump!</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Alright, let''s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Don''t act so surprised, Your Highness. You weren''t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. I don''t know what you''re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- Enough about your promiscuous mother, Hermes! We have bigger problems. No! Alderaan is peaceful. We have no weapons. You can''t possibly&hellip; You are a part of the Rebel Alliance and a traitor! Take her away!</p>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">You don''t believe in the Force, do you? Don''t underestimate the Force. Kids have names?</p>\r\n<ol  0px 0px 1.5em; padding: 0px 0px 0px 2em; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you''re going.</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Don''t be too proud of this technological terror you''ve constructed. The ability to destroy a planet is insignificant next to the power of the Force.</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head."</li>\r\n<li  0px; padding: 0px; border: 0px; outline: 0px; font-style: inherit; font-size: 1em; font-family: inherit; vertical-align: baseline; line-height: 1.5em;">Large bet on myself in round one.</li>\r\n</ol>\r\n<p  0px 0px 1.5em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">He is here. You''re all clear, kid. Let''s blow this thing and go home! With a warning label this big, you know they gotta be fun! Partially, but it also obeys your commands.</p>\r\n<p  0px; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: ''PT Serif'', Georgia, serif; vertical-align: baseline; line-height: 1.5em; color: #333333;">No! The cat shelter''s on to me. Spare me your space age technobabble, Attila the Hun! You don''t know how to do any of those.</p>\r\n</p>', 'Ahoy!', '2013-01-30 15:21:30', '2013-01-31 10:54:19', 15, 0);
INSERT INTO `mensagens` VALUES (35, 68, 69, 'CzPTEtLPXGQJEoVzjlkN3KUprj1SBgu8', '<p>Very funy, don''t''ya think?<br /><br /></p>\r\n<hr />\r\n<p><strong>De:</strong> Abner2<br /> <strong>Para:</strong> Abner, Abner<br /> <strong>Assunto:</strong> RE: Ahoy!<br /> <strong>Enviado em:</strong> 30/01/2013 15:54<br /><br /></p>\r\n<p>tete<br /><br /></p>\r\n<hr />\r\n<p><strong>De:</strong> Abner<br /> <strong>Para:</strong> Abner2, Abner<br /> <strong>Assunto:</strong> Ahoy!<br /> <strong>Enviado em:</strong> 30/01/2013 15:21<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<p>Large bet on myself in round one. I care. So, what do you think of her, Han? Your eyes can deceive you. Don''t trust them. I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Kid, I''ve flown from one side of this galaxy to the other. I''ve seen a lot of strange stuff, but I''ve never seen anything to make me believe there''s one all-powerful Force controlling everything. There''s no mystical energy field that controls my destiny. It''s all a lot of simple tricks and nonsense.</p>\r\n<p>You are a part of the Rebel Alliance and a traitor! Take her away! Tell her you just want to talk. It has nothing to do with mating. It''s toe-tappingly tragic! No! Don''t jump!</p>\r\n<ul>\r\n<li>But with the blast shield down, I can''t even see! How am I supposed to fight?</li>\r\n<li>No! Don''t jump!</li>\r\n<li>Alright, let''s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>\r\n<p>I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Don''t act so surprised, Your Highness. You weren''t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. I don''t know what you''re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- Enough about your promiscuous mother, Hermes! We have bigger problems. No! Alderaan is peaceful. We have no weapons. You can''t possibly&hellip; You are a part of the Rebel Alliance and a traitor! Take her away!</p>\r\n<p>You don''t believe in the Force, do you? Don''t underestimate the Force. Kids have names?</p>\r\n<ol>\r\n<li>Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you''re going.</li>\r\n<li>Don''t be too proud of this technological terror you''ve constructed. The ability to destroy a planet is insignificant next to the power of the Force.</li>\r\n<li>Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head."</li>\r\n<li>Large bet on myself in round one.</li>\r\n</ol>\r\n<p>He is here. You''re all clear, kid. Let''s blow this thing and go home! With a warning label this big, you know they gotta be fun! Partially, but it also obeys your commands.</p>\r\n<p>No! The cat shelter''s on to me. Spare me your space age technobabble, Attila the Hun! You don''t know how to do any of those.</p>\r\n<p>&nbsp;</p>', 'RE: RE: Ahoy!', '2013-01-30 16:08:54', NULL, 0, 0);
INSERT INTO `mensagens` VALUES (37, 68, 69, 'JrbXJYQ7lz7DUG5Jijk8OTX2kqyaaleK', '<p>nh&eacute;<br /><br /></p>\r\n<hr />\r\n<p><strong>De:</strong> Abner<br /> <strong>Para:</strong> Abner2, Abner<br /> <strong>Assunto:</strong> Ahoy!<br /> <strong>Enviado em:</strong> 30/01/2013 15:21<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<p>Large bet on myself in round one. I care. So, what do you think of her, Han? Your eyes can deceive you. Don''t trust them. I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Kid, I''ve flown from one side of this galaxy to the other. I''ve seen a lot of strange stuff, but I''ve never seen anything to make me believe there''s one all-powerful Force controlling everything. There''s no mystical energy field that controls my destiny. It''s all a lot of simple tricks and nonsense.</p>\r\n<p>You are a part of the Rebel Alliance and a traitor! Take her away! Tell her you just want to talk. It has nothing to do with mating. It''s toe-tappingly tragic! No! Don''t jump!</p>\r\n<ul>\r\n<li>But with the blast shield down, I can''t even see! How am I supposed to fight?</li>\r\n<li>No! Don''t jump!</li>\r\n<li>Alright, let''s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>\r\n<p>I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Don''t act so surprised, Your Highness. You weren''t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. I don''t know what you''re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- Enough about your promiscuous mother, Hermes! We have bigger problems. No! Alderaan is peaceful. We have no weapons. You can''t possibly&hellip; You are a part of the Rebel Alliance and a traitor! Take her away!</p>\r\n<p>You don''t believe in the Force, do you? Don''t underestimate the Force. Kids have names?</p>\r\n<ol>\r\n<li>Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you''re going.</li>\r\n<li>Don''t be too proud of this technological terror you''ve constructed. The ability to destroy a planet is insignificant next to the power of the Force.</li>\r\n<li>Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head."</li>\r\n<li>Large bet on myself in round one.</li>\r\n</ol>\r\n<p>He is here. You''re all clear, kid. Let''s blow this thing and go home! With a warning label this big, you know they gotta be fun! Partially, but it also obeys your commands.</p>\r\n<p>No! The cat shelter''s on to me. Spare me your space age technobabble, Attila the Hun! You don''t know how to do any of those.</p>\r\n<p>&nbsp;</p>', 'RE: Ahoy!', '2013-01-30 16:16:38', '2013-02-14 12:13:28', 2, 1);
INSERT INTO `mensagens` VALUES (38, 68, 68, 'JrbXJYQ7lz7DUG5Jijk8OTX2kqyaaleK', '<p>nh&eacute;<br /><br /></p>\r\n<hr />\r\n<p><strong>De:</strong> Abner<br /> <strong>Para:</strong> Abner2, Abner<br /> <strong>Assunto:</strong> Ahoy!<br /> <strong>Enviado em:</strong> 30/01/2013 15:21<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<p>Large bet on myself in round one. I care. So, what do you think of her, Han? Your eyes can deceive you. Don''t trust them. I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Kid, I''ve flown from one side of this galaxy to the other. I''ve seen a lot of strange stuff, but I''ve never seen anything to make me believe there''s one all-powerful Force controlling everything. There''s no mystical energy field that controls my destiny. It''s all a lot of simple tricks and nonsense.</p>\r\n<p>You are a part of the Rebel Alliance and a traitor! Take her away! Tell her you just want to talk. It has nothing to do with mating. It''s toe-tappingly tragic! No! Don''t jump!</p>\r\n<ul>\r\n<li>But with the blast shield down, I can''t even see! How am I supposed to fight?</li>\r\n<li>No! Don''t jump!</li>\r\n<li>Alright, let''s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>\r\n<p>I can''t get involved! I''ve got work to do! It''s not that I like the Empire, I hate it, but there''s nothing I can do about it right now. It''s such a long way from here. Don''t act so surprised, Your Highness. You weren''t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. I don''t know what you''re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- Enough about your promiscuous mother, Hermes! We have bigger problems. No! Alderaan is peaceful. We have no weapons. You can''t possibly&hellip; You are a part of the Rebel Alliance and a traitor! Take her away!</p>\r\n<p>You don''t believe in the Force, do you? Don''t underestimate the Force. Kids have names?</p>\r\n<ol>\r\n<li>Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you''re going.</li>\r\n<li>Don''t be too proud of this technological terror you''ve constructed. The ability to destroy a planet is insignificant next to the power of the Force.</li>\r\n<li>Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head."</li>\r\n<li>Large bet on myself in round one.</li>\r\n</ol>\r\n<p>He is here. You''re all clear, kid. Let''s blow this thing and go home! With a warning label this big, you know they gotta be fun! Partially, but it also obeys your commands.</p>\r\n<p>No! The cat shelter''s on to me. Spare me your space age technobabble, Attila the Hun! You don''t know how to do any of those.</p>\r\n<p>&nbsp;</p>', 'RE: Ahoy!', '2013-01-30 16:16:38', NULL, 0, 0);
INSERT INTO `mensagens` VALUES (39, NULL, 0, '', NULL, NULL, NULL, '2013-01-31 10:50:35', NULL, 0);

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
  `id` int(11) NOT NULL auto_increment,
  `titulo` varchar(500) default NULL,
  `responsavel` varchar(240) default NULL,
  `telefone1` varchar(45) default NULL,
  `telefone2` varchar(45) default NULL,
  `celular` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `departamento` varchar(250) default NULL,
  `instituicao` varchar(250) default NULL,
  `inst_fomento` varchar(400) default NULL,
  `numero_processo` varchar(45) default NULL,
  `tipo_responsavel` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `created_by` int(11) default NULL,
  `modified` datetime default NULL,
  `arquivos` varchar(45) default NULL,
  `resumo` text,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_projetos_usuarios1` (`created_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Extraindo dados da tabela `projetos`
-- 

INSERT INTO `projetos` VALUES (4, 'TESTE', 'E', 'E', 'E', NULL, 'E@TET.COM', 'E', 'E', 'Fapesp', NULL, NULL, NULL, 69, '2013-02-05 11:14:15', '5202613d9bb2b3c8d0fd171cbc9ca09f.pdf', '<p>TESTE<span> </span></p>', 1);
INSERT INTO `projetos` VALUES (5, 'Projeto Muito Legal', 'Nome', 'telefone 1', 'telefone 2', NULL, 'email', 'departamento', 'instituição', 'Fapesp;CNPq;CAPES', NULL, NULL, NULL, 69, '2013-02-05 11:14:13', 'b392477b9befaa3c83b657ea97c6f9f5.pdf', '<p>Isso &eacute; um resumo <strong>MUITO </strong><em>legal</em></p>', 0);
INSERT INTO `projetos` VALUES (10, 'My Little Project', 'My little project responsible', '0123921039210', '10239021392103', NULL, 'My little project mail', 'My little project department', 'My little project institution', 'Fapesp;CNPq', NULL, NULL, NULL, 69, NULL, '143cfaaf5a3da75bbb2f99e416a1a453.pdf', '<p>My little project is nice</p>\r\n<p>My little&nbsp;project&nbsp;is soft as a white kitten</p>\r\n<p>My little&nbsp;project&nbsp;is so awesome that nutella seems tasteless near it</p>\r\n<p>My little&nbsp;project&nbsp;make yours less funny</p>\r\n<p>My little&nbsp;project&nbsp;can dance better than yours</p>', 1);
INSERT INTO `projetos` VALUES (8, 'outro projeto legal', 'nome', 'telefone 1', 'telefone 2', NULL, 'email', 'departamento', 'instituição', 'Fapesp;CNPq;FINEP', NULL, NULL, NULL, 69, '2013-02-04 15:19:11', 'dd9fb250ad82ec7f74f913115d2c3eee.pdf', '<p>Nh&eacute;</p>', 1);
INSERT INTO `projetos` VALUES (9, 'Projeto do Almeida3', 'Almeida3', 'telefone 1', 'telefone 2', NULL, 'email', 'departamento', 'instituição', 'CNPq', NULL, NULL, NULL, 70, NULL, '876cec61fa8ea709410bec24757cb344.pdf', '<p>projeto do Almeida3</p>', 1);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `projetos_usuarios`
-- 

CREATE TABLE `projetos_usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `usuario_id` int(11) default NULL,
  `projeto_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `projeto_id` (`projeto_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Extraindo dados da tabela `projetos_usuarios`
-- 

INSERT INTO `projetos_usuarios` VALUES (7, 69, 7);
INSERT INTO `projetos_usuarios` VALUES (6, 69, 6);
INSERT INTO `projetos_usuarios` VALUES (5, 69, 5);
INSERT INTO `projetos_usuarios` VALUES (4, 69, 4);
INSERT INTO `projetos_usuarios` VALUES (8, 69, 8);
INSERT INTO `projetos_usuarios` VALUES (9, 70, 9);
INSERT INTO `projetos_usuarios` VALUES (10, 68, 8);
INSERT INTO `projetos_usuarios` VALUES (11, 69, 10);

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
