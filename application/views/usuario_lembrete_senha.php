<?php 
    $this->load->view('header');
     
?>
<div id="main_content">
    <?php echo set_breadcrumb(); 
    
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
    
    <div class="well"><h2>Lembrete de Senha</h2></div>
	          
            <?php
            $attributes = array(
                "form"  => array('class' => 'form-horizontal', 'id' => 'form_adicionar')
            );
                            
                echo form_open('usuarios/lembrete_senha',$attributes['form']);
               ?>
                 <div class="control-group">
                     <label for="username_ou_email" class="control-label">Digite seu username OU e-mail cadastrado</label>
                    <div class="controls">
                        <input type="text" id="lembrete_senha" name="lembrete_senha" />
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