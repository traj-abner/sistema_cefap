<?php
class Mensagem extends Datamapper{
    
    public $model = 'mensagem';
    public $table = 'mensagens';
    
    public $has_one = array(
    );
    
    public $has_many = array(
		'usuario' => array(
			'class' => 'usuario',
			'other_field' => 'mensagem')
	);
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
