<style type="text/css">
.form-actions { margin-left:30px; }

table {
	width:100%;
}

.resumo {
	width:94%;
	margin-left:3%;
	height:400px;
	border:1px solid;
	padding: 3px 3px 3px 3px;
	border-color:#CCC;
	border-radius:5px;
	-moz-border-radius:5px;
	overflow:scroll;
}

.resumo p {
	padding-top:12px;
	line-height:200%;
}

.title {
	font-weight:bold;
	color:#555;
}
.left {
	text-align:left;
	padding-left:5px;
}
.right {
	text-align:right;
	padding-right:5px;
}
.center {
	text-align:center;
}

.local {
	width:20%;
}
.local-thin {
	width:10%;
}
.remainder-thick {
	width:87%;
}
.remainder {
	width:77%;
}


table td {
	padding-top:10px;
}

.section {
	font-size:16px;
	text-transform:uppercase;
	font-weight:bold;
	text-align:center;
	width:100%;
	color:#333;
}

.section-pad {
	padding-top:50px;
}

.section hr { 
	background-color:#999;
	height: 2px;
	padding-top:-10px;
	margin-bottom:10px;
}

.top-align {
	vertical-align:top;
	padding-top:15px;
}
</style>

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h1><?php echo $proj->titulo; ?></h1>
        <div class="btn-right"></div>    

        <div class="user_info">

            
            <br>
       </div>
    </div>
    <div class="modal-body">

       <table>
    	<tr>
            <td class="section" colspan="3">
                Projeto de Pesquisa
                <hr  />
            </td>
        </tr>
        <tr>
        	<td class="title right local" colspan="1">Nome do Projeto</td>
            <td class="left remainder-thick" colspan="2"><?php echo $proj->titulo; ?></td>
        </tr>
        <tr>
        	<td class="title right local">Criado por</td>
            <td class="left remainder-thick" colspan="2"><?php echo $usr->nome . ' ' . $usr->sobrenome; ?></td>
        </tr>
		<?php if ($modified): ?>
        <tr>
        	<td class="title right local">Ultima Modificação</td>
            <td class="left remainder-thick" colspan="2"><?php echo $last_modified; ?></td>
        </tr>
        <?php endif; ?>
        <tr>
       		 <td class="title right local" colspan="1">Instituição(ões) de Fomento</td>
            <td class="left remainder-thick" colspan="2"><?php echo $inst; ?> </td>
        </tr>
        <tr>
        	<td class="title center" colspan="3">Resumo</td>
        </tr>
        <tr>
        	<td colspan="3"><div class="resumo"><?php echo $proj->resumo; ?></div></td>
        </tr>
        
        <tr>
        	<td class="title center" colspan="3"><a class="btn btn-info" href="<?php echo base_url('uploads/'.$proj->arquivos); ?>" target="_blank"><i class="icon-download icon-white"></i>Baixar Arquivos do Projeto de Pesquisa</a></td>
        </tr>
        
    </table>
    	<!-- SECTION CHIEF RESEARCHER -->
    	<table style="width:100%;">
        	<tr>
        		<td class="section section-pad" colspan="4">Pesquisador Responsável<hr /></td>
        	</tr>
            <tr>
            	<td class="title right local" colspan="1">Nome</td>
                <td class="left remainder" colspan="3"><?php echo $proj->responsavel; ?></td>
            </tr>
            <tr>
            	<td class="title right local">Departamento</td>
                <td class="left"><?php echo $proj->departamento; ?></td>
                <td class="title right local">Instituição</td>
                <td class="left"><?php echo $proj->instituicao; ?></td>
            </tr>
            <tr>
            	<td class="title right local">Telefone 1</td>
                <td class="left"><?php echo $proj->telefone1; ?></td>
                <td class="title right local">Telefone 2</td>
                <td class="left"><?php echo $proj->telefone2; ?></td>
            </tr>
             <tr>
            	<td class="title right local" colspan="1">Email</td>
                <td class="left" colspan="3"><?php echo $proj->email; ?></td>
            </tr>
            
        </table>
        
    </div>
    <div class="modal-footer"><br /><br />
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>

