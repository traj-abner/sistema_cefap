<style type="text/css">
.form-actions { margin-left:30px; }
</style>

    <div class="modal-header">
        
    </div>
    <div class="modal-body">
			Digite o motivo para o cancelamento do lançamento
            <form action="<?php echo base_url("creditos/cancelado/" . $this->uri->segment(3)); ?>" method="get">
            	<input type="text" name="justificativa" id="justificativa" maxlength="550" size="" />
                <input type="submit" class="btn btn-success" />
            </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>

