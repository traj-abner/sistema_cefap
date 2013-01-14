    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h1><?php echo $user->username; ?></h1>
        <div class="btn-right">
            <input type="submit" class="btn" name="submit" value="Log de acesso">
            <input type="button" class="btn" name="cancelar" value="Escrever Mensagem">
        </div>    

        <div class="user_info">

            <div class="row">
                <div class="span2">Status: <?php echo $user->status; ?></div>
                <div class="span2">Usuário: <?php echo $user->nome; ?></div>             
                <div class="span2">Cadastrado em: <?php echo $user->created; ?> </div>
                <div class="span2">Username: <?php echo $user->username; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span5">Chave de Ativa&ccedil;&atilde;o: <?php echo $user->key; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span4">&Uacuteltimo Acesso:  </div>
            </div>
       </div>
    </div>
    <div class="modal-body">

        <div class="form-actions">
            <h2><p>Dados Pessoais</p></h2>
            <div class="btn-right">
                <button type="button" class="btn pull-right" name="submit" onClick="<?php base_url("usuarios/editar/$user->id")?>">Editar</button>
            </div>
        </div>

        <div class="user_info">  
            <div class="row">
                <div class="span2">Data de Nascimento: <?php echo $user->data_nascimento; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span2">CPF: <?php echo $user->cpf; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span2">E-mail: <a href="mailto:<?php echo $user->email; ?>"><?php echo $user->email; ?></a></div>
            </div>
            <br>
            <div class="row">
                <div class="span2">Endere&ccedil;o: <?php echo $user->endereco; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span2">Institui&ccedil;&atilde;o: <?php echo $user->instituicao; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span2">Departamento: <?php echo $user->departamento; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span2">Telefone: <?php echo $user->telefone; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span2">Celular: <?php echo $user->celular; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span3 offset1"></div>                    
            </div>
        </div>

        <div class="form-actions">
                <h2><p>Projetos</p></h2>
                <div class="btn-right">
                    <input type="submit" class="btn pull-right" name="submit" value="Ver Todos">
                </div>    
        </div>

        <div class="user_info"> 
            <table class="table">
                    <caption>table caption</caption>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Responsável</th>
                            <th>Instituto</th>
                            <th>Departamento</th>

                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                        <tr>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed libero turpis, porta id posuere in, 
                                commodo eu neque. Sed nisi diam, lacinia nec cursus vel, tincidunt at risus. </td>
                            <td>Prof. Dr. Ciclano da Silva Souza</td>
                            <td>Instituto de Ciências Biomédicas</td>
                            <td>Departamento de Imunologia</td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed libero turpis, porta id posuere in, 
                                commodo eu neque. Sed nisi diam, lacinia nec cursus vel, tincidunt at risus.</td>
                            <td>Prof. Dr. Ciclano da Silva Souza</td>
                            <td>Instituto de Ciências Biomédicas</td>
                            <td>Departamento de Imunologia</td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed libero turpis, porta id posuere in, 
                                commodo eu neque. Sed nisi diam, lacinia nec cursus vel, tincidunt at risus.</td>
                            <td>Prof. Dr. Ciclano da Silva Souza</td>
                            <td>Instituto de Ciências Biomédicas</td>
                            <td>Departamento de Imunologia</td>
                        </tr>
                    </tbody>
            </table>
        </div>

        <div class="form-actions">
            <h2><p>Agendamentos</p></h2>
            <div class="btn-right">
                <input type="submit" class="btn pull-right" name="submit" value="Ver Todos">
            </div>    
        </div>

        <div class="user_info"> 
            <table class="table">
                    <caption>table caption</caption>
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Período</th>
                            <th>Facility</th>
                            <th>Valor</th>

                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                        <tr>
                            <td>solicitado</td>
                            <td>27/10/2012 14:00 - 16:00</td>
                            <td>BIOMASS</td>
                            <td>R$100,00</td>
                        </tr>
                        <tr>
                            <td>agendado</td>
                            <td>27/10/2012 14:00 - 16:00</td>
                            <td>CONFOCAL</td>
                            <td>R$20,00</td>
                        </tr>
                        <tr>
                            <td>faltou</td>
                            <td>27/10/2012 14:00 - 16:00</td>
                            <td>FLUIR</td>
                            <td>R$0,00</td>
                        </tr>
                        <tr>
                            <td>compareceu</td>
                            <td>27/10/2012 14:00 - 16:00</td>
                            <td>FLUIR</td>
                            <td>R$250,00</td>
                        </tr>
                    </tbody>
            </table>
        </div>

        <div class="form-actions">
            <h2><p>Créditos</p></h2>
            <div class="btn-right-creditos">
                <input type="submit" class="btn" name="lancamentos" value="Lançamentos">
                <input type="submit" class="btn" name="boletos" value="Boletos">
                <input type="submit" class="btn" name="inserir_creditos" value="Inserir Créditos">
                <input type="submit" class="btn" name="ver_extrato" value="Ver Extrato">
            </div>    
        </div>

        <div class="user_info"> 
            <div class="pull-left">
                Saldo<br>
                R$70,00<br>
                Total de Créditos já Inseridos:<br>
                R$680,00<br>
                Boleto(s) em aberto:<br>
                R4$60,00 - venc: 13/11/2012
            </div>

            <div class="pull-right">
                <table class="table" id="Creditos">
                    <caption>table caption</caption>
                    <span>Últimos Lançamentos:</span>
                    <thead>
                        <tr>
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th>Referente a</th>

                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                        <tr>
                            <td>R$30,00</td>
                            <td>C</td>
                            <td>Boleto 025450000034</td>
                        </tr>
                        <tr>
                            <td>R$15,00</td>
                            <td>D</td>
                            <td>Uso de BIOMASS 10/07/2012</td>
                        </tr>
                        <tr>
                            <td>R$140,00</td>
                            <td>C</td>
                            <td>Boleto 025450000034</td>
                        </tr>
                    </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>

