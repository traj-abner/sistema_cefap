<style type="text/css">
.form-actions { margin-left:30px; }
</style>

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h1>Extrato de Lan&ccedil;amentos</h1>
        <div class="btn-right">
            <input type="button" class="btn" name="cancelar" value="Salvar como PDF">
        </div>    

         <div class="user_info">  
            <div class="row">
                <div class="span2">Usu&aacute;rio: <?php echo $user->nome; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span2">CPF: <?php echo $cpf; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span2">Institui&ccedil;&atilde;o: <?php echo $user->instituicao; ?></div>
            </div>
            <br>
            <div class="row">
                <div class="span2">Departamento: <?php echo $user->departamento; ?></div>
            </div>
        </div>
    </div>
    <div class="modal-body">

        <div class="user_info"> 
            <table class="table">
                    <caption>table caption</caption>
                    <thead>
                        <tr>
                            <th>Tipo de Lan&ccedil;amento</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <?php if ($uRole == CREDENCIAL_USUARIO_SUPERADMIN): ?>
                            	<th>Opções</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                        <tr>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed libero turpis, porta id posuere in, 
                                commodo eu neque. Sed nisi diam, lacinia nec cursus vel, tincidunt at risus. </td>
                            <td>Prof. Dr. Ciclano da Silva Souza</td>
                            <td>Instituto de Ciências Biomédicas</td>
                            <?php if ($uRole == CREDENCIAL_USUARIO_SUPERADMIN): ?>
                            	<td>Opções</td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>

