sistema_cefap
================================================================================
v0.27
14/02/13 - Abner
#descrição
Header

#changelog
Correções de Bugs em agendamentos_editar, facilities, facilities_editar, agendamentos, creditos, creditos_listar, projetos.
Criação de views agendamentos_calendario, projetos_listar_meus.
Implementação do menu.

#known issues


#todo


================================================================================
================================================================================

v0.26
13/02/13 - Abner
#descrição
Módulo Agendamento | Módulo Facilities

#changelog
Correções de Bugs na aprovação de Agendamentos
Implementadas edição e visualização do agendamento
Implementados extratos html e pdf das facilities

#known issues


#todo


================================================================================
================================================================================

v0.25
07/02/13 - Abner
#descrição
Módulo Agendamento

#changelog
Implementados controllers e views para criação, aprovação e listagem de agendamentos

#known issues


#todo


================================================================================
================================================================================

v0.23
04/02/13 - Abner
#descrição
Módulo Projetos

#changelog
Implementados controllers e views para criação e edição; controller para exclusão
Correções de Bugs Módulo Créditos

#known issues
Não subindo arquivo na edição

#todo


================================================================================
================================================================================

v0.22
31/01/13 - Abner
#descrição
Módulo Mensagens | Módulo Creditos

#changelog
Implementação de lista de enviados
Implementação de Inserção de Créditos

#known issues
Não listando apenas relacionados

#todo
Inserção direta por Superadmins

================================================================================
================================================================================

v0.21
30/01/13 - Abner
#descrição
Módulo Mensagens | Módulo Creditos

#changelog
Alteração na integração com o BD (Mensagens)
Implementação de renderização de Boleto

#known issues
Não listando apenas relacionados

#todo
View mensagens_enviadas
creditos_inserir

================================================================================
================================================================================

v0.20
29/01/13 - Abner
#descrição
Módulo Mensagens

#changelog
Implementação de lista
Implementação de escrita (enviar/encaminha)
Correção no envio de emails
Funções de marcação (Lido/Não Lido/Excluido)

#known issues
Não listando apenas relacionados

#todo
View mensagens_enviadas

================================================================================
================================================================================

v0.19
28/01/13 - Abner
#descrição
Alterações módulo Créditos/Início módulo Mensagens

#changelog
Implementação de ações com marcados (créditos)
Lista de lançamentos ao visualizar dados do usuário
Criado formulario e ação de envio de mensagem

#known issues
não enviando email para todos os destinatarios

#todo


================================================================================
================================================================================

v0.18
24/01/13 - Abner
#descrição
Alterações módulo Créditos

#changelog
Implementada lista de lançamentos para o superadmin, incluindo alterações no status (ativo, inativo, cancelado) e lista de lançamentos cancelados

#known issues


#todo
ações com marcados

================================================================================
================================================================================
v0.17
23/01/13 - Abner
#descrição
Alterações módulo Créditos

#changelog
Implementada lista de lançamentos (extrato) por usuário

#known issues


#todo

================================================================================
================================================================================
v0.16
22/01/13 - Abner
#descrição
Alterações módulo Créditos

#changelog
Correções na lista de boletos
Implementadas ações para seleção multipla
Iniciada lista de creditos->usuario

#known issues
BUG: ações com marcados


#todo


================================================================================
================================================================================
v0.15
21/01/13 - Abner
#descrição
Implementada lista de boletos

#changelog
Criação da view e controller listar
Implementadas funções de marcação: em aberto, vencido, cancelado, pago
Criação de constantes para definição de símbolo de moeda corrente

#known issues
Há 2 campos com valor. Confirmar qual deve ser exibido na lista
Confirmar qual tipo de exibição de moeda corrente: ISO4217 ou Local


#todo
ações com marcados

================================================================================
================================================================================
v0.14
18/01/13 - Abner
#descrição
Correções de interação com Banco de Dados

#changelog
Correções em usuario.php e facility.php
Implementado gerenciamento de administradores de facilities
Adicionado campo de alteração de status em facilities/editar/

#known issues



#todo
Upload de arquivos
Implementar calendário

================================================================================
================================================================================

v0.13
17/01/13 - Abner
#descrição
Correções na lista de facilities

#changelog
Correção na criação e edição de facilities
Inclusão de opção de excluir facility (superadmin apenas)
Alteração de queries para padrão DataMapper
Correção de fluxo de dados  formulario de cadastro de facilities -> action incluir

#known issues



#todo
Upload de arquivos
Salvar relação facility <=> usuário no cadastro da facility

================================================================================
================================================================================
v0.12
16/01/13 - Abner
#descrição
Correções na lista de facilities

#changelog
Implementada navegação de página por botões na lista de usuários
Implementada seleção de ordenação
Implementada visualização de administradores
Correção de BUG: query não retornava primeiro resultado

#known issues



#todo
Terminar formatação da visualização de administradores

================================================================================
================================================================================

v0.11
15/01/13 - Abner
#descrição
Correção na lista de usuários

#changelog
Implementada navegação de página por botões na lista de usuários

#known issues
Evento de seleção não reinicia select box


#todo
corrigir evento de seleção das select boxes

================================================================================
================================================================================

v0.10
03/01/13 - Thais
#descrição
Criada todas as views do módulo facilities

#changelog
Implementada a action de listar facilities(ainda falta alguns ajustes)
Implementada a action de editar facilities(ainda falta alguns ajustes)
Implementada a action de adicionar facilities(ainda falta alguns ajustes)
modal para ver facilities já implementado
modal para ver extrato das facilities já implementado

#known issues
jquery de selecionar arquivo ainda não está igual ao do wireframe.
Falta correções de bugs de css em todas as views do módulo facilitites


#todo
ultimas configurações do jQuery da página de adicionar facilities
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
#descrição
Configurações iniciais do módulo facilities.
Últimos ajustes na dashboard.

#changelog
Atualização dos itens exibidos para o usuário na dashboard de acordo com a credencial do usuário logado
Iniciada a codificação do módulo facilitites.
Jquery para seleção de usuários administrativos associados a esta facility - OK


#known issues
jquery para adicionar os arquivos ainda não está funcionando
view Adicionar ainda não concluída (muitos bugs de css)

#todo
implementações jQuery
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