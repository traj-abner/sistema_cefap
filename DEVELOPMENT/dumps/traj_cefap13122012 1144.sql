-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Dez 13, 2012 as 11:44 AM
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

INSERT INTO `configuracoes` VALUES (20, 'creditos_banco', 'Créditos - banco de emissão dos boletos', 'select', 'Santander(033)', 'Santander(033)', 'Santander(033)', '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (19, 'creditos_conta_dv', 'Créditos - dígito verificador da conta corren', 'text', NULL, '25', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (18, 'creditos_conta', 'Créditos - conta corrente do cedente', 'text', NULL, '1234587', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (16, 'creditos_agencia', 'Créditos - agência do cedente', 'text', NULL, '0108', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (17, 'creditos_agencia_dv', 'Créditos - dígito verificador da agência do c', 'text', NULL, '9', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (15, 'creditos_taxa_boleto', 'Créditos - taxa (R$) de cada boleto', 'text', NULL, 'R$ 50,00', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (13, 'creditos_prazo', 'Créditos - dias para vencimentos dos boletos', 'text', NULL, '10', '5', '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (14, 'creditos_projeto_fusp', 'Créditos - número do projeto FUSP (5 dígitos)', 'text', NULL, '12345', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (11, 'backup_email', 'Backup - e-mail a ser enviado', 'text', NULL, 'teste@teste.com.br', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (12, 'backup_split_arquivos', 'Backup - dividir arquivos a cada X megabytes ', 'text', NULL, '5', '5', '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (10, 'backup_qtde_manter', 'Backup - quantidade de cópias a manter no ser', 'text', NULL, '10', '10', '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (9, 'backup_frequencia', 'Backup - frequencia', 'select', 'diário, cada 2 dias, cada 3 dias, cada 4 dias', 'diario', 'diario', '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (8, 'backup_path', 'Backup - local dos arquivos', 'text', NULL, '/backups', '/backups', '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (7, 'email_SMTPAuth', 'Email - SMTP Auth', 'radio', '1,0', '1', '1', '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (6, 'email_SMTPSecure', 'Email - SMTP Secure', 'text', NULL, 'teste@teste.com.br', 'ssl', '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (5, 'email_port', 'Email - porta', 'text', NULL, '465', '465', '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (4, 'email_fromName', 'Email - nome no cmapo “De”', 'text', NULL, 'teste@teste.com.br', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (2, 'email_username', 'Email - username', 'text', NULL, 'username', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (3, 'email_password', 'Email - senha', 'text', NULL, 'teste', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (1, 'email_host', 'Email - host', 'text ', NULL, 'smtp@gmail.com', 'smtp@gmail.com', '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (21, 'creditos_cedente_nome', 'Créditos - nome ou razão social do cedente', 'text', NULL, 'Nome', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (22, 'creditos_cedente_cnpj', 'Créditos - CNPJ do cedente', 'text', NULL, '025.124.524/0001-25', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (23, 'creditos_cedente_endereco_linha1', 'Créditos - endereço do cedente (linha 1)', 'text', NULL, 'Rua teste, 02', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (24, 'creditos_cedente_endereco_linha2', 'Créditos - endereço do cedente (linha 2)', 'text', NULL, 'Rua teste, 03', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (25, 'creditos_texto_boleto', 'Créditos - texto das “Instruções” do boleto', 'textarea', NULL, 'teste    ', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (26, 'rss_fonte1', 'RSS - endereço do primeiro quadro de feeds', 'text', NULL, 'www.teste.com.br', NULL, '2012-11-28 14:18:33 -0200', NULL);
INSERT INTO `configuracoes` VALUES (27, 'rss_fonte2', 'RSS - endereço do segundo quadro de feeds', 'text', NULL, 'www.teste.com.br', NULL, '2012-11-28 14:18:33 -0200', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

-- 
-- Extraindo dados da tabela `usuarios`
-- 

INSERT INTO `usuarios` VALUES (29, 'Peixinho', '123456', '2012-11-29 16:19:28 -0200', '2012-12-07 12:41:33 -0200', 'Peixinho', 'Tavares', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', 'A001D0D6-112A-A88D-D654-95B59BECBE4C', '0', NULL, '0', 'thais.dias123131@trajettoria.com', '(11) 9-5391-0081', '1124218095', '12345682599', 'TIPO_USUARIO_DOUTORANDO', '1', '07052000');
INSERT INTO `usuarios` VALUES (28, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2012-11-29 16:17:07 -0200', '2012-12-07 12:40:31 -0200', 'Thais', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', '5C3E9956-43B4-43EC-C432-C6FB40D21A3F', '2', NULL, '1', 'thais.dias123@trajettoria.com', '(11) 9-5391-0081', '1124218095', '381.162.908-51', '3', '0', '07052000');
INSERT INTO `usuarios` VALUES (30, 'teste', '123456', '2012-11-29 16:24:08 -0200', '2012-12-06 14:48:38 -0200', 'teste', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '15A22595-80C8-4CC2-9419-54C622476633', '0', NULL, '10', 'teste123@teste123.com.br', '(11) 9-5391-0081', '1124218095', '12546325891', '0', '1', '07052000');
INSERT INTO `usuarios` VALUES (31, 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', '2012-11-29 16:27:32 -0200', '2012-12-05 16:49:56 -0200', 'superadmin', 'superadmin', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Departamento', '22/08/1989', '7C971362-EDDB-2D3D-65C4-D9C304B95996', '1', NULL, '10', 'thais.dia31s@trajettoria.com', '(11) 9-5391-0081', '1124218095', '12548962537', NULL, '1', '07052000');
INSERT INTO `usuarios` VALUES (9, 'teste4', 'teste', '', '2012-12-05 16:49:56 -0200', 'teste4', 'sobrenometeste4', 'rua quatro', NULL, NULL, 'USP', 'departamentoteste4', 'dt nascimento 22-08-1989', 'keyTeste4', '1', 'obsTeste4', '1', 'teste4@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste4', 'newsletterTeste4', '07052200');
INSERT INTO `usuarios` VALUES (32, 'thais', '123456', '2012-12-03 11:04:15 -0200', '2012-12-05 16:50:06 -0200', 'thais', 'dias', 'Rua Catuipe, 93', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '3A4A9C52-0CFE-A756-3988-FAB59AAB3D23', '1', NULL, '1', 'thais.di123131as@trajettoria.com', '(11) 9-5391-0081', '1124218095', '12563285958', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (33, 'thais2', '123456', '2012-12-03 11:10:40 -0200', '2012-12-05 16:50:06 -0200', 'thais', 'teste123', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '70855065-A86D-4C96-C06C-FED1759DE6FA', '1', NULL, NULL, 'thais.d23131ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '52498536215', '4', '1', '07052000');
INSERT INTO `usuarios` VALUES (34, 'thais4', '123456', '2012-12-03 11:39:42 -0200', '2012-12-05 16:50:06 -0200', 'thais', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '949C9EAC-AC03-239F-F8E4-142F807F109E', '1', NULL, NULL, 'th12311ais.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2541685293', '4', '0', '07052000');
INSERT INTO `usuarios` VALUES (35, 'teste5', '123456', '2012-12-03 11:43:58 -0200', '2012-12-05 16:50:06 -0200', 'teste5', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '461F6A3F-2D9E-EB84-40FA-79EBCC7F1E93', '1', NULL, NULL, 'tha132131s.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25182565899', '2', '0', '07052000');
INSERT INTO `usuarios` VALUES (36, 'thais6', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-03 11:47:37 -0200', '2012-12-05 16:50:15 -0200', 'thais6', 'teste123', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'departamentoteste2das', '22/08/1989', '2E8AC375-75A7-7179-CB48-887376B7EC4C', '1', NULL, '10', 'tha12321321is.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '2514585269', '4', '0', '07052000');
INSERT INTO `usuarios` VALUES (37, 'thais7', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-03 14:59:00 -0200', '2012-12-06 12:54:12 -0200', 'Thais7', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', 'F30E0D90-0993-8ECF-FD38-EA68733C5DC4', '1', NULL, '1', 'thaiasdas.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '51428596352', '5', '1', '07052000');
INSERT INTO `usuarios` VALUES (38, 'Marjori', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-03 14:59:56 -0200', '2012-12-05 16:50:15 -0200', 'Marjori', 'Tamise', 'Rua pacheco jordão, 239 - Casa 1', 'São Paulo', NULL, 'USP', 'Imunologia', '10/03/1994', '6A9D26B6-B9D6-FC18-BA6B-847A3766E4F6', '1', NULL, '0', 'marjori@trajettoria.com', '(11)91234-5623', '(11) 2280-0848', '408160638-26', '3', '1', '03675-020');
INSERT INTO `usuarios` VALUES (39, 'thais8', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-03 15:41:45 -0200', '2012-12-06 14:48:30 -0200', 'thais8', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '09/11/1994', 'A127F466-3C62-A704-9508-84DB39D2222E', '0', NULL, '1', 'thaasdadadqweis.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '256352152488', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (40, 'thais10', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-04 15:58:15 -0200', '2012-12-05 16:50:15 -0200', 'Thais10', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', '2C5C7C2F-F0AC-68FD-8023-4FDCD2C1FC10', '1', NULL, '0', 'th31dasd123ais.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25815932688', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (41, 'teste13', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-05 14:20:42 -0200', '2012-12-06 14:48:30 -0200', 'teste13', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', 'BACFC9C2-0B08-CD32-C539-362A0C8AC4CF', '0', NULL, '0', 'thaasd1231is.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25698365147', '1', '1', '07052000');
INSERT INTO `usuarios` VALUES (42, 'thais14', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-06 14:46:56 -0200', '2012-12-06 14:47:19 -0200', 'thais14', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', NULL, 'USP', 'Imunologia', '22/08/1989', 'A9FAA1C7-7795-B98B-06BB-F48F457A21CE', '1', NULL, '10', 'tasdahais.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '15427845968', '5', '1', '07052000');
INSERT INTO `usuarios` VALUES (43, 'thais15', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-06 14:52:37 -0200', '2012-12-06 14:53:18 -0200', 'thais15', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'sc', 'USP', 'Imunologia', '22/08/1989', 'DEA0B40F-7C4B-0AF0-4D0F-1C0D31A48AC9', '1', NULL, '10', 'thasadqwis.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25145236585', '1', '1', '07052000');
INSERT INTO `usuarios` VALUES (44, 'thais116', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:46:37 -0200', NULL, 'thais16', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'pb', 'USP', 'Departamento', '22/08/1989', 'C75ADDAF-0B68-A1FF-41D3-26E985D2BF90', '0', NULL, '0', 'thais123131.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25184575899', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (45, 'thais17', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:48:03 -0200', NULL, 'thais16', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'pa', 'USP', 'Departamento', '22/08/1989', 'F1C2861E-BB57-F178-7733-51EC80B21190', '0', NULL, '0', 'thais.dasd123ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '85478596855', '0', '0', '07052000');
INSERT INTO `usuarios` VALUES (46, 'thais18', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:49:07 -0200', NULL, 'thais18', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', '334BD5BF-1694-D3D5-1C72-594CA906F6B5', '0', NULL, '0', 'thais.d2142141ias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '25418569585', '3', '1', '07052000');
INSERT INTO `usuarios` VALUES (47, 'thais181', 'e10adc3949ba59abbe56e057f20f883e', '2012-12-07 12:50:17 -0200', NULL, 'thais181', 'Dias', 'Ex: Av. Brig. Faria Lima, 400 - ap.35', 'Guarulhos', 'ba', 'USP', 'Imunologia', '22/08/1989', 'BC0F7969-7A82-9BD1-C7BF-6F182BFF9DC2', '0', NULL, '0', 'thais.dias@trajettoria.com', '(11) 9-5391-0081', '1124218095', '12413212421', '3', '1', '07052000');

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

