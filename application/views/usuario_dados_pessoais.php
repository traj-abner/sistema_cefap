<style type="text/css">
.form-actions { margin-left:30px; }
</style>

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
                <input type="submit" class="btn" name="ver_extrato" onclick="window.open='<?php base_url('creditos/extrato/').$user->id; ?>'" value="Ver Extrato">
            </div>    
        </div>

        <div class="user_info"> 
            <div class="pull-left">
                Saldo<br>
                <?php echo SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($saldo,2,TS,DS); ?><br>
                Total de Créditos já Inseridos:<br>
                <?php echo SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($soma,2,TS,DS); ?><br>
                Boleto(s) em aberto:<br>
                <?php
				foreach($bol as $bl):
					echo SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($bl->valor_total,2,TS,DS) . ' - Vencimento: ';
					$vnc = explode('-',$bl->data_vencimento);
					echo $vnc[2].'/'.$vnc[1].'/'.$vnc[0].'<br />';
				endforeach;
				?>
                
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
                    <?php foreach ($lcn as $lc): ?>
                        <tr>
                            <td><?php echo SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($lc->valor,2,TS,DS); ?></td>
                            <td><?php
                            	switch($lc->tipo):
									case LANCAMENTO_CREDITO: echo 'C'; break;
									case LANCAMENTO_DEBITO: echo 'D'; break;
								endswitch;
							?></td>
                            <td><?php
                            if ($lc->tipo == LANCAMENTO_CREDITO):
								if ($lc->metodo_pagto == METODO_PAGTO_BOLETO):
									echo 'Boleto N&ordm; ' . $lc->boleto_nosso_numero;
								else:
									echo 'N&atilde;o especificado';
								endif;
							else:
								if ($lc->facility_id != 0):
									echo $lc->facility_nome_abreviado;
								endif;
							endif;
							?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>

