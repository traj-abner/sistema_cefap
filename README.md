sistema_cefap
================================================================================
v0.14
17/01/13 - Abner
#descri��o
Corre��es de intera��o com Banco de Dados

#changelog
Corre��es em usuario.php e facility.php
Implementado gerenciamento de administradores de facilities
Adicionado campo de altera��o de status em facilities/editar/

#known issues



#todo
Upload de arquivos
Implementar calend�rio

================================================================================
================================================================================

v0.13
17/01/13 - Abner
#descri��o
Corre��es na lista de facilities

#changelog
Corre��o na cria��o e edi��o de facilities
Inclus�o de op��o de excluir facility (superadmin apenas)
Altera��o de queries para padr�o DataMapper
Corre��o de fluxo de dados  formulario de cadastro de facilities -> action incluir

#known issues



#todo
Upload de arquivos
Salvar rela��o facility <=> usu�rio no cadastro da facility

================================================================================
================================================================================
v0.12
16/01/13 - Abner
#descri��o
Corre��es na lista de facilities

#changelog
Implementada navega��o de p�gina por bot�es na lista de usu�rios
Implementada sele��o de ordena��o
Implementada visualiza��o de administradores
Corre��o de BUG: query n�o retornava primeiro resultado

#known issues



#todo
Terminar formata��o da visualiza��o de administradores

================================================================================
================================================================================

v0.11
15/01/13 - Abner
#descri��o
Corre��o na lista de usu�rios

#changelog
Implementada navega��o de p�gina por bot�es na lista de usu�rios

#known issues
Evento de sele��o n�o reinicia select box


#todo
corrigir evento de sele��o das select boxes

================================================================================
================================================================================

v0.10
03/01/13 - Thais
#descri��o
Criada todas as views do m�dulo facilities

#changelog
Implementada a action de listar facilities(ainda falta alguns ajustes)
Implementada a action de editar facilities(ainda falta alguns ajustes)
Implementada a action de adicionar facilities(ainda falta alguns ajustes)
modal para ver facilities j� implementado
modal para ver extrato das facilities j� implementado

#known issues
jquery de selecionar arquivo ainda n�o est� igual ao do wireframe.
Falta corre��es de bugs de css em todas as views do m�dulo facilitites


#todo
ultimas configura��es do jQuery da p�gina de adicionar facilities
alterar_status
ver (exibir os resultados obtidos do banco de dados)
excluir
extrato (exibir os resultados obtidos do banco de dados)
extrato_pdf
editar_agenda

================================================================================
================================================================================

v0.9
02/01/13 - Thais
#descri��o
Configura��es iniciais do m�dulo facilities.
�ltimos ajustes na dashboard.

#changelog
Atualiza��o dos itens exibidos para o usu�rio na dashboard de acordo com a credencial do usu�rio logado
Iniciada a codifica��o do m�dulo facilitites.
Jquery para sele��o de usu�rios administrativos associados a esta facility - OK


#known issues
jquery para adicionar os arquivos ainda n�o est� funcionando
view Adicionar ainda n�o conclu�da (muitos bugs de css)

#todo
implementa��es jQuery
salvar facilities no banco de dados
listar facilities
editar facilities
alterar_status
ver
excluir
extrato
extrato_pdf
editar_agenda

================================================================================