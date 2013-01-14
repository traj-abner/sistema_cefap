-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: 184.168.119.197:8443
-- Tempo de Geração: Nov 26, 2012 as 10:58 AM
-- Versão do Servidor: 5.0.51
-- Versão do PHP: 5.3.10

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
  `id` int(11) NOT NULL,
  `nosso_numero` varchar(45) default NULL,
  `chave` varchar(45) default NULL,
  `data_emissao` varchar(45) default NULL,
  `data_vencimento` varchar(45) default NULL,
  `valor_creditos` varchar(45) default NULL,
  `tava` varchar(45) default NULL,
  `valor_total` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `usuario_id` int(11) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `boletos`
-- 


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

INSERT INTO `configuracoes` VALUES (20, 'creditos_banco', 'Créditos - banco de emissão dos boletos', 'select', 'Santander(033)', 'Santander(033)', 'Santander(033)', '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (19, 'creditos_conta_dv', 'Créditos - dígito verificador da conta corren', 'text', NULL, 'dada', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (18, 'creditos_conta', 'Créditos - conta corrente do cedente', 'text', NULL, 'dasda', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (16, 'creditos_agencia', 'Créditos - agência do cedente', 'text', NULL, 'dsadsa', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (17, 'creditos_agencia_dv', 'Créditos - dígito verificador da agência do c', 'text', NULL, 'da', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (15, 'creditos_taxa_boleto', 'Créditos - taxa (R$) de cada boleto', 'text', NULL, 'teste taxa boleto', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (13, 'creditos_prazo', 'Créditos - dias para vencimentos dos boletos', 'text', NULL, '5', '5', '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (14, 'creditos_projeto_fusp', 'Créditos - número do projeto FUSP (5 dígitos)', 'text', NULL, 'dasd', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (11, 'backup_email', 'Backup - e-mail a ser enviado', 'text', NULL, 'wqeq', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (12, 'backup_split_arquivos', 'Backup - dividir arquivos a cada X megabytes ', 'text', NULL, '5', '5', '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (10, 'backup_qtde_manter', 'Backup - quantidade de cópias a manter no ser', 'text', NULL, '10', '10', '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (9, 'backup_frequencia', 'Backup - frequencia', 'select', 'diário, cada 2 dias, cada 3 dias, cada 4 dias', 'diario', 'diario', '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (8, 'backup_path', 'Backup - local dos arquivos', 'text', NULL, '/backups', '/backups', '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (7, 'email_SMTPAuth', 'Email - SMTP Auth', 'radio', '1,0', '1', '1', '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (6, 'email_SMTPSecure', 'Email - SMTP Secure', 'text', NULL, 'sslasad', 'ssl', '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (5, 'email_port', 'Email - porta', 'text', NULL, '465asd', '465', '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (4, 'email_fromName', 'Email - nome no cmapo “De”', 'text', NULL, 'teste', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (2, 'email_username', 'Email - username', 'text', NULL, 'teste1', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (3, 'email_password', 'Email - senha', 'text', NULL, 'teste', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (1, 'email_host', 'Email - host', 'text ', NULL, 'smtp@gmail.com', 'smtp@gmail.com', '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (21, 'creditos_cedente_nome', 'Créditos - nome ou razão social do cedente', 'text', NULL, 'asdsad', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (22, 'creditos_cedente_cnpj', 'Créditos - CNPJ do cedente', 'text', NULL, 'asdas', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (23, 'creditos_cedente_endereco_linha1', 'Créditos - endereço do cedente (linha 1)', 'text', NULL, 'asda', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (24, 'creditos_cedente_endereco_linha2', 'Créditos - endereço do cedente (linha 2)', 'text', NULL, 'dasd', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (25, 'creditos_texto_boleto', 'Créditos - texto das “Instruções” do boleto', 'textarea', NULL, 'teste   ', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (26, 'rss_fonte1', 'RSS - endereço do primeiro quadro de feeds', 'text', NULL, 'asdad', NULL, '2012-11-26 10:38:06 -0200', NULL);
INSERT INTO `configuracoes` VALUES (27, 'rss_fonte2', 'RSS - endereço do segundo quadro de feeds', 'text', NULL, 'asda', NULL, '2012-11-26 10:38:06 -0200', NULL);

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
-- Estrutura da tabela `coordenadores_facilities`
-- 

CREATE TABLE `coordenadores_facilities` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) default NULL,
  `usuario_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `facility_id` (`facility_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `coordenadores_facilities`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `facilities`
-- 

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `nome_abreviado` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `tipo_agendamento` varchar(45) default NULL,
  `arquivos` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `unidade_valor` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `facilities`
-- 

INSERT INTO `facilities` VALUES (0, 'Genome Investigation and Analysis Laboratory', 'GENIAL', 'asdaslkdahdlahdlhaslhdalkshdlahda', 'timecreated', 'timemodified', '1', '2', 'teste', '5000', '10');
INSERT INTO `facilities` VALUES (1, 'GENIAL', 'Genome Investigation and Analysis Laboratory', 'Genome Investigation and Analysis Laboratory', NULL, NULL, '1', '2', 'arquivos', '50', '10');
INSERT INTO `facilities` VALUES (2, 'BIOMASS', 'Mass Spectometry and Proteome Research', 'Mass Spectometry and Proteome Research', NULL, NULL, '1', '2', 'arquivos', '50', '10');
INSERT INTO `facilities` VALUES (3, 'FLUIR', 'Flow Cytometry and Imaging Research', 'Flow Cytometry and Imaging Research', NULL, NULL, '1', '2', 'arquivos', '50', '10');

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
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `capacidades` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `facilities_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `fk_facilities_usuarios_facilities1` (`facilities_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `facilities_usuarios`
-- 


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
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `chave` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `tipo` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `obs` varchar(45) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `medoto_pagto` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  `cancelamento_justificativa` varchar(45) default NULL,
  `cancelamento_autor_id` int(11) default NULL,
  `cancelamento_datetime` varchar(45) default NULL,
  `lancamento_direto` varchar(45) default NULL,
  `boleto_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `autor_id` (`autor_id`),
  KEY `cancelamento_autor_id` (`cancelamento_autor_id`),
  KEY `fk_lancamentos_boletos1` (`boleto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `lancamentos`
-- 


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
  `id` int(11) NOT NULL,
  `from_id` int(11) default NULL,
  `to_id` int(11) default NULL,
  `conteudo` varchar(45) default NULL,
  `assunto` varchar(45) default NULL,
  `data_envio` varchar(45) default NULL,
  `data_ultima_leitura` varchar(45) default NULL,
  `cont_leituras` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `from_id` (`from_id`),
  KEY `to_id` (`to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `mensagens`
-- 


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
  `UF` varchar(45) default NULL,
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
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- 
-- Extraindo dados da tabela `usuarios`
-- 

INSERT INTO `usuarios` VALUES (9, 'teste4', 'teste', '', '2012-11-14 14:57:55 -0200', 'teste4', 'sobrenometeste4', 'rua quatro', NULL, NULL, 'instituicaoteste4', 'departamentoteste4', 'dt nascimento 22-08-1989', 'keyTeste4', '3', 'obsTeste4', '0', 'teste4@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste4', 'newsletterTeste4', '07052200');
INSERT INTO `usuarios` VALUES (8, 'teste3', '', '', '2012-11-23 10:05:15 -0200', 'teste3', 'sobrenometeste3', 'rua tres', NULL, NULL, 'instituicaoteste3', 'departamentoteste3', 'dt nascimento 22-08-1989', 'keyTeste3', '3', 'obsTeste3', '10', 'teste3@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste3', 'newsletterTeste3', '07052200');
INSERT INTO `usuarios` VALUES (7, 'teste2', 'diamonds', '', '2012-11-23 11:05:38 -0200', 'teste2', 'sobrenometeste2', 'rua dois', NULL, NULL, 'instituicaoteste2', 'departamentoteste2', 'dt nascimento 22-08-1989', 'keyTeste2', '1', 'obsTeste2', '1', 'teste2@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste2', 'newsletterTeste2', '07052200');
INSERT INTO `usuarios` VALUES (6, 'teste1', '123456', '', '2012-11-23 10:03:24 -0200', 'teste1', 'sobrenometeste', 'rua um', NULL, NULL, 'instituicaoteste1', 'departamentoteste1', 'dt nascimento 22-08-1989', 'keyTeste1', '0', 'obsTeste1', '1', 'teste1@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste', 'newsletterTeste1', '07052200');
INSERT INTO `usuarios` VALUES (17, 'superadmin', 'superadmin', '2012-11-13 16:03:34 -0200', '2012-11-14 14:47:28 -0200', 'superadmin', 'superadmin', 'Rua Catuipe, 93', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '', '1', NULL, '1', 'superadmin@superadmin.com', '(11) 9-5391-0081', '(11) 2421-8095', '381.162.908-51', NULL, '1', '07052-200');
INSERT INTO `usuarios` VALUES (19, 'teste1213', '123456', '', '', 'teste1', 'sobrenometeste', 'rua um', NULL, NULL, 'instituicaoteste1', 'departamentoteste1', 'dt nascimento 22-08-1989', 'keyTeste1', '1', 'obsTeste1', '1', 'tes1241124te111@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste', 'newsletterTeste1', '07052200');
INSERT INTO `usuarios` VALUES (11, 'teste10', '123456', '', '2012-11-14 15:06:00 -0200', 'teste1', 'sobrenometeste', 'rua um', NULL, NULL, 'instituicaoteste1', 'departamentoteste1', 'dt nascimento 22-08-1989', 'keyTeste1', '1', 'obsTeste1', '10', 'teste111@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste', 'newsletterTeste1', '07052200');
INSERT INTO `usuarios` VALUES (12, 'teste11', '123456', '', '2012-11-14 15:06:12 -0200', 'teste2', 'sobrenometeste2', 'rua dois', NULL, NULL, 'instituicaoteste2', 'departamentoteste2', 'dt nascimento 22-08-1989', 'keyTeste2', '2', 'obsTeste2', '0', 'teste15@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste2', 'newsletterTeste2', '07052200');
INSERT INTO `usuarios` VALUES (13, 'teste12', '123456', '', '2012-11-14 15:33:14 -0200', 'teste3', 'sobrenometeste3', 'rua tres', NULL, NULL, 'instituicaoteste3', 'departamentoteste3', 'dt nascimento 22-08-1989', 'keyTeste3', '0', 'obsTeste3', '10', 'teste14@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste3', 'newsletterTeste3', '07052200');
INSERT INTO `usuarios` VALUES (14, 'teste13', '654321', '', '2012-11-14 14:58:04 -0200', 'teste4', 'sobrenometeste4', 'rua quatro', NULL, NULL, 'instituicaoteste4', 'departamentoteste4', 'dt nascimento 22-08-1989', 'keyTeste4', '1', 'obsTeste4', '10', 'teste13@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste4', 'newsletterTeste4', '07052200');
INSERT INTO `usuarios` VALUES (15, 'Thais2', '123456', '2012-11-12 15:48:11 -0200', '2012-11-12 16:45:25 -0200', 'Thais ', 'Dias', 'Rua Catuipe, 93', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '', '1', NULL, '0', 'thardias2@gmail.com', '(11) 9-5391-0081', '(11) 2421-8095', '381.162.908-51', NULL, '1', '07052-200');
INSERT INTO `usuarios` VALUES (16, 'admin', '123456', '2012-11-13 14:56:11 -0200', '2012-11-19 14:24:43 -0200', 'admin', 'admin', 'Rua Catuipe, 93', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '', '1', NULL, '1', 'thardias@gmail.com', '(11) 9-5391-0081', '(11) 2421-8095', '381.162.908-51', NULL, '1', '07052-200');
INSERT INTO `usuarios` VALUES (18, 'comum', 'comum', '2012-11-13 16:05:03 -0200', '2012-11-14 11:44:09 -0200', 'comum', 'comum', 'Rua Catuipe, 93', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '', '1', NULL, '0', 'asdas@dasda.com.br', '(11) 9-5391-0081', '(11) 2421-8095', '381.162.908-51', NULL, '1', '07052-200');
INSERT INTO `usuarios` VALUES (20, 'teste11231', '654321', '', '', 'teste2', 'sobrenometeste2', 'rua dois', NULL, NULL, 'instituicaoteste2', 'departamentoteste2', 'dt nascimento 22-08-1989', 'keyTeste2', '1', 'obsTeste2', '1', 'te42141ste15@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste2', 'newsletterTeste2', '07052200');
INSERT INTO `usuarios` VALUES (21, 'teste1312', '123456', '', '', 'teste3', 'sobrenometeste3', 'rua tres', NULL, NULL, 'instituicaoteste3', 'departamentoteste3', 'dt nascimento 22-08-1989', 'keyTeste3', '1', 'obsTeste3', '1', 'test312412e14@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste3', 'newsletterTeste3', '07052200');
INSERT INTO `usuarios` VALUES (22, 'teste1121', '654321', '', '', 'teste4', 'sobrenometeste4', 'rua quatro', NULL, NULL, 'instituicaoteste4', 'departamentoteste4', 'dt nascimento 22-08-1989', 'keyTeste4', '1', 'obsTeste4', '1', 'tes1231te13@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste4', 'newsletterTeste4', '07052200');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `usuarios_projetos`
-- 

CREATE TABLE `usuarios_projetos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `projeto_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `projeto_id` (`projeto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `usuarios_projetos`
-- 

