<?php 
    $this->load->view('header');
     
?>
<div id="main_content">
    
<div id="breadcrumbs"><?php echo set_breadcrumb();	?></div>

<?php
if(isset($msg) && isset($msg_type)){ ?>
   <div class="alert <?php echo $msg_type?>" id="alert-success">
       <button type="button" class="close" data-dismiss="alert">×</button>
       <?php echo $msg; ?>
   </div> 
<?php 

}else{
    echo ('');

}

 ?> 
    <div class="well"><h2>Trocar Senha</h2></div>
	          
            <?php
            $attributes = array(
                "form"  => array('class' => 'form-horizontal', 'id' => 'form_adicionar'),
            );
            $id = $this->uri->segment(3);
            echo form_open('usuarios/trocar_senha/'.$id, $attributes['form']);
            ?>              
                 <div class="control-group">
                     <label for="senha_atual" class="control-label">Senha Atual</label>
                        <div class="controls">
                            <input type="password" name="senha_atual">
                        </div>
                 </div>
                 
                 <div class="control-group">
                    <label for="nova_senha" class="control-label">Nova Senha</label>
                        <div class="controls">
                            <input type="password" name="nova_senha">
                        </div>
                </div>
                 
                <div class="control-group">
                    <label for="conf_senha" class="control-label">Redigite a Senha</label>
                         <div class="controls">
                            <input type="password" name="conf_senha">
                         </div>
                </div>
    
                <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit">Confirmar</button>
                        <button type="button" class="btn" name="cancelar" onclick="window.location.href='index'">Cancelar</button> 
                </div>
            </form>   
    </div>
<?php
 
    $this->load->view('footer'); 
?>